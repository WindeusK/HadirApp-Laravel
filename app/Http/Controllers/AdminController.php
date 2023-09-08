<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Buku;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    /**
     * Untuk melihat profile admin dan 
     * melihat preview data buku dan peminjaman
     */
    public function dashboard () {
        return view('admin.dashboard', [
            'admin_info' => User::find(Auth::id()),
            'preview_buku' => Buku::take(10)->get(),
            'preview_peminjaman' => Peminjaman::take()->get()
        ]);
    }

    /**
     * Untuk melihat dashboard dari koleksi
     * data semua buku.
     */
    public function buku () {
        return view('admin.buku', [
            'info_buku' => Buku::all()
        ]);
    }
}
