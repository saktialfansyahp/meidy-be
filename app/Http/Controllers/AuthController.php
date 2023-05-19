<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Return an error response if the validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create a new user record
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Generate a JWT token for the user
        $token = JWTAuth::fromUser($user);
        $data = $user;
        // Return a success response with the JWT token
        return response()->json([
            'data' => $data,
            'token' => $token,
        ], 201);
    }
    public function login(){
        $credentials = request(['email', 'password']);
        $token = auth()->attempt($credentials);
        if(!$token){
            return response()->json(['error'=>'Invalid Email or Password'], 401);
        }
        $data = auth()->user();
        $token = JWTAuth::attempt($credentials, ['expires_in' => 3600]);

        return response()->json([
            'data' => $data,
            'access_token' => $token,
        ]);
    }
    public function logout(){
        auth()->logout();

        return response()->json([
            'message' => 'Successfully logged out'
        ], 200);
    }
}
