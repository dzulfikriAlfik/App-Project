<?php

namespace App\Http\Controllers\Api;

use Auth;
use File;
use JWTAuth;
use App\Models\User;
use App\Models\Topup;
use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class UserApiController extends Controller
{
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
    $user = User::create([
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

    //============== send email
    //$isi_email = [
    //    'title' => 'Registration in JDIH',
    //    'body' => 'Thanks for registration, enjoy!'
    //];
    //$tujuan = $request->email;
    //Mail::to($tujuan)->send(new SendEmail($isi_email));

    //User created, return success response
    return response()->json([
      'status'  => 200,
      'message' => 'User created successfully',
      'data'    => $user
    ], Response::HTTP_OK);
  }

  public function getStatistic(Request $request)
  {
    $data = json_decode("{}");

    $total_users           = User::count();
    $today                 = date("Y-m-d");
    $total_users_today     = User::select("user_id")->where("created_date", "like", $today . "%")->count();
    $total_users_domisili  = User::select("user_id")->whereNotNull("user_regency")->count();
    $total_users_birthyear = User::select("user_id")->whereNotNull("user_birthdate")->count();

    $data->all_time  = $total_users;
    $data->today     = $total_users_today;
    $data->domisili  = $total_users_domisili;
    $data->birthyear = $total_users_birthyear;

    return response()->json([
      'status'  => 200,
      'message' => 'Data Found',
      'data'    => $data
    ], Response::HTTP_OK);
  }

  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'user_name'         => 'required|string',
      'user_email'        => 'required|email|unique:user,user_email',
      'user_phone'        => 'required|numeric',
      'user_company'      => 'required|string',
      'user_company_type' => 'required|string',
      'password'          => 'required|string|min:8|max:50'
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
      'password.required'          => 'Password is Required',
      'password.string'            => 'Password Must Be String',
      'password.min'               => 'Password Must Be At Least 8 Character',
      'password.max'               => 'Password Must Not Be Greater Than 50 Characters'
    ]);

    //Send failed response if request is not valid
    if ($validator->fails()) {
      return response()->json(['error' => $validator->messages()], 200);
    }

    //Request is valid, create new user
    $user = User::create([
      'user_name'         => $request->name,
      'user_email'        => $request->email,
      'user_phone'        => $request->user_phone,
      'user_company'      => $request->user_company,
      'user_company_type' => $request->user_company_type,
      'user_status'       => 0,
      'user_password'     => bcrypt($request->password),
      'created_by'        => $request->name,
      'updated_by'        => $request->name,
      'user_token'        => $request->token,
      'user_role'         => "partner"
    ]);
    // echo "Test <br>";
    // echo response()->json($request);
    // die;

    //============== send email
    //$isi_email = [
    //    'title' => 'Registration in JDIH',
    //    'body' => 'Thanks for registration, enjoy!'
    //];
    //$tujuan = $request->email;
    //Mail::to($tujuan)->send(new SendEmail($isi_email));

    //User created, return success response
    return response()->json([
      'status'  => 200,
      'message' => 'User created successfully',
      'data'    => $user
    ], Response::HTTP_OK);
  }

  public function upload(Request $request)
  {
    $image     = $request->image;                                    // your base64 encoded
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

  public function hashPassword(Request $request)
  {
    if ($request->password == "") {
      echo "Tada!";
    } else {
      echo bcrypt($request->password);
    }
  }

  public function authenticate(Request $request)
  {
    $credentials = $request->only('user_email', 'user_password');

    $user = User::where('user_email', '=', $credentials['user_email'])
      ->where(function ($query) {
        $query->where('user_role', 'admin')
          ->orWhere('user_role', 'superadmin');
      })
      ->first();

    $is_active = User::where('user_email', '=', $credentials['user_email'])
      ->where(function ($query) {
        $query->where('user_status', 1);
      })
      ->first();

    if (!$user) {
      return response()->json([
        'status'  => 400,
        'message' => 'User with that email is not found.',
      ], 400);
    } else if (!$is_active) {
      return response()->json([
        'status'  => 400,
        'message' => 'User with that email is not active.',
      ], 400);
    }
    // verify the credentials and create a token for the user
    try {
      if (!password_verify($credentials["user_password"], $user->user_password)) {
        return response()->json([
          'status'  => 400,
          'message' => 'Password is wrong.',
        ], 400);
      } else {
        // if (! $token = JWTAuth::attempt($credentials)) {
        if (!$token = JWTAuth::fromUser($user)) {
          return response()->json([
            'status'  => 400,
            'message' => 'Login credentials are invalid.',
          ], 400);
        }
      }
    } catch (JWTException $e) {
      return response()->json([
        'status'  => 500,
        'message' => 'Could not create token.',
      ], 500);
    }
    return response()->json([
      'status' => 200,
      'token'  => $token,
      'user'   => $user
    ]);
  }

  public function logout(Request $request)
  {
    //valid credential
    $validator = Validator::make($request->only('token'), [
      'token' => 'required'
    ]);

    //Send failed response if request is not valid
    if ($validator->fails()) {
      return response()->json(['error' => $validator->messages()], 200);
    }

    //Request is validated, do logout
    try {
      JWTAuth::invalidate($request->token);

      return response()->json([
        'status'  => 200,
        'message' => 'User has been logged out'
      ]);
    } catch (JWTException $exception) {
      return response()->json([
        'status'  => 500,
        'message' => 'Sorry, user cannot be logged out'
      ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
  }

  public function get_user(Request $request)
  {
    $this->validate($request, [
      'token' => 'required'
    ]);

    $user = JWTAuth::authenticate($request->token);

    return response()->json(['user' => $user]);
  }

  public function getAuthenticatedUser()
  {
    try {
      if (!$user = JWTAuth::parseToken()->authenticate()) {
        return response()->json(['user_not_found'], 404);
      }
    } catch (TokenExpiredException $e) {

      return response()->json(['token_expired'], $e->getStatusCode());
    } catch (TokenInvalidException $e) {

      return response()->json(['token_invalid'], $e->getStatusCode());
    } catch (JWTException $e) {

      return response()->json(['token_absent'], $e->getStatusCode());
    }

    return response()->json(compact('user'));
  }

  public function get(Request $request)
  {
    $query = User::select(["*"]);
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
    $user = User::select('*')
      ->find($id);

    if (!$user) {
      return response()->json([
        'status'  => 200,
        'message' => 'Data Not Found',
        'data'    => null
      ], Response::HTTP_OK);
    } else {
      return response()->json([
        'status'  => 200,
        'message' => 'Data Found',
        'data'    => $user
      ], Response::HTTP_OK);
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, User $user)
  {
    //Validate data
    $data      = $request->only('name', 'email', 'password', 'role', 'updated_dt', 'updated_by');
    $validator = Validator::make($data, [
      'name'       => 'required|string',
      'email'      => 'required|email|unique:users,email',
      'password'   => 'required|string|min:8|max:50',
      'role'       => 'required|string|max:10',
      'updated_by' => 'string'
    ], [
      'name.required'     => 'Name is Required',
      'name.string'       => 'Name Must Be String',
      'email.required'    => 'Email is Required',
      'email.unique'      => 'Email Has Already Been Taken',
      'password.required' => 'Password is Required',
      'password.string'   => 'Password Must Be String',
      'password.min'      => 'Password Must Be At Least 8 Character',
      'password.max'      => 'Password Must Not Be Greater Than 50 Characters',
      'role.required'     => 'Role is Required',
    ]);

    //Request is valid, update user
    $user = $user->update([
      'name'       => $request->name,
      'email'      => $request->email,
      'password'   => bcrypt($request->password),
      'role'       => $request->role,
      'updated_dt' => date("Y-m-d H:i:s"),
      'updated_by' => $request->name
    ]);

    //User updated, return success response
    return response()->json([
      'status'  => 200,
      'message' => 'Data updated successfully',
      'data'    => $user
    ], Response::HTTP_OK);
  }

  public function admin(Request $request, User $user)
  {
    //delete if not active user
    $user->update([
      'user_role' => "admin"
    ]);

    //respon success
    return response()->json([
      'status'  => 200,
      'message' => 'Data updated successfully'
    ], Response::HTTP_OK);
  }

  public function superAdmin(Request $request, User $user)
  {
    //delete if not active user
    $user->update([
      'user_role' => "superadmin"
    ]);

    //respon success
    return response()->json([
      'status'  => 200,
      'message' => 'Data updated successfully'
    ], Response::HTTP_OK);
  }

  public function destroy($id)
  {
    //get all data perda by id
    $user = User::where('id', '=', $id)->get();
    //count data for True or false
    $count = count($user);
    //check for delete
    if ($count === 1) {
      //delete
      if ($id == Auth::id()) {
        return response()->json([
          'status'  => 400,
          'message' => "You can't block this data"
        ], 400);
      } else if ($id != Auth::id()) {
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
