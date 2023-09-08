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
        return view('admin', [
            // 'admin_info' => User::find(Auth::id()),
            'list-buku' => Buku::take(10)->get(),
            'list-peminjaman' => Peminjaman::take()->get()
        ]);
    }

    /**
     * Untuk melihat dashboard dari koleksi
     * data semua buku.
     */
    public function buku () {
        return view('admin.list-buku', [
            'list-buku' => Buku::all()
        ]);
    }

    /**
     * Untuk melihat data individu buku
     */
    public function indexBuku (int $id) {
        $buku = Buku::find($id);

        return view('admin.list-buku', ['info_buku' => $buku]);
    }
}
