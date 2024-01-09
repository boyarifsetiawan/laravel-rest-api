<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        if ($users->count() > 0) {
            return response()->json([
                'status' => 200,
                'message' => 'Success',
                'data' => $users
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'users not found!'
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
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
                'message' => 'user created succesfuly.',
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong!'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json([
                'status' => 200,
                'message' => 'Success',
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such user found!'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json([
                'status' => 200,
                'message' => 'Success',
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such user found!'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserRequest $request, string $id)
    {
        $user = User::find($request->id);

        if ($user) {
            $user->update([
                'id_user' => $request->id_user,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'password' => Hash::make($request->password),
                'tipe_user' => $request->tipe_user
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'User updated succsessfuly.'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such user found!'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return response()->json([
                'status' => 200,
                'message' => 'User deleted succsessfully.'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such user found!'
            ], 404);
        }
    }
}
