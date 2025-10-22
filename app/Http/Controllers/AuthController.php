<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request){
        // 1. Setup validator
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8'
        ]);

        // 2. Cek validator
        if ($validator->fails()){
            return response() -> json($validator->errors(),422);
        }
        // 3. Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt ($request->password)
        ]);

        // 4. Cek keberhasilan
        if ($user){
            return response()->json([
                'success' => true,
                'message' => 'user created successfully',
                'data' => $user
            ], 201);
        }
        // 5. Cek Gagal
        return response()->json([
            'success' => false,
            'message' => 'User creation faild'
        ], 409); 
    }

    public function login(Request $request){
        // 1. Setup validator
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // 2. Cek validator
        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        // 3. Get kredensial dari request
        $credentials = $request->only('email','password');

        // 4. Cek isFailed
        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password Anda salah!'
            ], 401);
        }
        // 5. Cek isSuccess
        return response()->json([
            'success'=> true,
            'message'=> 'Login Succesfully',
            'user'=>auth()->guard('api')->user(),
            'token'=>$token,
        ],200);
    }
}
