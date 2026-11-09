<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard.index');
});

Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');
Route::redirect('/admin/dashboard', '/dashboard');
Route::redirect('/admin/pelanggan', '/pelanggan');

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
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
});

// Guest CRUD for categories (Eloquent) and products (Query Builder)
Route::prefix('guest')->name('guest.')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});
