<?php

namespace App\Http\Controllers\Api;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransaksiRequest;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        if ($transaksi->count() > 0) {
            return response()->json([
                'status' => 200,
                'message' => 'Success',
                'data' => $transaksi
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Transaksi not found!'
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
    public function store(StoreTransaksiRequest $request)
    {
        $transaksi = Transaksi::create([
            'id_transaksi' => $request->id_transaksi,
            'id_anggota' => $request->id_anggota,
            'id_buku' => $request->id_buku,
            'tgl_peminjaman' => $request->tgl_peminjaman,
            'tgl_pengembalian' => $request->tgl_pengembalian
        ]);
        if ($transaksi) {
            return response()->json([
                'status' => 200,
                'message' => 'Transaksi created succesfuly.',
                'data' => $transaksi
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
        $transaksi = Transaksi::find($id);
        if ($transaksi) {
            return response()->json([
                'status' => 200,
                'message' => 'Success',
                'data' => $transaksi
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such transaksi found!'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaksi = Transaksi::find($id);
        if ($transaksi) {
            return response()->json([
                'status' => 200,
                'message' => 'Success',
                'data' => $transaksi
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such transaksi found!'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTransaksiRequest $request, string $id)
    {
        $transaksi = Transaksi::find($request->id);

        if ($transaksi) {
            $transaksi->update([
                'id_transaksi' => $request->id_transaksi,
                'id_anggota' => $request->id_anggota,
                'id_buku' => $request->id_buku,
                'tgl_peminjaman' => $request->tgl_peminjaman,
                'tgl_pengembalian' => $request->tgl_pengembalian
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Transaksi updated succsessfuly.'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such transaksi found!'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::find($id);

        if ($transaksi) {
            $transaksi->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Transaksi deleted succsessfully.'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such transaksi found!'
            ], 404);
        }
    }
}
