<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Modules\Authuser\Http\Requests\AuthRequest;
use Modules\Authuser\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function register(AuthRequest $request)
    {
        $email = User::where('email', $request->email)->first();
        if ($email) {
            return response()->json([
                'error' => 'already used email'
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token
        ], 201);

    }

    public function login(LoginRequest $request)
    {
     $user = User::where('email',$request->email)->first();

     if (!$user) {
         return response()->json([
             'error'=>'wrong email or password'
         ]);
     }

     if (!Hash::check($request->password, $user->password)) {
         return response()->json([
             'error'=>'wrong password'
         ]);
     }

     $token = $user->createToken('api-token')->plainTextToken;

     return response()->json([
         'token' => $token
     ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message'=>'user has logged out']);
    }
}
