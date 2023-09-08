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

    /**
     * Untuk melihat data individu buku
     */
    public function indexBuku (int $id) {
        $buku = Buku::find($id);

        return view('admin.buku-index', ['info_buku' => $buku]);
    }

    /**
     * Melakukan update kepada buku yang dipilih
     */
    public function edit (int $id, Request $request) {
        $data = $request->validate([
            'judul' => 'required|string',
            'isbn' => 'required|max:13|numeric',
            'jumlah' => 'required|numeric',
            'penulis' => 'required|string',
            'sinopsis' => 'string'
        ]);

        $buku = Buku::find($id);
        
        $buku->update($data);

        return view('admin.buku-index')->with('success', 'Berhasil melakukan update kepada data buku!');
    }
}
