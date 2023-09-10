<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', fn () => view('welcome-page'));

Route::get('/login', [LoginController::class, 'getLoginPage'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('/buku', [DashboardController::class, 'buku']);
    Route::get('/peminjaman', [DashboardController::class, 'lihatPeminjaman']);

    //Admin Page
    Route::group(['prefix' => '/admin'], function () {

        Route::group(['prefix' => '/dashboard'], function () {

            Route::get('/', [AdminController::class, 'dashboard']);

            // Buku Routes Group
            Route::group(['prefix' => '/buku'], function () {

                // Index semua buku (READ)
                Route::get('/buku', [AdminController::class, 'buku']);

                // Tambah Buku (CREATE)
                Route::get('/buku/tambah', fn () => view('admin.tambah-buku'));
                Route::post('/buku/tambah', [AdminController::class, 'tambahBuku']);

                // Index Buku Individu (READ)
                Route::get('/buku/{id}', [AdminController::class, 'indexBuku']);

                // Edit Buku (UPDATE)
                Route::post('/buku/{id}', [AdminController::class, 'edit']);

                // Hapus Buku (DELETE)
                Route::delete('/buku/{id}', [AdminController::class, 'hapus']);
            });

            Route::get('/peminjaman', fn () => view('admin.peminjaman'));
            Route::post('/pinjam/{id_buku}', fn () => view('admin.pinjam'));

            Route::get('/peminjaman/{id_peminjaman}', [AdminController::class, 'peminjaman']);
            Route::post('/peminjaman/{id_peminjaman}', [AdminController::class, 'kembali']);
        });

        Route::get('/', fn () => redirect('/dashboard'));
    })->middleware('isAdmin');
});
