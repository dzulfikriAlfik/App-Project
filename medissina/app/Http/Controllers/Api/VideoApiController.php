<?php

namespace App\Http\Controllers\Api;

use App\Models\Video;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Auth;
use File;
use Illuminate\Support\Facades\Storage;

class VideoApiController extends Controller
{
   public function __construct()
   {
   }

   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request)
   {
      $query = Video::select(
         "video_id",
         "video_title",
         "video_link",
         "video_thumbnail"
      );
      if ($request->video_title) {
         $query = $query->where('video_title', 'LIKE', "%" . $request->video_title . "%");
      }
      if ($request->video_link) {
         $query = $query->where('video_link', 'LIKE', "%" . $request->video_link . "%");
      }
      if ($request->video_source) {
         $query = $query->where('video_source', $request->video_source);
      }

      $data = $query->orderBy("created_dt", "DESC")
         ->paginate(10);

      if ($data->isEmpty()) {
         return response()->json([
            'status'  => 200,
            'message' => 'Data Not Found',
            'data'    => $data
         ], Response::HTTP_OK);
      } else {
         return response()->json([
            'status'  => 200,
            'message' => 'Data Found',
            'data'    => $data
         ], Response::HTTP_OK);
      }
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      //Validate data
      $data = $request->only('video_title', 'video_desc', 'video_link', 'video_source', 'video_subject', 'video_thumbnail', 'video_views', 'created_by', 'updated_by');
      $validator = Validator::make(
         $data,
         [
            'video_title'     => 'required|string',
            'video_desc'      => 'required|string',
            'video_link'      => 'required|string|unique:video,video_link',
            'video_source'    => 'required|string',
            'video_subject'   => 'required|string',
            'video_thumbnail' => 'required|file|max:1024|image|mimes:jpg,jpeg,png'
         ],
         [
            'video_title.required'     => 'Video Title is Required',
            'video_title.string'       => 'Video Title Must Be String',
            'video_desc.required'      => 'Video Description is Required',
            'video_desc.string'        => 'Video Description Must Be String',
            'video_link.required'      => 'Video Link is Required',
            'video_link.string'        => 'Video Link Must Be String',
            'video_link.unique'        => 'Video Link Already taken',
            'video_source.required'    => 'Video Source is Required',
            'video_source.string'      => 'Video Source Must Be String',
            'video_subject.required'   => 'Video Subject is Required',
            'video_subject.string'     => 'Video Subject Must Be String',
            'video_thumbnail.required' => 'Video Thumbnail is Required',
            'video_thumbnail.file'     => 'Video Thumbnail Must be a file',
            'video_thumbnail.image'    => 'Video Thumbnail Must be an image',
            'video_thumbnail.max'      => 'Video Thumbnail should be less than 1024 kilobytes',
         ]
      );

      //Send failed response if request is not valid
      if ($validator->fails()) {
         return response()->json(['error' => $validator->messages()], 200);
      }

      // save upload file to variabel $file
      $file = $request->file('video_thumbnail');
      $nama_file = time() . '_' . $file->getClientOriginalName();

      //created directory file 
      $path = storage_path('app/public/video-thumbnails');
      if (!File::isDirectory($path)) {
         File::makeDirectory($path, 0777, true, true);
      }
      $file->move($path, $nama_file);

      $video = Video::create([
         'video_title'     => $request->video_title,
         'video_desc'      => $request->video_desc,
         'video_link'      => $request->video_link,
         'video_source'    => $request->video_source,
         'video_subject'   => $request->video_subject,
         'video_thumbnail' => $nama_file,
         'video_views'     => 0,
         'video_class'     => 7,
         'video_tag'       => "",
         'user_id'         => Auth::id(),
         'created_by'      => Auth::id(),
         'updated_by'      => Auth::id()
      ]);

      //Dokumen created, return success response
      return response()->json([
         'status'  => 200,
         'message' => 'Data created successfully',
         'data'    => $video
      ], Response::HTTP_OK);
   }

   public function download($id)
   {
      $video = Video::find($id);
      if ($video) {
         // $ids = $perda[0]["id"];
         $file = $video["video_thumbnail"];
         // $download = $perda[0]["jml_download"];
         // //count download
         // $jml = $download + 1;            
         // //count download to database;
         // $jml_download = Perda::where('id', '=', $id)->update([
         //    'jml_download' => $jml
         // ]);
         //download document
         if (Storage::disk('public')->exists("video-thumbnails/$file")) {
            $path = Storage::disk('public')->path("video-thumbnails/$file");
            $content = File_get_contents($path);
            return response($content)->withHeaders([
               'Content-Type' => mime_content_type($path)
            ]);
         }
      } else if ($count === 0) {
         //return response id not found
         return response()->json([
            'status' => 200,
            'message' => 'ID Not Found'
         ], Response::HTTP_OK);
      }
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Video  $video
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      $video = Video::find($id);

      if (!$video) {
         return response()->json([
            'status'  => 200,
            'message' => 'Data Not Found',
            'data'    => null
         ], Response::HTTP_OK);
      } else {
         return response()->json([
            'status'  => 200,
            'message' => 'Data Found',
            'data'    => $video
         ], Response::HTTP_OK);
      }
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Video  $video
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Video $video)
   {
      //Validate data
      $data = $request->only('video_title', 'video_desc', 'video_link', 'video_source', 'video_subject', 'video_thumbnail', 'video_views', 'created_by', 'updated_by');
      $validator = Validator::make(
         $data,
         [
            'video_title'     => 'required|string',
            'video_desc'      => 'required|string',
            'video_link'      => 'required|string|unique:video,video_link,' . $video->video_id . ',video_id',
            'video_source'    => 'required|string',
            'video_subject'   => 'required|string',
            // 'video_thumbnail' => 'required|file|max:1024|image|mimes:jpg,jpeg,png'
         ],
         [
            'video_title.required'     => 'Video Title is Required',
            'video_title.string'       => 'Video Title Must Be String',
            'video_desc.required'      => 'Video Description is Required',
            'video_desc.string'        => 'Video Description Must Be String',
            'video_link.required'      => 'Video Link is Required',
            'video_link.string'        => 'Video Link Must Be String',
            'video_link.unique'        => 'Video Link Already taken',
            'video_source.required'    => 'Video Source is Required',
            'video_source.string'      => 'Video Source Must Be String',
            'video_subject.required'   => 'Video Subject is Required',
            'video_subject.string'     => 'Video Subject Must Be String',
            // 'video_thumbnail.required' => 'Video Thumbnail is Required',
            // 'video_thumbnail.file' => 'Video Thumbnail Must a file',
            // 'video_thumbnail.image' => 'Video Thumbnail Must be an image',
            // 'video_thumbnail.max' => 'Video Thumbnail should be less than 1024 kilobytes',
         ]
      );

      //Send failed response if request is not valid
      if ($validator->fails()) {
         return response()->json(['error' => $validator->messages()], 200);
      }

      // save upload file to variabel $file
      $nama_file = "";
      if ($data["video_thumbnail"] != 'undefined') {
         $file = $request->file('video_thumbnail');
         $nama_file = time() . '_' . $file->getClientOriginalName();

         $oldfile = storage_path('app/public/video-thumbnails/' . $video->video_thumbnail);
         File::delete($oldfile);

         //created directory file 
         $path = storage_path('app/public/video-thumbnails');
         if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
         }
         $file->move($path, $nama_file);
      }

      $data = [
         'video_title'     => $request->video_title,
         'video_desc'      => $request->video_desc,
         'video_link'      => $request->video_link,
         'video_source'    => $request->video_source,
         'video_subject'   => $request->video_subject,
         'user_id'         => Auth::id(),
         'updated_by'      => Auth::id(),
         'updated_dt'      => date("Y-m-d h:i:s")
      ];

      if ($nama_file != "") {
         $data["video_thumbnail"] = $nama_file;
      }
      $video = $video->update($data);

      //Dokumen created, return success response
      return response()->json([
         'status'  => 200,
         'message' => 'Data updated successfully',
         'data'    => $video
      ], Response::HTTP_OK);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Video  $video
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $video = Video::where('video_id', '=', $id)->get();
      //count data for True or false
      $count = count($video);
      //check for delete
      if ($count === 1) {
         //delete thumbnail
         $file = storage_path('app/public/video-thumbnails/' . $video[0]["video_thumbnail"]);
         File::delete($file);
         //delete data
         $video[0]->delete();

         //response success
         return response()->json([
            'status'  => 200,
            'message' => 'Data deleted successfully'
         ], Response::HTTP_OK);
      } else {
         //response id not found
         return response()->json([
            'status'  => 200,
            'message' => 'Data deleted successfully'
         ], Response::HTTP_OK);
      }
   }
}
