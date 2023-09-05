<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{    
    public function AllUser() {
        $user = User::all();
        if ($user->count() > 0) {
             return response()->json([
            'status' => 200,
            'user'=> $user
        ], 200);
        }else {
             return response()->json([
            'status' => 404,
            'message'=> 'User not found'
        ], 404);
        }
       
    }

    public function createUser(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|Max:191',
            'email' => 'required|email|Max:191',
            'password' => 'required|string|Max:191'
        ]);

        if ($validator->fails()) {
            return response()->json([
            'status' => 422,
            'errors'=> $validator->messages()
        ], 422);
        }else {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);

             if ($user) {
             return response()->json([
            'status' => 201,
            'message'=> 'User created successfully'
        ], 201);
        }else {
             return response()->json([
            'status' => 500,
            'message'=> 'Something went wrong!'
        ], 500);
        }
        }
    }
     
    public function singleUser($id) {
        $user = User::find($id);
        if ($user) {
              return response()->json([
            'status' => 200,
            'user'=> $user
        ], 200);
        }else {
            return response()->json([
            'status' => 404,
            'message'=> 'User not found!'
        ], 404);
        }
    }


}
