<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;

Route::get('/home', [HomeController::class, 'index']);

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});


Route::get('/mahasiswa', function () {
    return 'Halo Mahasiwa!';
});

Route::get('/mahasiswa/detail', function () {
    return '<h1>Selamat Datang!</h1><h2>Ini halaman Detail Mahasiswa</h2>';
});

Route::get('/mahasiswa/profile', function () {
    return '<h1>Selamat Datang!</h1><h2>Ini halaman Profil Mahasiswa</h2>';
});

Route::get('/nama/{Ruth}', function ($param1) {
    return 'Nama saya: '.$param1;
});

Route::get('/nim/{nim?}', function ($param1 = '2557301113') {
    return 'NIM saya: '.$param1;
});

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\MatakuliahController;

// Route khusus untuk menangani endpoint /matakuliah/show/{kode?}
Route::get('/matakuliah/show/{kode?}', [MatakuliahController::class, 'show']);

// Route resource untuk method standar lainnya (index, create, store, edit, update, destroy)
Route::resource('matakuliah', MatakuliahController::class)->except(['show']);
use App\Http\Controllers\MahasiswaController;

Route::get('/mahasiswa/detail', [MahasiswaController::class, 'detail']);
Route::get('/mahasiswa/profile', [MahasiswaController::class, 'profile']);

Route::get('/home', [HomeController::class, 'index']);

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('question', [QuestionController::class, 'index'])
		->name('question.index');

Route::get('/dashboard', [DashboardController::class, 'index'])
		->name('dashboard.index');