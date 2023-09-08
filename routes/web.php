<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

    //Admin Page
    Route::group(['prefix' => '/admin'], function () {

        Route::group(['prefix' => '/dashboard'], function () {
            Route::get('/', [AdminController::class, 'dashboard']);
            Route::get('/buku', [AdminController::class, 'buku']);
            Route::get('/buku/{id}', [AdminController::class, 'indexBuku']);
        });

        Route::get('/', fn () => redirect('/dashboard'));

    })->middleware('isAdmin');
});