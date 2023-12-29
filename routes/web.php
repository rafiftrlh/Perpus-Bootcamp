<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\TransaksisController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('/login');
});

Route::get('/register', function () {
    return view('/register');
});

// gatau gadipake
Route::get('/login', [LibraryController::class, 'login'])->name('login');
Route::post('/register', [LibraryController::class, 'register'])->name('register');


// Admin
Route::prefix('admin')->middleware('auth')->group(function () {
    // view
    Route::get('/dashboard', [LibraryController::class, 'index_admin'])->name('dashboard_admin');
    Route::get('/data_siswa', [LibraryController::class, 'data_siswa'])->name('data_siswa');
    Route::get('/data_pinjam', [TransaksisController::class, 'data_buku'])->name('data_pinjam');
    Route::get('/profile_admin', [LibraryController::class, 'profile_admin'])->name('profile_admin');

    // delete
    Route::delete('/buku/{id}', [LibraryController::class, 'delete_buku'])->name('buku.delete');
    Route::delete('/data_siswa/{id}', [LibraryController::class, 'delete_siswa'])->name('siswa.delete');
    Route::delete('/data_pinjam/{id}', [TransaksisController::class, 'delete_data_pinjam'])->name('data_pinjam.delete');

    // create
    Route::post('/buku', [LibraryController::class, 'create_buku'])->name('buku.create');

    // edit
    Route::put('/buku/{id}', [LibraryController::class, 'edit_buku'])->name('buku.edit');
    Route::put('/data_siswa/{id}', [LibraryController::class, 'edit_siswa'])->name('siswa.edit');
});

// Siswa
Route::prefix('siswa')->middleware('auth:siswa')->group(function () {
    // view
    Route::get('/dashboard', [TransaksisController::class, 'index_siswa'])->name('dashboard_siswa');
    Route::get('/profile_siswa', [LibraryController::class, 'profile_siswa'])->name('profile_siswa');

    // pinjam
    Route::post('/pinjam_buku/{id}', [TransaksisController::class, 'pinjam_buku'])->name('pinjam_buku');
});

// Login Register Logout Action
Route::post('/login', [AuthController::class, 'login'])->name('login_user');
Route::post('/register', [AuthController::class, 'register'])->name('register_user');
Route::get('/logout', [LibraryController::class, 'logout'])->name('logout');
