<?php

namespace App\Http\Controllers\Api;

use App\Models\niit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NiitController extends Controller
{
    public function index (){
        return "Welcome To Niit API";
    }

    public function createNiit (Request $request) {

        $niit = niit::create([
        'firstname' => $request->firstname,
        'lastname'=> $request->lastname,
        'department'=> $request->department,
        'course'=> $request->course,
        'phone'=> $request->phone,
        ]);
    
        if ($niit) {
            return response()->json([
            'status' => 201,
            'message' => 'Niit created successfully'
            ], 201);
        }else {
            return response()->json([
            'status' => 500,
            'message' => 'Something went wrong!'
            ], 500);
        }


        //     $validator = Validator::make($request->all(), [
        //     'firstname' => 'required|string|Max:191',
        //     'lastname' => 'required|string|Max:191',
        //     'department' => 'required|string|Max:191',
        //     'course' => 'required|string|Max:191',
        //     'phone' => 'required|string|Max:191'


        // ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //     'status' => 422,
        //     'errors'=> $validator->messages()
        // ], 422);
        // }else {

        //     $niit = niit::create([
        //     'firstname' => $request->firstname,
        // 'lastname'=> $request->lastname,
        // 'department'=> $request->department,
        //  'course'=> $request->course,
        //  'phone'=> $request->phone,
        //     ]);

        //      if ($niit) {
        //      return response()->json([
        //     'status' => 201,
        //     'message'=> 'User created successfully'
        // ], 201);
        // }else {
        //      return response()->json([
        //     'status' => 500,
        //     'message'=> 'Something went wrong!'
        // ], 500);
        // }
        // }



    }
}


