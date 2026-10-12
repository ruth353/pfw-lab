<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/mahasiswa/detail', [MahasiswaController::class, 'detail']);
Route::get('/mahasiswa/profile', [MahasiswaController::class, 'profile']);

Route::get('/home', [HomeController::class, 'index']);

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('question', [QuestionController::class, 'index'])
		->name('question.index');

Route::get('/dashboard', [DashboardController::class, 'index'])
		->name('dashboard.index');

Route::resource('pelanggan', PelangganController::class);