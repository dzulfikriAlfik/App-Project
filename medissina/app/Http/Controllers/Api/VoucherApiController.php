<?php

namespace App\Http\Controllers\api;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class VoucherApiController extends Controller
{
   protected $voucher;

   public function __construct()
   {
      $this->voucher = JWTAuth::parseToken()->authenticate();
   }

   public function index(Request $request)
   {
      $query = Voucher::select("*");

      // by voucher_name
      if ($request->voucher_name != "") {
         $query = $query->where('voucher_name', 'LIKE', "%" . $request->voucher_name . "%");
      }

      // by voucher_type
      if ($request->voucher_type != "") {
         $query = $query->where('voucher_type', $request->voucher_type);
      }

      // by voucher_amount_type
      if ($request->voucher_amount_type != "") {
         $query = $query->where('voucher_amount_type', $request->voucher_amount_type);
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

   public function create(Request $request)
   {
      //
   }

   public function store(Request $request)
   {
      //Validate data
      $data = $request->only("voucher_name", "voucher_code", "voucher_desc", "voucher_amount", "voucher_amount_type", "voucher_type", "voucher_quantity", "voucher_min_trans", "voucher_expired");

      $validator = self::validate_voucher($request, $data);

      //Send failed response if request is not valid
      if ($validator->fails()) {
         return response()->json(['error' => $validator->messages()], 400);
      }

      //Request is valid, create new Trivia
      $voucher = Voucher::create([
         'voucher_name'        => $request->voucher_name,
         'voucher_code'        => $request->voucher_code,
         'voucher_description' => $request->voucher_desc,
         'voucher_amount'      => $request->voucher_amount,
         'voucher_amount_type' => $request->voucher_amount_type,
         'voucher_type'        => $request->voucher_type,
         'voucher_quantity'    => $request->voucher_quantity,
         'voucher_min_trans'   => $request->voucher_min_trans,
         'voucher_used'        => 0,
         'voucher_created'     => date("Y-m-d H:i:s"),
         'voucher_expired'     => $request->voucher_expired,
         'voucher_status'      => 0,
      ]);

      return response()->json([
         'status'  => 200,
         'message' => 'Data created successfully',
         'data'    => $voucher
      ], Response::HTTP_OK);
   }

   public function show(Voucher $voucher)
   {
      if (!$voucher) {
         return response()->json([
            'status'  => 200,
            'message' => 'Data Not Found',
            'data'    => null
         ], Response::HTTP_OK);
      } else {
         return response()->json([
            'status'  => 200,
            'message' => 'Data Found',
            'data'    => $voucher
         ], Response::HTTP_OK);
      }
   }

   public static function get_by_code(Request $request)
   {
      $now = date("Y-m-d H:i:s");
      $voucher = Voucher::where('voucher_code', $request->voucher_code)
         ->where('voucher_min_trans', '<=', $request->topup_val)
         ->where('voucher_expired', '>', $now)
         ->where('voucher_quantity', '>', 0)
         ->whereRaw('voucher_quantity > voucher_used')
         ->where('voucher_status', 1)
         ->get(["voucher_code", "voucher_type", "voucher_amount", "voucher_amount_type", "voucher_type"])->first();
      if (!$voucher) {
         return response()->json([
            'status'  => 200,
            'message' => 'Code voucher tidak valid atau tidak memenuhi minimal transaksi. Silahkan melanjutkan pembayaran tanpa potongan',
            'data'    => null
         ], Response::HTTP_OK);
      } else {
         return response()->json([
            'status'  => 200,
            'message' => 'Data Found',
            'data'    => $voucher,
         ], Response::HTTP_OK);
      }
   }

   public static function validate_voucher($request, $data)
   {
      $requests = [
         'voucher_name'        => 'required|string',
         'voucher_code'        => 'required|string',
         'voucher_desc'        => 'required|string',
         'voucher_amount'      => 'required|numeric',
         'voucher_amount_type' => 'required',
         'voucher_type'        => 'required',
         'voucher_quantity'    => 'required|numeric',
         'voucher_min_trans'   => 'required|numeric',
         'voucher_expired'     => 'required|string',
      ];
      $rules = [
         'voucher_name.required'        => 'Voucher name is Required',
         'voucher_name.string'          => 'Voucher name should be string input',
         'voucher_code.required'        => 'Voucher code is Required',
         'voucher_code.string'          => 'Voucher code should be string input',
         'voucher_desc.required'        => 'Voucher description is Required',
         'voucher_desc.string'          => 'Voucher description should be string input',
         'voucher_amount.required'      => 'Voucher amount is Required',
         'voucher_amount.numeric'       => 'Voucher amount should be integer input',
         'voucher_amount_type.required' => 'Voucher amount type is Required',
         'voucher_type.required'        => 'Voucher type is Required',
         'voucher_quantity.required'    => 'Voucher quantity is Required',
         'voucher_quantity.numeric'     => 'Voucher quantity should be integer input',
         'voucher_min_trans.required'   => 'Minimum transaction is Required',
         'voucher_min_trans.numeric'    => 'Minimum transaction should be integer input',
         'voucher_expired.required'     => 'Voucher expired date is Required',
         'voucher_expired.string'       => 'Voucher expired date should be string input',
      ];
      if ($request->voucher_amount_type == "percent") {
         $requests["voucher_amount"] = "required|numeric|max:100";
         $rules["voucher_amount.max"] = "If amount type is percent, than amount max shouldn't be above 100";
      }

      return Validator::make($data, $requests, $rules);
   }

   public function update(Request $request, Voucher $voucher)
   {
      //Validate data
      $data = $request->only("voucher_name", "voucher_code", "voucher_desc", "voucher_amount", "voucher_amount_type", "voucher_type", "voucher_quantity", "voucher_min_trans", "voucher_expired");

      $validator = self::validate_voucher($request, $data);

      //Send failed response if request is not valid
      if ($validator->fails()) {
         return response()->json(['error' => $validator->messages()], 400);
      }

      //Request is valid, create new Trivia
      $voucher->update([
         'voucher_name'        => $request->voucher_name,
         'voucher_code'        => $request->voucher_code,
         'voucher_description' => $request->voucher_desc,
         'voucher_amount'      => $request->voucher_amount,
         'voucher_amount_type' => $request->voucher_amount_type,
         'voucher_type'        => $request->voucher_type,
         'voucher_quantity'    => $request->voucher_quantity,
         'voucher_min_trans'   => $request->voucher_min_trans,
         'voucher_expired'     => $request->voucher_expired,
      ]);

      return response()->json([
         'status'  => 200,
         'message' => 'Data updated successfully',
         'data'    => $voucher
      ], Response::HTTP_OK);
   }

   public function activate(Voucher $voucher)
   {
      //inactive
      $voucher->update([
         'voucher_status'    => 1
      ]);

      //respon success
      return response()->json([
         'status'  => 200,
         'message' => 'Voucher Activated'
      ], Response::HTTP_OK);
   }

   public function inactive(Voucher $voucher)
   {
      //inactive
      $voucher->update([
         'voucher_status'    => 0
      ]);

      //respon success
      return response()->json([
         'status'  => 200,
         'message' => 'Voucher Inactive'
      ], Response::HTTP_OK);
   }

   public function destroy(Voucher $voucher)
   {
      $voucher->delete();
      return response()->json([
         'status'  => 200,
         'message' => 'Data deleted successfully'
      ], Response::HTTP_OK);
   }
}
