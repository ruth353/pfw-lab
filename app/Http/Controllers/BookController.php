<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of books using Query Builder.
     */
    public function index()
    {
        $books = DB::table('books')
            ->join('publishers', 'books.publisher_id', '=', 'publishers.id')
            ->select('books.*', 'publishers.name as publisher_name')
            ->paginate(10);

        return view('guest.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new book.
     */
    public function create()
    {
        $publishers = DB::table('publishers')->pluck('name', 'id');
        return view('guest.books.create', compact('publishers'));
    }

    /**
     * Store a newly created book using Query Builder.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'publisher_id' => 'required|exists:publishers,id',
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
        ]);

        DB::table('books')->insert([
            'publisher_id' => $validated['publisher_id'],
            'title'        => $validated['title'],
            'description'  => $validated['description'] ?? null,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        return redirect()->route('guest.books.index')
            ->with('success', 'Book berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified book.
     */
    public function edit($id)
    {
        $book = DB::table('books')->where('id', $id)->first();
        $publishers = DB::table('publishers')->pluck('name', 'id');
        return view('guest.books.edit', compact('book', 'publishers'));
    }

    /**
     * Update the specified book using Query Builder.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'publisher_id' => 'required|exists:publishers,id',
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
        ]);

        DB::table('books')->where('id', $id)->update([
            'publisher_id' => $validated['publisher_id'],
            'title'        => $validated['title'],
            'description'  => $validated['description'] ?? null,
            'updated_at'   => now(),
        ]);

        return redirect()->route('guest.books.index')
            ->with('success', 'Book berhasil diupdate!');
    }

    /**
     * Remove the specified book using Query Builder.
     */
    public function destroy($id)
    {
        DB::table('books')->where('id', $id)->delete();

        return redirect()->route('guest.books.index')
            ->with('success', 'Book berhasil dihapus!');
    }
}
