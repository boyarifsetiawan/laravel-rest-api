<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginAuthRequest;
use App\Http\Requests\StoreUserRequest;

class AuthController extends Controller
{
    public function register(StoreUserRequest $request)
    {
        $user = User::create([
            'id_user' => $request->id_user,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'tipe_user' => $request->tipe_user
        ]);
        if ($user) {
            return response()->json([
                'status' => 200,
                'message' => 'Register succesfuly.',
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong!'
            ], 500);
        }
    }

    public function login(LoginAuthRequest $request)
    {
        if (Auth::attempt(['id_user' => $request->id_user, 'password' => $request->password])) {
            $user = $request->user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['nama'] = $user->nama;
            return response()->json([
                'status' => 200,
                'message' => 'Login succesfuly.',
                'data' => $success
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong!'
            ], 500);
        };
    }
}
