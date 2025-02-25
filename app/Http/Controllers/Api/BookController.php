<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    // Menampilkan semua data buku
    public function index()
    {
        try {
            $books = Book::all();
            return response()->json([
                "code"    => 200,
                "data"    => $books,
                "success" => true,
                "message" => "Berhasil mengambil seluruh data buku!"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "code"    => 500,
                "data"    => null,
                "success" => false,
                "message" => "Terjadi kesalahan saat mengambil data buku: " . $e->getMessage()
            ], 500);
        }
    }

    // Menambahkan buku baru ke database
    public function store(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                "title"       => "required|string|min:3|max:255",
                "description" => "required|string",
                "author"      => "required|string|max:255"
            ], [
                "title.required"       => "Judul tidak boleh kosong!",
                "title.string"         => "Judul harus berupa string!",
                "title.min"            => "Judul minimal 3 karakter!",
                "title.max"            => "Judul maksimal 255 karakter!",
                "description.required" => "Deskripsi tidak boleh kosong!",
                "description.string"   => "Deskripsi harus berupa string!",
                "author.required"      => "Penulis tidak boleh kosong!",
                "author.string"        => "Penulis harus berupa string!",
                "author.max"           => "Penulis maksimal 255 karakter!"
            ]);

            $book = Book::create([
                "title"       => $request->title,
                "description" => $request->description,
                "author"      => $request->author,
            ]);

            return response()->json([
                "code"    => 201,
                "data"    => $book,
                "success" => true,
                "message" => "Berhasil menambahkan buku!"
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                "code"    => 500,
                "data"    => null,
                "success" => false,
                "message" => "Terjadi kesalahan saat menambahkan buku: " . $e->getMessage()
            ], 500);
        }
    }

    // Menampilkan data buku berdasarkan ID
    public function show($id)
    {
        try {
            $book = Book::find($id);
            if (!$book) {
                return response()->json([
                    "code"    => 404,
                    "data"    => null,
                    "success" => false,
                    "message" => "Buku tidak ditemukan!"
                ], 404);
            }
            return response()->json([
                "code"    => 200,
                "data"    => $book,
                "success" => true,
                "message" => "Berhasil mengambil data buku!"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "code"    => 500,
                "data"    => null,
                "success" => false,
                "message" => "Terjadi kesalahan saat mengambil data buku: " . $e->getMessage()
            ], 500);
        }
    }

    // Memperbarui data buku berdasarkan ID
    public function update(Request $request, $id)
    {
        try {
            $book = Book::find($id);
            if (!$book) {
                return response()->json([
                    "code"    => 404,
                    "data"    => null,
                    "success" => false,
                    "message" => "Buku tidak ditemukan!"
                ], 404);
            }

            $request->validate([
                "title"       => "required|string|min:3|max:255",
                "description" => "required|string",
                "author"      => "required|string|max:255"
            ], [
                "title.required"       => "Judul tidak boleh kosong!",
                "title.string"         => "Judul harus berupa string!",
                "title.min"            => "Judul minimal 3 karakter!",
                "title.max"            => "Judul maksimal 255 karakter!",
                "description.required" => "Deskripsi tidak boleh kosong!",
                "description.string"   => "Deskripsi harus berupa string!",
                "author.required"      => "Penulis tidak boleh kosong!",
                "author.string"        => "Penulis harus berupa string!",
                "author.max"           => "Penulis maksimal 255 karakter!"
            ]);

            $book->update([
                "title"       => $request->title,
                "description" => $request->description,
                "author"      => $request->author
            ]);

            return response()->json([
                "code"    => 200,
                "data"    => $book,
                "success" => true,
                "message" => "Berhasil memperbarui data buku!"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "code"    => 500,
                "data"    => null,
                "success" => false,
                "message" => "Terjadi kesalahan saat memperbarui buku: " . $e->getMessage()
            ], 500);
        }
    }

    // Menghapus data buku berdasarkan ID
    public function destroy($id)
    {
        try {
            $book = Book::find($id);
            if (!$book) {
                return response()->json([
                    "code"    => 404,
                    "data"    => null,
                    "success" => false,
                    "message" => "Buku tidak ditemukan!"
                ], 404);
            }
            $book->delete();
            return response()->json([
                "code"    => 200,
                "data"    => null,
                "success" => true,
                "message" => "Berhasil menghapus buku!"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "code"    => 500,
                "data"    => null,
                "success" => false,
                "message" => "Terjadi kesalahan saat menghapus buku: " . $e->getMessage()
            ], 500);
        }
    }
}
