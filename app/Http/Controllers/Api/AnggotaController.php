<?php

namespace App\Http\Controllers\Api;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAnggotaRequest;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggotas = Anggota::all();
        if ($anggotas->count() > 0) {
            return response()->json([
                'status' => 200,
                'message' => 'Success!',
                'data' => $anggotas
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Anggota not found!'
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
    public function store(StoreAnggotaRequest $request)
    {
        $anggota = Anggota::create([
            'id_anggota' => $request->id_anggota,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'status' => $request->status
        ]);
        if ($anggota) {
            return response()->json([
                'status' => 200,
                'message' => 'Anggota created succesfuly.',
                'data' => $anggota
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
        $anggota = Anggota::find($id);
        if ($anggota) {
            return response()->json([
                'status' => 200,
                'message' => 'Success',
                'data' => $anggota
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such anggota found!'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $anggota = Anggota::find($id);
        if ($anggota) {
            return response()->json([
                'status' => 200,
                'message' => 'Success',
                'data' => $anggota
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such anggota found!'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAnggotaRequest $request, string $id)
    {
        $anggota = Anggota::find($request->id);

        if ($anggota) {
            $anggota->update([
                'id_anggota' => $request->id_anggota,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'status' => $request->status
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Anggota updated succsessfuly.'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such anggota found!'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $anggota = Anggota::find($id);

        if ($anggota) {
            $anggota->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Anggota deleted succsessfully.'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such anggota found!'
            ], 404);
        }
    }
}
