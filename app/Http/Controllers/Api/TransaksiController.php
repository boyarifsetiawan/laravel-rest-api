<?php

namespace App\Http\Controllers\Api;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransaksiRequest;
use App\Models\Anggota;
use App\Models\Book;


class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::with('book', 'anggota')->get();
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
        $books = Book::all();
        $anggotas = Anggota::all();
        if ($books->count() > 0 && $anggotas->count() > 0) {
            return response()->json([
                'status' => 200,
                'message' => 'Success',
                'books' => $books,
                'anggotas' => $anggotas
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Books or Anggota not found!'
            ], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaksiRequest $request)
    {
        $transaksi = Transaksi::create([
            'id_transaksi' => $request->id_transaksi,
            'anggota_id' => $request->anggota_id,
            'buku_id' => $request->buku_id,
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
                'anggota_id' => $request->anggota_id,
                'buku_id' => $request->buku_id,
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
