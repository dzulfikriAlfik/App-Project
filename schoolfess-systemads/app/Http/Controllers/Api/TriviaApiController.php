<?php

namespace App\Http\Controllers\Api;

use App\Models\Trivia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Auth;

class TriviaApiController extends Controller
{

    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function get(Request $request)
    {
        $query = Trivia::select("*");

        // by content
        if ($request->trivia_text) {
            $query = $query->where('trivia_text', 'LIKE', "%" . $request->trivia_text . "%");
        }

        $data = $query->orderBy("trivia_id", "DESC")->paginate(10);
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
        $data = $request->only('trivia_text');
        $validator = Validator::make($data, [
            'trivia_text' => 'required|string'
        ], [
            'trivia.required' => 'Trivia is Required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new Trivia
        $trivia = Trivia::create([
            'trivia_text' => $request->trivia_text,
            'created_by'  => Auth::id(),
            'updated_by'  => Auth::id()
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Data created successfully',
            'data' => $trivia
        ], Response::HTTP_OK);
    }

    public function show($id)
    {
        $trivia = Trivia::select('*')->find($id);

        if (!$trivia) {
            return response()->json([
                'status' => 200,
                'message' => 'Data Not Found',
                'data' => null
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'status' => 200,
                'message' => 'Data Found',
                'data' => $trivia
            ], Response::HTTP_OK);
        }
    }

    public function update(Request $request, $trivia_id)
    {
        //Validate data
        $trivia = Trivia::find($trivia_id);

        $data = $request->only('trivia_text');
        $validator = Validator::make($data, [
            'trivia_text' => 'required|string'
        ], [
            'trivia.required' => 'Trivia is Required'
        ]);

        //Request is valid, update trivia
        $trivia = $trivia->update([
            'trivia_text' => $request->trivia_text,
            'updated_by'  => Auth::id()
        ]);

        //User updated, return success response
        return response()->json([
            'status' => 200,
            'message' => 'Data updated successfully',
            'data' => $trivia
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $trivia = Trivia::where('trivia_id', '=', $id)->first();
        //delete
        $trivia->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Data deleted successfully'
        ], Response::HTTP_OK);
    }
}
