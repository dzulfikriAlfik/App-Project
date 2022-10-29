<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use App\Models\User;
use App\Models\Statistic;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Auth;

class StatisticApiController extends Controller
{
  public function index(Request $request)
  {
    $data = Statistic::paginate(10);

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

  public function chart(Request $request)
  {
    return response()->json([
      'status'  => 200,
      'message' => 'Data Found',
      'data'    => null
    ], Response::HTTP_OK);

    $days = $request->days;
    if ($days == null) {
      $days = 7;
    }

    $data = Statistic::orderBy("stat_date", "DESC")->paginate($days);

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

  public function store(Request $request)
  {
    //Validate data
    $data = $request->only('stat_date', 'stat_code');
    $validator = Validator::make($request->all(), [
      'stat_date' => 'required|string',
      'stat_code' => 'in:user_growth,msg_growth_twt,msg_growth_app'
    ]);

    //Send failed response if request is not valid
    if ($validator->fails()) {
      return response()->json(['error' => $validator->messages()], 200);
    }

    $sys = Statistic::where('stat_date', '=', $request->stat_date)
      ->where('stat_code', '=', $request->stat_code)
      ->first();

    if ($request->stat_code == "user_growth") {
      $stat_val = User::where("created_dt", "like", $request->stat_date . "%")->count();
    }

    $stat = json_decode("{}");
    if ($sys != null) {
      // exists, update
      $stat = $sys->update([
        'stat_val'      => $stat_val,
        'updated_dt' => date("Y-m-d H:i:s"),
        'updated_by' => Auth::id()
      ]);
    } else {
      // not exists, create
      $stat = Statistic::create([
        'stat_code' => $request->stat_code,
        'stat_val'      => $stat_val,
        'stat_date'      => $request->stat_date,
        'created_by'  => Auth::id(),
        'updated_by'  => Auth::id()
      ]);
    }

    //Dokumen Perda created, return success response
    return response()->json([
      'status' => 200,
      'message' => 'Data created successfully',
      'data' => $stat
    ], Response::HTTP_OK);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\System  $system
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $system = System::find($id);

    if (!$system) {
      return response()->json([
        'status' => 200,
        'message' => 'Data Not Found',
        'data' => null
      ], Response::HTTP_OK);
    } else {
      return response()->json([
        'status' => 200,
        'message' => 'Data Found',
        'data' => $system
      ], Response::HTTP_OK);
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\System  $system
   * @return \Illuminate\Http\Response
   */
  public function edit(System $system)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\System  $system
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, System $system)
  {
    //Validate data
    $data = $request->only('sys_cat', 'sys_sub_cat', 'sys_cd', 'sys_val', 'remark', 'updated_dt', 'updated_by');
    $rules = [
      'sys_val'     => 'required|string',
      'remark'      => 'string',
      'updated_by'  => 'string'
    ];
    if ($request->sys_cat != $system->sys_cat) {
      $rules['sys_cat'] = 'required|string|unique:system,sys_cat';
    }
    if ($request->sys_sub_cat != $system->sys_sub_cat) {
      $rules['sys_sub_cat'] = 'required|string|unique:system,sys_sub_cat';
    }
    if ($request->sys_cd != $system->sys_cd) {
      $rules['sys_cd'] = 'required|string|unique:system,sys_cd';
    }
    $rulesMessage = [
      'sys_cat.required'     => 'Category is Required',
      'sys_cat.unique'       => 'Category Already Taken',
      'sys_cat.string'       => 'Category Must Be String',
      'sys_sub_cat.required' => 'Sub Category is Required',
      'sys_sub_cat.unique'   => 'Sub Category Already Taken',
      'sys_sub_cat.string'   => 'Sub Category Must Be String',
      'sys_cd.required'      => 'Code is Required',
      'sys_cd.unique'        => 'Code Already Taken',
      'sys_cd.string'        => 'Code Must Be String',
      'sys_val.required'     => 'Value is Required',
      'sys_val.string'       => 'Value Must Be String',
      'remark.required'      => 'Remark is Required',
      'remark.string'        => 'Remark Must Be String',
    ];
    $validator = Validator::make(
      $data,
      $rules,
      $rulesMessage
    );

    //Send failed response if request is not valid
    if ($validator->fails()) {
      return response()->json(['error' => $validator->messages()], 200);
    }

    $sys = System::where('sys_cat', '=', $request->sys_cat)
      ->where('sys_sub_cat', '=', $request->sys_sub_cat)
      ->where('sys_cd', '=', $request->sys_cd)
      ->where('sys_val', '=', $request->sys_val)
      ->where('remark', '=', $request->remark)
      ->get();
    $count = count($sys);

    if ($count === 1) {
      $err = array(
        'Error' => 'Category, Sub Category, Code Already Taken'
      );
      return response()->json([
        'message' => $err
      ], Response::HTTP_OK);
    } else if ($count === 0) {

      //Request is valid, create new dokumen
      $system = $system->update([
        'sys_cat' => $request->sys_cat,
        'sys_sub_cat' => $request->sys_sub_cat,
        'sys_cd' => $request->sys_cd,
        'sys_val' => $request->sys_val,
        'remark' => $request->remark,
        'user_id' => Auth::id(),
        'updated_dt' => date("Y-m-d H:i:s"),
        'updated_by' => Auth::id()
      ]);
    }

    //Dokumen updated, return success response
    return response()->json([
      'status' => 200,
      'message' => 'Data updated successfully',
      'data' => $system
    ], Response::HTTP_OK);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\System  $system
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //get all data perda by id
    $system = System::where('sys_id', '=', $id)->get();
    //count data for True or false
    $count = count($system);
    //check for delete
    if ($count === 1) {
      //delete
      $system[0]->delete();
      //response success
      return response()->json([
        'status' => 200,
        'message' => 'Data deleted successfully'
      ], Response::HTTP_OK);
    } else {
      //response id not found
      return response()->json([
        'status' => 200,
        'message' => 'Data deleted successfully'
      ], Response::HTTP_OK);
    }
  }
}
