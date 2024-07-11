<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    public function register(Request $request) {
        $request->validate([
            'email'     => 'required|string|email|max:255|unique:users',
            'name'      =>  'required|string|max:255',
            'username'  =>  'required|string|max:255|unique:users',
            'password'  =>  'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'email'         => $request->email,
            'name'          =>  $request->name,
            'username'      =>  $request->username,
            'password'      =>  Hash::make($request->password)
        ]);

        return response()->json(['message' => 'Successfully registered an account'], 201);
    }
    
    public function login(Request $request) {
        $request->validate([
            'username'  => 'required|string',
            'password'  => 'required|string',
        ]);

        if(!Auth::attempt($request->only('username', 'password'))) {
            return response()->json(['message', 'Invalid credentials']);
        }

        $user = Auth::user();
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json(['token' => $token], 200);
    }
}
