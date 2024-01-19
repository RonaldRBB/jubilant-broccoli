<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response([
                'message' => 'Not Authorized'
            ], 401);
        }
        $user = Auth::user();
        $token =Auth::user()->createToken('auth_token')->plainTextToken;
        return response([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
