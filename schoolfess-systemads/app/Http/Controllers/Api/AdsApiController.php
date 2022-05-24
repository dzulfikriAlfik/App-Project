<?php

namespace App\Http\Controllers\Api;

use Auth;
use File;
use JWTAuth;
use App\Models\Ads;
use App\Models\User;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;

class AdsApiController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

   protected $ads;

   public function __construct()
   {
      $this->ads = JWTAuth::parseToken()->authenticate();
   }

   public function index(Request $request)
   {
      //
   }

   public function get(Request $request)
   {
      $query = Ads::join('user', 'ads.created_by', '=', 'user.user_id');
      $query->join('company_type', 'user.user_company_type', '=', 'company_type.company_type_id');

      $select = [
         'ads.ads_id',
         'ads.ads_title',
         'ads.ads_status',
         'ads.ads_placement',
         'ads.ads_image',
         'ads.created_dt',
         'ads.created_by',
         'user.user_id',
         'user.user_company',
         'company_type.company_type as company_type'
      ];
      $query->select($select);
      $query->where('user_company', '!=', '');

      // by status
      if ($request->ads_title != "") {
         $query = $query->where('ads_title', 'LIKE', "%" . $request->ads_title . "%");
      }

      // by role
      if ($request->ads_placement != "") {
         $query = $query->where('ads_placement', $request->ads_placement);
      }

      // by created_dt
      if ($request->created_dt) {
         $query = $query->where('created_dt', $request->created_dt);
      }
      // by name
      if ($request->user_company) {
         $query = $query->where('user_company', $request->user_company);
      }

      $data = $query->orderBy("created_dt", "DESC")->paginate(10);
      if ($data->isEmpty()) {
         return response()->json([
            'status' => 200,
            'message' => 'Data Not Found',
            'data' => $data
         ], Response::HTTP_OK);
      } else {
         return response()->json([
            'status' => 200,
            'message' => 'Data Found',
            'data' => $data
         ], Response::HTTP_OK);
      }
   }

   public function partner_ads(Request $request)
   {
      $query = Ads::select("*");

      $query->where('created_by', Auth::id());

      // by status
      if ($request->ads_title != "") {
         $query = $query->where('ads_title', $request->ads_title);
      }

      // // by role
      if ($request->ads_placement != "") {
         $query = $query->where('ads_placement', $request->ads_placement);
      }

      // // by created_dt
      if ($request->created_dt) {
         $query = $query->where('created_dt', 'LIKE', "%" . $request->created_dt . "%");
      }

      // // by status
      if ($request->ads_status != null) {
         $query = $query->where('ads_status', $request->ads_status);
      }

      $data = $query->orderBy("created_dt", "DESC")->paginate(10);
      if ($data->isEmpty()) {
         return response()->json([
            'status' => 200,
            'message' => 'Data Not Found',
            'data' => $data
         ], Response::HTTP_OK);
      } else {
         return response()->json([
            'status' => 200,
            'message' => 'Data Found',
            'data' => $data
         ], Response::HTTP_OK);
      }
   }

   public function approve(Request $request, Ads $ads)
   {
      //delete if not active user
      $ads->update([
         'ads_status'  => 1,
         'approved_dt' => date("Y-m-d h:i:s")
      ]);

      //respon success
      return response()->json([
         'status' => 200,
         'message' => 'Ads have been successfully approved'
      ], Response::HTTP_OK);
   }

   public function reject(Request $request, $ads_id)
   {
      //delete if not active user
      $ads = Ads::find($ads_id);
      $ads->update([
         'ads_status'    => 2,
         'reject_reason' => $request->reject_reason
      ]);

      //respon success
      return response()->json([
         'status'  => 200,
         'message' => 'Ads have been successfully rejected',
         'data'    => $ads
      ], Response::HTTP_OK);
   }

   public function suspend(Request $request, Ads $ads)
   {
      //delete if not active user
      // $ads = Ads::find($ads_id);
      // echo $request->suspend_reason;
      // die;
      $ads->update([
         'ads_status'     => 3,
         'suspend_reason' => $request->suspend_reason
      ]);


      //respon success
      return response()->json([
         'status'  => 200,
         'message' => 'Ads have been successfully suspended',
         'data'    => $ads
      ], Response::HTTP_OK);
   }

   public function download($id)
   {
      $ads = Ads::find($id);
      if ($ads) {
         // $ids = $perda[0]["id"];
         $file = $ads["ads_image"];
         // $download = $perda[0]["jml_download"];
         // //count download
         // $jml = $download + 1;
         // //count download to database;
         // $jml_download = Perda::where('id', '=', $id)->update([
         //    'jml_download' => $jml
         // ]);
         //download document
         if (Storage::disk('public')->exists("ads-image/$file")) {
            $path = Storage::disk('public')->path("ads-image/$file");
            $content = File_get_contents($path);
            return response($content)->withHeaders([
               'Content-Type' => mime_content_type($path)
            ]);
         }
      } else {
         //return response id not found
         return response()->json([
            'status' => 200,
            'message' => 'ID Not Found'
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
      $data = $request->all();
      $validator = Validator::make($data, [
         'ads_title'     => 'required|string',
         'ads_desc'      => 'required|string',
         'ads_placement' => 'required|string',
         'ads_image'     => 'required|string',
      ], [
         'ads_title.required'     => 'Judul iklan is Required',
         'ads_desc.required'      => 'Deskripsi iklan is Required',
         'ads_placement.required' => 'Ads Placement iklan is Required',
         'ads_image.required'     => 'Ads Image iklan is Required',
      ]);

      //Send failed response if request is not valid
      if ($validator->fails()) {
         return response()->json(['error' => $validator->messages()], 200);
      }

      // upload image
      $image = $request->ads_image;  // your base64 encoded
      $image = str_replace('data:image/png;base64,', '', $image);
      $image = str_replace(' ', '+', $image);
      $imageName = time() . '.' . 'png';
      $path = storage_path('app/public/ads-image');
      $fullpath = $path . '/' . $imageName;
      if (!File::isDirectory($path)) {
         File::makeDirectory($path, 0777, true, true);
      }
      File::put($fullpath, base64_decode($image));

      //Request is valid, create new Trivia
      $ads = Ads::create([
         'ads_title'      => $request->ads_title,
         'ads_desc'       => $request->ads_desc,
         'ads_link'       => "Link",
         'ads_view'       => 0,
         'ads_click'      => 0,
         'ads_placement'  => $request->ads_placement,
         'ads_image'      => $imageName,
         'ads_status'     => 0,
         'ads_start_date' => date("Y-m-d h:i:s"),
         'created_dt'     => date("Y-m-d h:i:s"),
         'created_by'     => Auth::id(),
         'updated_dt'     => date("Y-m-d h:i:s"),
         'updated_by'     => Auth::id()
      ]);

      return response()->json([
         'status' => 200,
         'message' => 'Data created successfully',
         'data' => $ads
      ], Response::HTTP_OK);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Ads  $ads
    * @return \Illuminate\Http\Response
    */
   public function show(Ads $ads)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Ads  $ads
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Ads $ads)
   {

      //Validate data
      $data = $request->all();
      $validator = Validator::make($data, [
         'ads_title'     => 'required|string',
         'ads_desc'      => 'required|string',
         'ads_link'      => 'required|string',
         'ads_placement' => 'required|string',
      ], [
         'ads_title.required'     => 'Ads Title is Required',
         'ads_desc.required'      => 'Ads Description is Required',
         'ads_link.required'      => 'Ads Link is Required',
         'ads_placement.required' => 'Ads Placement is Required',
      ]);

      //Send failed response if request is not valid
      if ($validator->fails()) {
         return response()->json(['error' => $validator->messages()], 200);
      }

      // check is partner edited the image
      if ($request->ads_image == $ads->ads_image) {
         $imageName = $ads->ads_image;
      } else {
         // upload image
         $image = $request->ads_image;  // your base64 encoded
         $image = str_replace('data:image/png;base64,', '', $image);
         $image = str_replace(' ', '+', $image);
         $imageName = time() . '.' . 'png';
         $path = storage_path('app/public/ads-image');
         $fullpath = $path . '/' . $imageName;

         $oldfile = storage_path('app/public/ads-image/' . $ads->ads_image);
         File::delete($oldfile);

         if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
         }
         File::put($fullpath, base64_decode($image));
      }

      //Request is valid, update trivia
      $ads->update([
         'ads_title'     => $request->ads_title,
         'ads_desc'      => $request->ads_desc,
         'ads_link'      => $request->ads_link,
         'ads_placement' => $request->ads_placement,
         'ads_image'     => $imageName,
         'ads_status'    => 0,
         'updated_by'    => Auth::id(),
         'updated_dt'    => date("Y-m-d h:i:s"),
      ]);

      //User updated, return success response
      return response()->json([
         'status' => 200,
         'message' => 'Data updated successfully',
         'data' => $ads
      ], Response::HTTP_OK);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Ads  $ads
    * @return \Illuminate\Http\Response
    */
   public function destroy(Ads $ads)
   {
      //
   }
}
