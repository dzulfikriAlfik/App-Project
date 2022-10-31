<?php

namespace App\Http\Controllers\Api;

use Auth;
use JWTAuth;
use App\Models\Ads;
use App\Models\User;
use App\Mail\SendEmail;
use App\Models\AdsType;
use App\Models\AdsPlatform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;

class AdsTypeApiController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

   protected $ads_type;

   public function __construct()
   {
      $this->ads_type = JWTAuth::parseToken()->authenticate();
   }

   public function index(Request $request)
   {
      //
   }

   public function get(Request $request)
   {
      $query  = AdsType::join('ads_platform', 'ads_type.ads_platform_id', '=', 'ads_platform.ads_platform_id');
      $select = [
         'ads_type.ads_type_id',
         'ads_type.ads_platform_id',
         'ads_type.ads_type_name',
         'ads_type.ads_type_width',
         'ads_type.ads_type_height',
         'ads_type.ads_type_price',
         'ads_type.ads_type_used',
         'ads_type.ads_type_status',
         'ads_platform.ads_platform_id',
         'ads_platform.ads_platform_name',
         'ads_platform.ads_platform_status',
      ];
      $query->select($select);

      $query->where("ads_platform.ads_platform_status", "!=", 0);

      // $query = AdsType::select("*");

      // by ads_type_name
      if ($request->ads_type_name != "") {
         $query = $query->where('ads_type_name', 'LIKE', "%" . $request->ads_type_name . "%");
      }

      if ($request->ads_platform_id != "") {
         $query = $query->where('ads_type.ads_platform_id', $request->ads_platform_id);
      }

      // // by role
      if ($request->ads_type_status != "") {
         $query = $query->where('ads_type_status', $request->ads_type_status);
      }

      $data = $query->orderBy("ads_type.ads_platform_id", "DESC")->paginate(10);
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

   public function activate(AdsType $ads_type)
   {
      //delete if not active user
      $ads_type->update([
         'ads_type_status' => 1
      ]);

      //respon success
      return response()->json([
         'status'  => 200,
         'message' => 'Ads Type have been successfully activated'
      ], Response::HTTP_OK);
   }

   public function inactive(AdsType $ads_type)
   {
      //delete if not active user
      $ads_type->update([
         'ads_type_status' => 0
      ]);

      //respon success
      return response()->json([
         'status'  => 200,
         'message' => 'Ads Type have been successfully inactive'
      ], Response::HTTP_OK);
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
      $data      = $request->all();
      $validator = Validator::make($data, [
         'ads_type_id'     => 'required|string',
         'ads_type_name'   => 'required|string',
         'ads_platform_id' => 'required|string',
         'ads_type_width'  => 'required|string',
         'ads_type_height' => 'required|string',
         'ads_type_price'  => 'required|numeric',
         'ads_type_used'   => 'required'
      ], [
         'ads_type_id.required'     => 'Judul iklan is Required',
         'ads_type_id.string'       => 'Judul iklan should be string input',
         'ads_type_name.required'   => 'Judul iklan is Required',
         'ads_platform_id.required' => 'Ads Platform is Required',
         'ads_type_width.required'  => 'Deskripsi iklan is Required',
         'ads_type_height.required' => 'Ads Placement is Required',
         'ads_type_price.required'  => 'Ads Price is Required',
         'ads_type_price.numeric'   => 'Ads Price is should be integer',
         'ads_type_used.required'   => 'Ads Used is Required',
      ]);

      //Send failed response if request is not valid
      if ($validator->fails()) {
         return response()->json(['error' => $validator->messages()], 200);
      }

      //Request is valid, create new Trivia
      $ads_type = AdsType::create([
         'ads_type_id'     => $request->ads_type_id,
         'ads_type_name'   => $request->ads_type_name,
         'ads_platform_id' => $request->ads_platform_id,
         'ads_type_width'  => $request->ads_type_width,
         'ads_type_height' => $request->ads_type_height,
         'ads_type_price'  => $request->ads_type_price,
         'ads_type_used'   => $request->ads_type_used,
         'ads_type_status' => 0
      ]);

      return response()->json([
         'status'  => 200,
         'message' => 'Data created successfully',
         'data'    => $ads_type
      ], Response::HTTP_OK);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Ads  $ads
    * @return \Illuminate\Http\Response
    */
   public function show(AdsType $ads_type)
   {
      $query  = $ads_type::join('ads_platform', 'ads_type.ads_platform_id', '=', 'ads_platform.ads_platform_id');
      $select = [
         'ads_type.ads_type_id',
         'ads_type.ads_platform_id',
         'ads_type.ads_type_name',
         'ads_type.ads_type_width',
         'ads_type.ads_type_height',
         'ads_type.ads_type_price',
         'ads_type.ads_type_used',
         'ads_type.ads_type_status',
         'ads_platform.ads_platform_id',
         'ads_platform.ads_platform_name',
      ];

      $query = DB::table('ads_type')
         ->join('ads_platform', 'ads_type.ads_platform_id', '=', 'ads_platform.ads_platform_id')
         ->select($select)->where("ads_type_id", '=', $ads_type->ads_type_id)->first();

      if (!$query) {
         return response()->json([
            'status'  => 200,
            'message' => 'Data Not Found',
            'data'    => null
         ], Response::HTTP_OK);
      } else {
         return response()->json([
            'status'  => 200,
            'message' => 'Data Found',
            'data'    => $query
         ], Response::HTTP_OK);
      }
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Ads  $ads
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, AdsType $ads_type)
   {
      //Validate data
      $data      = $request->all();
      $validator = Validator::make($data, [
         'ads_type_id'     => 'required|string',
         'ads_type_name'   => 'required|string',
         'ads_platform_id' => 'required|string',
         'ads_type_width'  => 'required|string',
         'ads_type_height' => 'required|string',
         'ads_type_price'  => 'required|numeric',
         'ads_type_used'   => 'required'
      ], [
         'ads_type_id.required'     => 'Judul iklan is Required',
         'ads_type_id.string'       => 'Judul iklan should be string input',
         'ads_type_name.required'   => 'Judul iklan is Required',
         'ads_platform_id.required' => 'Ads Platform is Required',
         'ads_type_width.required'  => 'Deskripsi iklan is Required',
         'ads_type_height.required' => 'Ads Placement is Required',
         'ads_type_price.required'  => 'Ads Price is Required',
         'ads_type_price.numeric'   => 'Ads Price is should be integer',
         'ads_type_used.required'   => 'Ads Used is Required',
      ]);

      //Send failed response if request is not valid
      if ($validator->fails()) {
         return response()->json(['error' => $validator->messages()], 200);
      }

      $send = [
         'ads_type_id'     => $request->ads_type_id,
         'ads_type_name'   => $request->ads_type_name,
         'ads_platform_id' => $request->ads_platform_id,
         'ads_type_width'  => $request->ads_type_width,
         'ads_type_height' => $request->ads_type_height,
         'ads_type_price'  => (int)$request->ads_type_price,
         'ads_type_used'   => $request->ads_type_used,
      ];

      // also update ads where ads_type == adsTypeIdLama
      DB::table('ads')
         ->where('ads_type', $ads_type->ads_type_id)
         ->update(['ads_type' => $request->ads_type_id]);

      //Request is valid, update trivia
      $ads_type->update($send);

      //User updated, return success response
      return response()->json([
         'status'  => 200,
         'message' => 'Data updated successfully',
         'data'    => $ads_type
      ], Response::HTTP_OK);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Ads  $ads
    * @return \Illuminate\Http\Response
    */
   public function destroy(AdsType $ads_type)
   {
      // AdsType::destroy($ads_type->ads_type_id);
      $ads_type->delete();
      return response()->json([
         'status'  => 200,
         'message' => 'Data deleted successfully'
      ], Response::HTTP_OK);
   }
}
