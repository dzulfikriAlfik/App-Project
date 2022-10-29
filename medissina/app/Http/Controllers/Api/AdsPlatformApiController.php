<?php

namespace App\Http\Controllers\Api;

use Auth;
use JWTAuth;
use App\Models\Ads;
use App\Models\AdsType;
use App\Models\AdsPlatform;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;

class AdsPlatformApiController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

   protected $ads_platform;

   public function __construct()
   {
      $this->ads_platform = JWTAuth::parseToken()->authenticate();
   }

   public function index(Request $request)
   {
      //
   }

   public function get(Request $request)
   {
      $query = AdsPlatform::select("*");

      // by ads_platform_name
      if ($request->ads_platform_name != "") {
         $query = $query->where('ads_platform_name', 'LIKE', "%" . $request->ads_platform_name . "%");
      }

      // // by ads_platform_status
      if ($request->ads_platform_status != "") {
         $query = $query->where('ads_platform_status', $request->ads_platform_status);
      }

      $data = $query->paginate(10);
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

   public function activate(AdsPlatform $ads_platform)
   {
      AdsType::where("ads_platform_id", $ads_platform->ads_platform_id)->update(['ads_type_status' => 1]);

      //change ads_platform_status to 1
      $ads_platform->update([
         'ads_platform_status' => 1
      ]);

      //respon success
      return response()->json([
         'status'  => 200,
         'message' => 'Ads Platform have been successfully activated'
      ], Response::HTTP_OK);
   }

   public function inactive(AdsPlatform $ads_platform)
   {
      AdsType::where("ads_platform_id", $ads_platform->ads_platform_id)->update(['ads_type_status' => 0]);

      //change ads_platform_status to 0
      $ads_platform->update([
         'ads_platform_status' => 0
      ]);

      //respon success
      return response()->json([
         'status'  => 200,
         'message' => 'Ads Platform have been successfully inactive'
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
         'ads_platform_name' => 'required|string'
      ], [
         'ads_platform_name.required' => 'Judul iklan is Required'
      ]);

      //Send failed response if request is not valid
      if ($validator->fails()) {
         return response()->json(['error' => $validator->messages()], 200);
      }

      //Request is valid, create new Trivia
      $ads_platform = AdsPlatform::create([
         'ads_platform_name'   => $request->ads_platform_name,
         'ads_platform_status' => 0
      ]);

      return response()->json([
         'status'  => 200,
         'message' => 'Data created successfully',
         'data'    => $ads_platform
      ], Response::HTTP_OK);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Ads  $ads
    * @return \Illuminate\Http\Response
    */
   public function show(AdsPlatform $ads_platform)
   {
      if (!$ads_platform) {
         return response()->json([
            'status'  => 200,
            'message' => 'Data Not Found',
            'data'    => null
         ], Response::HTTP_OK);
      } else {
         return response()->json([
            'status'  => 200,
            'message' => 'Data Found',
            'data'    => $ads_platform
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
   public function update(Request $request, AdsPlatform $ads_platform)
   {
      //Validate data
      $data      = $request->all();
      $validator = Validator::make($data, [
         'ads_platform_name' => 'required|string'
      ], [
         'ads_platform_name.required' => 'Ads Platform is Required'
      ]);

      //Send failed response if request is not valid
      if ($validator->fails()) {
         return response()->json(['error' => $validator->messages()], 200);
      }

      //Request is valid, update trivia
      $ads_platform->update([
         'ads_platform_name' => $request->ads_platform_name
      ]);

      //User updated, return success response
      return response()->json([
         'status'  => 200,
         'message' => 'Data updated successfully',
         'data'    => $ads_platform
      ], Response::HTTP_OK);
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Ads  $ads
    * @return \Illuminate\Http\Response
    */
   public function destroy(AdsPlatform $ads_platform)
   {
      // AdsType::destroy($ads_platform->ads_type_id);
      AdsType::where("ads_platform_id", $ads_platform->ads_platform_id)->delete();
      $ads_platform->delete();
      return response()->json([
         'status'  => 200,
         'message' => 'Data deleted successfully'
      ], Response::HTTP_OK);
   }
}
