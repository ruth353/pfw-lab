<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    try {
        $filterableColumns = ['gender'];
        $searchableColumns = ['first_name', 'last_name', 'email'];

        $data['dataPelanggan'] = Pelanggan::filter($request, $filterableColumns)
            ->search($request, $searchableColumns)
            ->paginate(10)
            ->withQueryString();
    } catch (\Throwable $e) {
        $data['dataPelanggan'] = [];
        session()->flash('db_error', 'Koneksi ke database gagal');
    }

    return view('admin.pelanggan.index', $data);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'birthday' => 'nullable|date',
            'gender' => 'nullable|in:Male,Female,Other',
            'email' => 'required|email|unique:pelanggan,email',
            'phone' => 'nullable|string|max:20',
        ]);

        try {
            Pelanggan::create($request->only([
                'first_name',
                'last_name',
                'birthday',
                'gender',
                'email',
                'phone',
            ]));

            return redirect()->route('pelanggan.index')->with('success', 'Penambahan Data Berhasil!');
        } catch (\Throwable $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->edit($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $data['dataPelanggan'] = Pelanggan::findOrFail($id);
            return view('admin.pelanggan.edit', $data);
        } catch (\Throwable $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan atau database belum aktif.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);

            $request->validate([
                'first_name' => 'required|string|max:100',
                'last_name' => 'required|string|max:100',
                'birthday' => 'nullable|date',
                'gender' => 'nullable|in:Male,Female,Other',
                'email' => 'required|email|unique:pelanggan,email,' . $id . ',pelanggan_id',
                'phone' => 'nullable|string|max:20',
            ]);

            $pelanggan->first_name = $request->first_name;
            $pelanggan->last_name = $request->last_name;
            $pelanggan->birthday = $request->birthday;
            $pelanggan->gender = $request->gender;
            $pelanggan->email = $request->email;
            $pelanggan->phone = $request->phone;

            $pelanggan->save();

            return redirect()->route('pelanggan.index')->with('success', 'Perubahan Data Berhasil!');
        } catch (\Throwable $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal mengubah data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            $pelanggan->delete();

            return redirect()->route('pelanggan.index')->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
