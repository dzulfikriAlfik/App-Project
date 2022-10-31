<?php

namespace App\Http\Controllers\api;

use App\Models\Choice;
use App\Models\Survey;
use App\Models\Voucher;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ServicesController;
use Symfony\Component\HttpFoundation\Response;

class KuesionerApiController extends Controller
{
   protected $voucher;

   public function __construct()
   {
      $this->voucher = JWTAuth::parseToken()->authenticate();
   }

   public function index(Request $request)
   {
      //
   }

   public function create(Request $request)
   {
      //
   }

   public function store(Request $request)
   {
      $datas = $request->all();

      if (count($datas) == 0 || !$datas) {
         return response()->json(['error' => 'Data tidak boleh kosong'], 401);
      } else {
         // $questions = [];
         $total_point = 0;
         foreach ($datas as $data) {
            $rules = [
               "survey_id"     => "required",
               "question"      => "required",
               "is_required"   => "required",
               "question_type" => "required",
               "created_by"    => "required",
               "updated_by"    => "required",
            ];
            $data['question_point'] = 100;
            $data['created_by']     = Auth::id();
            $data['updated_by']     = Auth::id();
            $validated_data   = Validator::make($data, $rules, ServicesController::costomMessageValidation());

            # Send failed response if request is not valid
            if ($validated_data->fails()) {
               return response()->json(['error' => $validated_data->messages()], 401);
            }

            $question_data = [
               "survey_id"      => $data["survey_id"],
               "question"       => $data["question"],
               "question_type"  => $data["question_type"],
               "question_point" => $data['question_point'],
               "is_required"    => $data["is_required"],
               "created_by"     => $data['created_by'],
               "updated_by"     => $data['updated_by'],
            ];

            $total_point = ($total_point + $data['question_point']);

            // insert ke table question
            $question = Question::create($question_data);

            // $choices_data = [];
            if ($data['choice'] != null) {
               # generate question_id
               $question_id = $question->question_id;
               # jika type pilihan single/multi option
               foreach ($data['choice'] as $choice) {
                  $choices = [
                     "question_id" => $question_id,
                     "choice"      => $choice,
                     "created_by"  => Auth::id(),
                     "updated_by"  => Auth::id(),
                  ];
                  # insert ke table choice
                  $choices = Choice::create($choices);
                  // array_push($choices_data, $choices);
               }
            } else {
               $choices = null;
               // array_push($choices_data, $choices);
            }
            // $question['choice'] = $choices_data;
            // array_push($questions, $question);
         }

         $survey_id = $datas[1]['survey_id'];
         $survey = Survey::all()->where('survey_id', $survey_id)->first();
         $survey->update([
            'total_budget' => ($total_point * $survey->total_audience)
         ]);

         return response()->json([
            'status'  => 200,
            'message' => "Success Create Kuestioner Data",
            'data'    => $datas,
         ], Response::HTTP_OK);
      }
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
