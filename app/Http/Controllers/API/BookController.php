<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\BookRequest;
use App\Models\Book;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt_auth')->except('');
    }

    public function index()
    {
        try {
            $book = Book::all();
            return response()->json([
                'meta' => [
                    'status' => true,
                    'messages' => 'Berhasil Menampilkan Data Buku',
                    'data' => $book
                ]
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'messages' => $e->getMessage()
            ], 500);
        }
    }
    public function show($id)
    {
        try {
            $book = Book::find($id);
            return response()->json([
                'meta' => [
                    'status' => true,
                    'messages' => 'Berhasil Menambahkan Buku',
                    'data' => $book
                ]
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'messages' => $e->getMessage()
            ], 500);
        }
    }
    public function store(BookRequest $request)
    {
        try {
            $book = new Book();
            $book->name = $request->name;
            $book->author = $request->author;
            $book->save();
            return response()->json([
                'meta' => [
                    'status' => true,
                    'messages' => 'Berhasil Menambahkan Buku',
                    'data' => $book
                ]
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'messages' => $e->getMessage()
            ], 500);
        }
    }
    public function update(BookRequest $request, $id)
    {
        try {
            $book = Book::find($id);
            $book->name = $request->name;
            $book->author = $request->author;
            $book->update();
            return response()->json([
                'meta' => [
                    'status' => true,
                    'messages' => 'Berhasil Update Buku',
                    'data' => $book
                ]
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'messages' => $e->getMessage()
            ], 500);
        }
    }
}
