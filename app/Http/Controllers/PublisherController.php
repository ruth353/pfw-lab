<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PublisherController extends Controller
{
    /**
     * Display a listing of publishers using Eloquent.
     */
    public function index()
    {
        $publishers = Publisher::withCount('books')->paginate(10);
        return view('guest.publishers.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new publisher.
     */
    public function create()
    {
        return view('guest.publishers.create');
    }

    /**
     * Store a newly created publisher using Eloquent.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        Publisher::create($validated);

        return redirect()->route('guest.publishers.index')
            ->with('success', 'Publisher berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified publisher.
     */
    public function edit(Publisher $publisher)
    {
        return view('guest.publishers.edit', compact('publisher'));
    }

    /**
     * Update the specified publisher using Eloquent.
     */
    public function update(Request $request, Publisher $publisher)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        $publisher->update($validated);

        return redirect()->route('guest.publishers.index')
            ->with('success', 'Publisher berhasil diupdate!');
    }

    /**
     * Remove the specified publisher using Eloquent.
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        return redirect()->route('guest.publishers.index')
            ->with('success', 'Publisher berhasil dihapus!');
    }
}
