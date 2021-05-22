<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'nama_lengkap' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'nopol' => 'required|string',
            'jenis_kendaraan' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::create([
            'nama_lengkap' => $fields['nama_lengkap'],
            'email' => $fields['email'],
            'nopol' => $fields['nopol'],
            'jenis_kendaraan' => $fields['jenis_kendaraan'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
			'message'=>'Register Succesfully',
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();
        
        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'invalid password'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
			'message'=>'Login Succesfully',
            'user' => $user,
            'token' => $token
			
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out succesfully'
        ];
    }
}
