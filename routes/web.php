<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('dashboard.index');
});

Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');
Route::redirect('/admin/dashboard', '/dashboard');
Route::redirect('/admin/pelanggan', '/pelanggan');
Route::redirect('/admin/users', '/users');

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
Route::resource('users', UserController::class);
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
});

// Guest CRUD for categories (Eloquent), products (Query Builder), publishers (Eloquent), and books (Query Builder)
Route::prefix('guest')->name('guest.')->group(function () {
    Route::get('/', function () {
        $publishers = \App\Models\Publisher::withCount('books')->get();
        $books = \Illuminate\Support\Facades\DB::table('books')
            ->join('publishers', 'books.publisher_id', '=', 'publishers.id')
            ->select('books.*', 'publishers.name as publisher_name')
            ->get();
        return view('guest.home', compact('publishers', 'books'));
    })->name('home');
    Route::resource('publishers', PublisherController::class);
    Route::resource('books', BookController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});


// ROUTE LOGIN
Route::get('/login', [AuthController::class, 'index'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

// ROUTE LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('auth.logout');

