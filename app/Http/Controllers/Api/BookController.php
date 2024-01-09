<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        if ($books->count() > 0) {
            return response()->json([
                'status' => 200,
                'message' => 'Success',
                'data' => $books
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Books not found!'
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
    public function store(StoreBookRequest $request)
    {
        $book = Book::create([
            'id_buku' => $request->id_buku,
            'judul_buku' => $request->judul_buku,
            'kategori' => $request->kategori,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit
        ]);
        if ($book) {
            return response()->json([
                'status' => 200,
                'message' => 'Book created succesfuly.',
                'data' => $book
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
        $book = Book::find($id);
        if ($book) {
            return response()->json([
                'status' => 200,
                'message' => 'Success',
                'data' => $book
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such book found!'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        if ($book) {
            return response()->json([
                'status' => 200,
                'message' => 'Success',
                'data' => $book
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such book found!'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBookRequest $request, string $id)
    {
        $book = Book::find($request->id);

        if ($book) {
            $book->update([
                'id_buku' => $request->id_buku,
                'judul_buku' => $request->judul_buku,
                'kategori' => $request->kategori,
                'pengarang' => $request->pengarang,
                'penerbit' => $request->penerbit
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Book updated succsessfuly.'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such book found!'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);

        if ($book) {
            $book->delete();
            return response()->json([
                'status' => 200,
                'message' => 'book deleted succsessfully.'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such book found!'
            ], 404);
        }
    }
}
