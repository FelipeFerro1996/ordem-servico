<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    // public function login_token(Request $request)
    // {
    //     $credentials = $request->only(['email', 'password']);

    //     if(Auth::attempt($credentials) === false){
    //         return response()->json('Unauthorized', 401);
    //     }

    //     $user = Auth::user();
    //     $token = $user->createToken('token');
        
    //     return response()->json($token->plainTextToken);
    // } 

    public function login_token(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Credenciais inválidas'], 401);
        }

        return response()->json([
            'token' => $token,
            'user' => auth()->user()
        ]);
    }

}
