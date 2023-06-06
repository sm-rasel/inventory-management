<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate(
            [
                'name'=>'required|string',
                'email'=>'required|string|email|unique:users',
                'password'=>'required|min:8'
            ],
            [

            ]
        );
        $data = User::createUser($request);
        $token = $data->createToken('authToken')->plainTextToken;

        return response([
            'access_token'  => $token,
            'token_type'    => 'Bearer',
            'data'          => $data
        ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response([
                'success' => false,
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('authToken')->plainTextToken;

        return response([
            'success' => true,
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
