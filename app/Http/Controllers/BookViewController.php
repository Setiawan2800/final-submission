<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookViewController extends Controller
{
    // Tampilkan daftar buku
    public function index()
    {
        $books = Book::paginate(100);
        return view('books.index', compact('books'));
    }

    // Tampilkan form untuk menambahkan buku baru
    public function create()
    {
        return view('books.create');
    }

    // Simpan buku baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|min:3|max:255',
            'description' => 'required|string',
            'author'      => 'required|string|max:255',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    // Tampilkan detail buku
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    // Tampilkan form untuk mengedit buku
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    // Perbarui data buku
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'       => 'required|string|min:3|max:255',
            'description' => 'required|string',
            'author'      => 'required|string|max:255',
        ]);

        $book = Book::findOrFail($id);
        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui!');
    }

    // Hapus buku
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
}
