<?php

namespace App\Http\Controllers\api;

use App\Models\Survey;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ServicesController;
use App\Models\Audience;
use Symfony\Component\HttpFoundation\Response;

class SurveyApiController extends Controller
{
   protected $voucher;

   public function __construct()
   {
      $this->voucher = JWTAuth::parseToken()->authenticate();
   }

   public function index(Request $request)
   {
      $query = Voucher::select("*");

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
      // $survey_id = 12345;
      $data = $request->all();

      $rules = [
         "survey_title"      => "required|string",
         "survey_desc"       => "required|string",
         "total_audience"    => "required|numeric",
         "survey_start_date" => "required",
         "survey_end_date"   => "required",
      ];

      $validated_data = Validator::make($data, $rules, ServicesController::costomMessageValidation());

      //Send failed response if request is not valid
      if ($validated_data->fails()) {
         return response()->json(['error' => $validated_data->messages()], 200);
      }

      $survey = Survey::create([
         "survey_title"      => $request->survey_title,
         "survey_desc"       => $request->survey_desc,
         "total_audience"    => $request->total_audience,
         "survey_start_date" => $request->survey_start_date,
         "survey_end_date"   => $request->survey_end_date,
         "created_by"        => Auth::id(),
         "updated_by"        => Auth::id()
      ]);

      $survey_id = $survey->survey_id;

      $list_audience = $data["list_audience"];
      foreach ($list_audience as $list) {
         $audience = [
            "survey_id"     => $survey_id,
            "type_audience" => $list,
            "created_dt"    => date("Y-m-d H:i:s"),
            "created_by"    => Auth::id(),
            "updated_dt"    => date("Y-m-d H:i:s"),
            "updated_by"    => Auth::id(),
         ];
         Audience::create($audience);
      }

      return response()->json([
         'status'    => 200,
         'message'   => "Success create survey, redirecting to kuesioner",
         'data'      => $data,
         'survey_id' => $survey_id
      ], Response::HTTP_OK);
   }

   public function show(Voucher $voucher)
   {
      //
   }

   public function update(Request $request, Voucher $voucher)
   {
      //
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
