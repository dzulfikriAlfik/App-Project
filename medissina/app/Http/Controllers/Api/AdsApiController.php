<?php

namespace App\Http\Controllers\Api;

use Auth;
use File;
use JWTAuth;
use App\Models\Ads;
use App\Models\User;
use App\Mail\SendEmail;
use App\Models\AdsType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Api\UserApiController as UserApi;

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
         'ads.ads_link',
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

   public function get_ads_type(Request $request)
   {
      $query = AdsType::select("*");

      // by ads_type_name
      if ($request->ads_type_name != "") {
         $query = $query->where('ads_type_name', $request->ads_type_name);
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

   public function approve(Request $request, Ads $ads)
   {
      //delete if not active user
      $ads->update([
         'ads_status'  => 1,
         'approved_dt' => date("Y-m-d h:i:s")
      ]);

      //respon success
      return response()->json([
         'status'  => 200,
         'message' => 'Iklan telah disetujui untuk ditayangkan'
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
         'message' => 'Iklan berhasil ditolak'
      ], Response::HTTP_OK);
   }

   public function suspend(Request $request, Ads $ads)
   {
      $ads->update([
         'ads_status'     => 3,
         'suspend_reason' => $request->suspend_reason
      ]);

      //respon success
      return response()->json([
         'status'  => 200,
         'message' => 'Iklan berhasil disuspend'
      ], Response::HTTP_OK);
   }

   public function pause(Ads $ads)
   {
      $ads->update([
         'ads_status' => 4
      ]);

      //respon success
      return response()->json([
         'status'  => 200,
         'message' => 'Penayangan iklan diberhentikan sementara'
      ], Response::HTTP_OK);
   }

   public function resume(Ads $ads)
   {
      $ads->update([
         'ads_status' => 1
      ]);

      //respon success
      return response()->json([
         'status'  => 200,
         'message' => 'Penayangan iklan dilanjutkan'
      ], Response::HTTP_OK);
   }

   public function download($id)
   {
      $ads = Ads::find($id);
      if ($ads) {
         $file = $ads["ads_image"];
         //download document
         if (Storage::disk('public')->exists("ads-image/$file")) {
            $path    = Storage::disk('public')->path("ads-image/$file");
            $content = File_get_contents($path);
            return response($content)->withHeaders([
               'Content-Type' => mime_content_type($path)
            ]);
         }
      } else {
         //return response id not found
         return response()->json([
            'status'  => 200,
            'message' => 'ID Not Found'
         ], Response::HTTP_OK);
      }
   }

   public function store(Request $request)
   {
      //Validate data
      $data = $request->all();

      $validate_list = [
         'ads_title'      => 'string',
         'ads_desc'       => 'string',
         'ads_placement'  => 'string',
         'ads_type'       => 'required|string',
         'ads_link'       => 'required|string',
         'ads_qty'        => 'required|numeric',
         'ads_start_date' => 'required',
         'ads_end_date'   => 'required',
      ];

      $message = [
         'ads_title.string'        => 'Judul iklan is Must be string input',
         'ads_desc.string'         => 'Deskripsi iklan is Must be string input',
         'ads_placement.string'    => 'Ads Placement is Must be string input',
         'ads_link.required'       => 'Link iklan is Required',
         'ads_type.required'       => 'Ads Type is Required',
         'ads_qty.required'        => 'Ads Quantity is Required',
         'ads_qty.numeric'         => 'Ads Quantity should be integer',
         'ads_start_date.required' => 'Ads Start Date is Required',
         'ads_end_date.required'   => 'Ads End Date is Required',
      ];

      $validator = Validator::make($data, $validate_list, $message);

      //Send failed response if request is not valid
      if ($validator->fails()) {
         return response()->json(['error' => $validator->messages()], 200);
      }

      // upload image if exist
      if ($request->ads_image) {
         $image     = $request->ads_image;                                // your base64 encoded
         $image     = str_replace('data:image/png;base64,', '', $image);
         $image     = str_replace(' ', '+', $image);
         $imageName = time() . '.' . 'png';
         $path      = storage_path('app/public/ads-image');
         $fullpath  = $path . '/' . $imageName;
         if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
         }
         File::put($fullpath, base64_decode($image));
      } else {
         // otherwise the type is twitter
         $imageName = "twitter.png";
      }

      $ads_price = AdsType::where('ads_type_id', $request->ads_type)->get('ads_type_price')->first();
      $total_price = (int)$ads_price->ads_type_price * (int)$request->ads_qty;
      $user = UserApi::update_user_point(Auth::id(), $total_price);

      if ($user == false) {
         return response()->json([
            'status'  => 400,
            'message' => "Saldo user tidak cukup",
         ], 400);
      }

      //Request is valid, create new Ads
      $ads = Ads::create([
         'ads_title'      => $request->ads_title,
         'ads_desc'       => $request->ads_desc,
         'ads_link'       => $request->ads_link,
         'ads_view'       => 0,
         'ads_click'      => 0,
         'ads_type'       => $request->ads_type,
         'ads_placement'  => $request->ads_placement,
         'ads_quantity'   => (int)$request->ads_qty,
         'ads_image'      => $imageName,
         'ads_status'     => 0,
         'ads_start_date' => $request->ads_start_date,
         'ads_end_date'   => $request->ads_end_date,
         'created_dt'     => date("Y-m-d h:i:s"),
         'created_by'     => Auth::id(),
         'updated_dt'     => date("Y-m-d h:i:s"),
         'updated_by'     => Auth::id()
      ]);

      return response()->json([
         'status'  => 200,
         'message' => 'Data created successfully',
         'data'    => [
            "ads" => $ads,
            "sisal saldo" => $user->user_saldo
         ]
      ], Response::HTTP_OK);
   }

   public function update_qty(Request $request, Ads $ads)
   {
      //Validate data
      $data      = $request->only("qty_added");
      $validator = Validator::make($data, [
         'qty_added' => 'required|numeric',
      ], [
         'qty_added.string'  => 'Ads Quantity is requred',
         'qty_added.numeric' => 'Ads Quantity must be integer input',
      ]);

      //Send failed response if request is not valid
      if ($validator->fails()) {
         return response()->json(['error' => $validator->messages()], 400);
      }

      $ads_price = AdsType::where('ads_type_id', $request->ads_type)->get('ads_type_price')->first();
      $ads_qty = $ads->ads_quantity + $request->qty_added;
      $total_price = (int)$ads_price->ads_type_price * (int)$request->qty_added;

      $user = UserApi::update_user_point(Auth::id(), $total_price);

      if ($user == false) {
         return response()->json([
            'status'  => 400,
            'message' => "Saldo user tidak cukup",
         ], 400);
      }
      // //Request is valid, update ads
      $ads->update([
         'ads_quantity' => $ads_qty,
      ]);

      //User updated, return success response
      return response()->json([
         'status'  => 200,
         'message' => 'Data updated successfully',
         'data'    => [
            "ads" => $ads,
            "sisa saldo" => $user,
         ]
      ], Response::HTTP_OK);
   }

   public function update(Request $request, Ads $ads)
   {
      //Validate data
      $data      = $request->all();
      $validator = Validator::make($data, [
         'ads_title'      => 'required|string',
         'ads_desc'       => 'required|string',
         'ads_placement'  => 'required|string',
         'ads_type'       => 'required|string',
         'ads_link'       => 'required|string',
         'ads_start_date' => 'required',
         'ads_end_date'   => 'required',
      ], [
         'ads_title.string'        => 'Judul iklan is Must be string input',
         'ads_desc.string'         => 'Deskripsi iklan is Must be string input',
         'ads_placement.string'    => 'Ads Placement is Must be string input',
         'ads_link.required'       => 'Link iklan is Required',
         'ads_type.required'       => 'Ads Type is Required',
         'ads_start_date.required' => 'Ads Start Date is Required',
         'ads_end_date.required'   => 'Ads End Date is Required',
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
         $image     = $request->ads_image;                                // your base64 encoded
         $image     = str_replace('data:image/png;base64,', '', $image);
         $image     = str_replace(' ', '+', $image);
         $imageName = time() . '.' . 'png';
         $path      = storage_path('app/public/ads-image');
         $fullpath  = $path . '/' . $imageName;

         $oldfile = storage_path('app/public/ads-image/' . $ads->ads_image);
         File::delete($oldfile);

         if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
         }
         File::put($fullpath, base64_decode($image));
      }

      //Request is valid, update Ads
      $ads->update([
         'ads_title'      => $request->ads_title,
         'ads_desc'       => $request->ads_desc,
         'ads_link'       => $request->ads_link,
         'ads_type'       => $request->ads_type,
         'ads_placement'  => $request->ads_placement,
         'ads_image'      => $imageName,
         'ads_start_date' => $request->ads_start_date,
         'ads_end_date'   => $request->ads_end_date,
         'ads_status'     => 0,
         'updated_by'     => Auth::id(),
         'updated_dt'     => date("Y-m-d h:i:s"),
      ]);

      //User updated, return success response
      return response()->json([
         'status'  => 200,
         'message' => 'Data updated successfully',
         'data'    => $ads
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
      if ($ads->ads_image != "twitter.png") {
         $oldfile = storage_path('app/public/ads-image/' . $ads->ads_image);
         File::delete($oldfile);
      }

      $ads->delete();

      return response()->json([
         'status'  => 200,
         'message' => 'Data deleted successfully'
      ], Response::HTTP_OK);
   }
}
