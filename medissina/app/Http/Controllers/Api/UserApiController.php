<?php

namespace App\Http\Controllers\Api;

use Auth;
use File;
use JWTAuth;
use App\Models\User;
use App\Models\Topup;
use App\Mail\SendEmail;
use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class UserApiController extends Controller
{
  private const IV_KEY     = "UHEFIU0989834R93HFBF8-982R29";
  private const ENC_METHOD = "AES-256-CBC";

  public function register(Request $request)
  {
    // echo "Test";
    // echo response()->json($request);
    // die;
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

  public function get_saldo($id)
  {
    $user       = User::select('user_id', 'user_saldo', 'user_point')->find($id);
    $point      = $user['user_point'];
    $user_point = self::secure_user_point('decrypt', $point, $id);

    return response()->json([
      'status'     => 200,
      'message'    => 'Data Found',
      'data'       => $user,
      'user_point' => $user_point
    ], Response::HTTP_OK);
  }

  public function topup(Request $request)
  {
    //Validate data
    $validator = Validator::make($request->only("topup_amt"), [
      'topup_amt' => 'required|numeric|min:25000',
    ], [
      'topup_amt.required' => 'Topup amount is requred',
      'topup_amt.numeric'  => 'Topup amount must be an integer input',
      'topup_amt.min'      => 'Topup amount must be higher than 25000',
    ]);

    //Send failed response if request is not valid
    if ($validator->fails()) {
      return response()->json(['error' => $validator->messages()], 400);
    }

    $user_id = $request->user_id;
    $user    = User::select('*')->find($user_id);
    // cek apakah terdapat invoice yang belum dibayarkan
    $pending = self::check_pending_payment($user_id);
    if ($pending != null) {
      // jika terdapat invoice yg belum dibayarkan stop program dan tampilkan error
      return response()->json([
        'status'  => 400,
        'message' => "Terdapat invoice yang belum dibayarkan, mohon selesaikan terlebih dahulu",
        'data'    => $pending
      ]);
    } else if ($pending == null) {
      // jika tidak ada pembayaran pending isi ke table topup
      $now       = date("Y-m-d H:i:s");
      $topup_val = (int) $request->topup_amt;
      // get voucher
      $voucher = Voucher::where('voucher_code', $request->voucher)
        ->where('voucher_min_trans', '<=', $request->topup_amt)
        ->where('voucher_expired', '>', $now)
        ->where('voucher_quantity', '>', 0)
        ->whereRaw('voucher_quantity > voucher_used')
        ->where('voucher_status', 1)
        ->get()->first();
      if (!$voucher) {
        // jika voucher tidak valid
        $pay_amt = (int) $topup_val + 2000;
        $topup_amt = (int) $topup_val;
        $voucher_id = null;
        $sub_total = null;
        $voucher_type = null;
      } else {
        // jika voucher valid
        $voucher_id          = $voucher->voucher_id;
        $voucher_type        = $voucher->voucher_type;
        $voucher_amount      = $voucher->voucher_amount;
        $voucher_amount_type = $voucher->voucher_amount_type;

        if ($voucher_amount_type == "percent") {
          $sub_total = (int) $topup_val * ((int) $voucher_amount / 100);
        } else {
          $sub_total = (int) $voucher_amount;
        }

        if ($voucher_type == "cashback") {
          $pay_amt = (int) $topup_val + 2000;
          $topup_amt = (int) $topup_val + $sub_total;
        } else if ($voucher_type == "diskon") {
          $pay_amt = (int) $topup_val + 2000 - (int) $sub_total;
          $topup_amt = (int) $topup_val;
        }

        $voucher->update([
          'voucher_used' => $voucher->voucher_used + 1
        ]);
      }

      $saveData = [
        "voucher_id"   => $voucher_id,
        "topup_amt"    => $topup_amt,
        "voucher_amt"  => $sub_total,
        "voucher_type" => $voucher_type,
        "pay_amt"      => $pay_amt,
        "user_id"      => $user_id,
        "topup_status" => "new",
        "invoice_id"   => uniqid("SCH-"),
      ];

      // return response()->json([
      //    'status'  => 200,
      //    'message' => "Just test and debugging",
      //    'data'    => $saveData,
      // ], Response::HTTP_OK);
      // die;

      $topup = Topup::create($saveData);

      // send request to xendit
      /* API URL */
      $url = 'https://api.xendit.co/v2/invoices';
      //$scs_url = '';

      /* Init cURL resource */
      $ch = curl_init($url);

      /* Array Parameter Data */
      $data = ['external_id' => $saveData['invoice_id'], 'amount' => $saveData['pay_amt'], 'payer_email' => $user->user_email, 'description' => 'Topup Schfess'];

      /* pass encoded JSON string to the POST fields */
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

      /* set the content type json */
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Basic ' . env("TOKEN_XEN")));

      /* set return type json */
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      /* execute request */
      $result = curl_exec($ch);

      /* close cURL resource */
      curl_close($ch);

      $arr_result = json_decode($result);

      // return response()->json([
      //    'status'  => "anything",
      //    'message' => 'Just test and debugging',
      //    'data'    => $ch,
      // ], Response::HTTP_OK);

      if (isset($arr_result->id)) {
        $upd['invoice_url'] = $arr_result->invoice_url;
        $topup->update($upd);
        return response()->json([
          'status'  => 200,
          'message' => 'Success sending payment request',
          'data'    => $arr_result->invoice_url,
        ], Response::HTTP_OK);
      } else {
        $topup->update(['topup_status' => 'failed']);
        return response()->json([
          'status'  => 400,
          'message' => "Topup Gagal",
          'data'    => $result,
        ]);
      }
    }
  }

  private static function check_pending_payment($user_id)
  {
    $yesterday = date("Y-m-d H:i:s", strtotime('-1 days'));
    $query     = Topup::select('*')
      ->where("user_id", $user_id)
      ->where("topup_status", "new")
      ->where("created", ">=", $yesterday)
      ->get("*")->first();
    return $query;
  }

  public static function update_user_point($user_id, $price)
  {
    //Request is valid, update_user_point
    $user      = User::find($user_id);
    $point     = $user["user_point"];
    $point_dec = self::secure_user_point('decrypt', $point, $user_id);

    if ($point_dec <= 0) {
      return false;
    }
    if ($price > $point_dec) {
      return false;
    }

    $final_saldo = (int) $point_dec - (int) $price;
    $point_enc   = self::secure_user_point('encrypt', $final_saldo, $user_id);
    $user->update([
      'user_saldo' => $final_saldo,
      'user_point' => $point_enc,
    ]);

    return $user;
  }

  public static function secure_user_point($action, $string, $key)
  {
    $output     = false;
    $secret_key = $key;
    $secret_iv  = self::IV_KEY;
    $key        = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if ($action == 'encrypt') {
      $output = openssl_encrypt($string, self::ENC_METHOD, $key, 0, $iv);
      $output = base64_encode($output);
    } else if ($action == 'decrypt') {
      $output = openssl_decrypt(base64_decode($string), self::ENC_METHOD, $key, 0, $iv);
    }

    return $output;
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

  public function update_partner(Request $request, User $user)
  {
    $validator = Validator::make($request->all(), [
      'user_name' => 'required|string',
      // check unique email in database but itself
      'user_email'        => 'required|email|unique:user,user_email,' . $user->user_id . ',user_id',
      'user_phone'        => 'required|numeric',
      'user_company'      => 'required|string',
      'user_company_type' => 'required|string'
    ], [
      'user_name.required'         => 'Name is Required',
      'user_name.string'           => 'Name Must Be String',
      'user_email.required'        => 'Email is Required',
      'user_email.unique'          => 'Email Has Already Been Taken',
      'user_phone.required'        => 'No. Hp is Required',
      'user_phone.numeric'         => 'Ho. Hp Must Be Number',
      'user_company.required'      => 'Nama Perusahaan is Required',
      'user_company.string'        => 'Nama perusahaan Must Be String',
      'user_company_type.required' => 'Jenis Usaha is Required'
    ]);

    //Send failed response if request is not valid
    if ($validator->fails()) {
      return response()->json(['error' => $validator->messages()], 200);
    }

    // check is partner edited the image
    if ($request->user_image == $user->user_image) {
      $imageName = $user->user_image;
    } else {
      // upload image
      $image     = $request->user_image;                               // your base64 encoded
      $image     = str_replace('data:image/png;base64,', '', $image);
      $image     = str_replace(' ', '+', $image);
      $imageName = 'User-' . time() . '.' . 'png';

      $path     = storage_path('app/public/user-profile');
      $fullpath = $path . '/' . $imageName;

      if ($user->user_image != 'user.png') {
        $oldfile = storage_path('app/public/user-profile/' . $user->user_image);
        File::delete($oldfile);
      }

      if (!File::isDirectory($path)) {
        File::makeDirectory($path, 0777, true, true);
      }
      File::put($fullpath, base64_decode($image));
    }

    // requested data
    $input_data = [
      'user_name'         => $request->user_name,
      'user_email'        => $request->user_email,
      'user_phone'        => $request->user_phone,
      'user_company'      => $request->user_company,
      'user_company_type' => $request->user_company_type,
      'user_image'        => $imageName
    ];

    // check if user change password or not
    if ($request->user_password != "") {
      $input_data['user_password'] = bcrypt($request->user_password);
    }

    //Request is valid, create new user
    $user->update($input_data);

    //User updated, return success response
    return response()->json([
      'status'  => 200,
      'message' => 'User updated successfully',
      'data'    => $user
    ], Response::HTTP_OK);
  }

  public function admin_pass(Request $request, User $user)
  {
    $validator = Validator::make($request->all(), [
      'user_password' => 'required|min:8|max:50',
    ], [
      'user_password.required' => 'Password is Required',
      'user_password.min'      => 'Password Must Be At Least 8 Character',
      'user_password.max'      => 'Password Must Not Be Greater Than 50 Characters',
    ]);

    //Send failed response if request is not valid
    if ($validator->fails()) {
      return response()->json(['error' => $validator->messages()], 200);
    }

    // check if user change password or not
    if ($request->user_password != "") {
      $input_data['user_password'] = bcrypt($request->user_password);
    }

    //Request is valid, create new user
    $user->update($input_data);
    //User updated, return success response
    return response()->json([
      'status'  => 200,
      'message' => 'User updated successfully',
      'data'    => $user
    ], Response::HTTP_OK);
  }

  public function block(Request $request, User $user)
  {
    //delete if not active user
    $user->update([
      'user_banned' => 1
    ]);

    //respon success
    return response()->json([
      'status'  => 200,
      'message' => 'Data blocked successfully'
    ], Response::HTTP_OK);
  }

  public function unblock(Request $request, User $user)
  {
    //delete if not active user
    $user->update([
      'user_banned' => 0
    ]);

    //respon success
    return response()->json([
      'status'  => 200,
      'message' => 'Data unblocked successfully'
    ], Response::HTTP_OK);
  }

  public function activate(Request $request, User $user)
  {
    //delete if not active user
    $user->update([
      'user_status' => 1
    ]);

    //respon success
    return response()->json([
      'status'  => 200,
      'message' => 'Partner have been successfully activated'
    ], Response::HTTP_OK);
  }

  public function pending(Request $request, User $user)
  {
    //delete if not active user
    $user->update([
      'user_status' => 0
    ]);

    //respon success
    return response()->json([
      'status'  => 200,
      'message' => 'Partner have been successfully blocked'
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

  public function adminAds(Request $request, User $user)
  {
    //delete if not active user
    $user->update([
      'user_role' => "adminads"
    ]);

    //respon success
    return response()->json([
      'status'  => 200,
      'message' => 'Data updated successfully'
    ], Response::HTTP_OK);
  }

  public function removeAdmin(Request $request, User $user)
  {
    //delete if not active user
    $user->update([
      'user_role' => "user"
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
