<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function detail()
    {
        return view('detail-mahasiswa');
    }

    public function profile()
    {
        return view('profile-mahasiswa');
    }
}