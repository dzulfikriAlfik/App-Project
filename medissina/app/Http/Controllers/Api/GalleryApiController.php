<?php

namespace App\Http\Controllers\Api;

use Auth;
use File;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class GalleryApiController extends Controller
{
  public function get(Request $request)
  {
    $query = Gallery::select(["*"]);

    if (!$request->page) {
      $data = $query->orderBy("created_date", "DESC")->get();

      if ($data->isEmpty()) {
        return response()->json([
          'status'  => 404,
          'message' => 'Data Not Found',
          'data'    => null
        ], Response::HTTP_OK);
      }

      return response()->json([
        'status'  => 200,
        'message' => 'Data Found',
        'data'    => $data
      ], Response::HTTP_OK);
    }

    if ($request->title) {
      $query = $query->where('title', 'LIKE', "%" . $request->title . "%");
    }

    $data  = $query->orderBy("created_date", "DESC")->paginate(10);

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

  public function show($id)
  {
    $gallery = Gallery::select('*')
      ->find($id);

    if (!$gallery) {
      return response()->json([
        'status'  => 200,
        'message' => 'Data Not Found',
        'data'    => null
      ], Response::HTTP_OK);
    } else {
      return response()->json([
        'status'  => 200,
        'message' => 'Data Found',
        'data'    => $gallery
      ], Response::HTTP_OK);
    }
  }

  public function register(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'user_name'         => 'required|string',
      'user_email'        => 'required|email|unique:user,user_email',
      'user_phone'        => 'required|numeric',
      'user_company'      => 'required|string',
      'user_company_type' => 'required|string',
      'user_password'     => 'required|string|min:8|max:50'
    ], [
      'user_name.required'         => 'Name is Required',
      'user_name.string'           => 'Name Must Be String',
      'user_email.required'        => 'Email is Required',
      'user_email.unique'          => 'Email Has Already Been Taken',
      'user_phone.required'        => 'No. Hp is Required',
      'user_phone.string'          => 'Ho. Hp Must Be String',
      'user_company.required'      => 'Nama Perusahaan is Required',
      'user_company.string'        => 'Nama perusahaan Must Be String',
      'user_company_type.required' => 'Jenis Usaha is Required',
      'user_password.required'     => 'Password is Required',
      'user_password.string'       => 'Password Must Be String',
      'user_password.min'          => 'Password Must Be At Least 8 Character',
      'user_password.max'          => 'Password Must Not Be Greater Than 50 Characters'
    ]);

    //Send failed response if request is not valid
    if ($validator->fails()) {
      return response()->json(['error' => $validator->messages()], 200);
    }

    //Request is valid, create new user
    $user = Gallery::create([
      'user_name'         => $request->user_name,
      'user_email'        => $request->user_email,
      'user_phone'        => $request->user_phone,
      'user_company'      => $request->user_company,
      'user_company_type' => $request->user_company_type,
      'user_image'        => 'user.png',
      'user_status'       => 0,
      'user_role'         => "partner",
      'user_password'     => bcrypt($request->user_password),
      'created_dt'        => date("Y-m-d h:i:s"),
      'user_token'        => $request->user_token
    ]);

    return response()->json([
      'status'  => 200,
      'message' => 'User created successfully',
      'data'    => $user
    ], Response::HTTP_OK);
  }

  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'title'       => 'required|string',
      'description' => 'required|string',
    ], [
      'title.required'       => 'Judul tidak boleh kosong',
      'description.required' => 'Deskripsi tidak boleh kosong',
    ]);

    //Send failed response if request is not valid
    if ($validator->fails()) {
      return response()->json(['error' => $validator->messages()], 200);
    }

    //Request is valid, create new user
    $gallery = Gallery::create([
      'title'        => $request->title,
      'description'  => $request->description,
      'image'        => "image.png",
      'activity_id'  => $request->activity_id ?: null,
      'gallery_date' => $request->gallery_date,
      'created_date' => date("Y-m-d H:i:s"),
      'created_by'   => Auth::id(),
      'updated_date' => date("Y-m-d H:i:s"),
      'updated_by'   => Auth::id(),
    ]);

    //User created, return success response
    return response()->json([
      'status'  => 200,
      'message' => 'User created successfully',
      'data'    => $gallery
    ], Response::HTTP_OK);
  }

  public function upload(Request $request)
  {
    $image     = $request->image; // your base64 encoded
    $image     = str_replace('data:image/png;base64,', '', $image);
    $image     = str_replace(' ', '+', $image);
    $imageName = time() . '.' . 'png';
    $path      = storage_path('app/public/user-profile');
    $fullpath  = $path . '/' . $imageName;
    if (!File::isDirectory($path)) {
      File::makeDirectory($path, 0777, true, true);
    }
    File::put($fullpath, base64_decode($image));
    // response header
    return response()->json([
      'status'  => 200,
      'message' => 'Image uploaded successfully',
      'data'    => $fullpath
    ], Response::HTTP_OK);
  }

  public function destroy($id)
  {
    //get all data perda by id
    $user = Gallery::where('id', $id)->get();
    //count data for True or false
    $count = count($user);
    //check for delete
    if ($count === 1) {
      //delete
      if ($id == Gallery::id()) {
        return response()->json([
          'status'  => 400,
          'message' => "You can't block this data"
        ], 400);
      } else if ($id != Gallery::id()) {
        //delete if not active user
        $user[0]->update();
        //respon success
        return response()->json([
          'status'  => 200,
          'message' => 'Data deleted successfully'
        ], Response::HTTP_OK);
      }
    } else {
      //response id not found
      return response()->json([
        'status'  => 200,
        'message' => 'Data deleted successfully'
      ], Response::HTTP_OK);
    }
  }
}
