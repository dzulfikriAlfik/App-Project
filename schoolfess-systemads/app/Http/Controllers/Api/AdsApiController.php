<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use Auth;
use File;
use App\Models\Ads;

class AdsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 
    }

    public function get(Request $request)
    {
        $query = Ads::select(
            'ads.ads_id',
            'ads.ads_title',
            'ads.ads_status',
            'ads.ads_placement',
            'ads.ads_image',
            'ads.created_dt',
            'ads.created_by',
        );
        // by status
        if ($request->ads_title != "") {
            $query = $query->where('ads_title', $request->ads_title);
        }
        // by role
        if ($request->ads_placement != "") {
            $query = $query->where('ads_placement', $request->ads_placement);
        }

        // by username
        if ($request->created_dt) {
            $query = $query->where('created_dt', 'LIKE', "%" . $request->created_dt . "%");
        }
        // by name
        if ($request->created_by) {
            $query = $query->where('created_by', 'LIKE', "%" . $request->created_by . "%");
        }

        $data = $query->orderBy("created_dt", "DESC")->paginate(10);
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

    public function approve(Request $request, Ads $ads)
    {
        //delete if not active user
        $ads->update([
            'ads_status' => 1
        ]);

        //respon success
        return response()->json([
            'status' => 200,
            'message' => 'Ads have been successfully approved'
        ], Response::HTTP_OK);
    }

    public function reject(Request $request, Ads $ads)
    {
        //delete if not active user
        $ads->update([
            'ads_status' => 2
        ]);

        //respon success
        return response()->json([
            'status' => 200,
            'message' => 'Ads have been successfully rejected'
        ], Response::HTTP_OK);
    }

    public function suspend(Request $request, Ads $ads)
    {
        //delete if not active user
        $ads->update([
            'ads_status' => 3
        ]);

        //respon success
        return response()->json([
            'status' => 200,
            'message' => 'Ads have been successfully suspended'
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function show(Ads $ads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ads $ads)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ads $ads)
    {
        //
    }
}
