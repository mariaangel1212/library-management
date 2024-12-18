<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Books;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Tampilkan semua buku
    public function index()
    {
        $books = Books::all();
        return view('books.index', compact('books'));
    }

    // Tampilkan form untuk menambahkan buku
    public function create()
    {
        return view('books.create');
    }

    // Simpan data buku ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required'
        ]);

        Books::create($request->all());
        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    // Tampilkan form edit buku
    public function edit(Books $book)
    {
        return view('books.edit', compact('book'));
    }

    // Update data buku
    public function update(Request $request, Books $book)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
        ]);

        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    // Hapus data buku
    public function destroy(Books $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
