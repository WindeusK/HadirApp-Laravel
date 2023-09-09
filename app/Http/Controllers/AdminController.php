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
        return view('dasboard', [
            'admin' => User::find(Auth::id()),
            'tambah_buku' => Buku::take()->post(),
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

    /**
     * Menambahkan buku baru
     */
    public function tambahBuku (int $id, Request $request) {
        $data = $request->validate([
            'judul' => 'required|string',
            'isbn' => 'required|max:13|numeric',
            'jumlah' => 'required|numeric',
            'penulis' => 'required|string',
            'sinopsis' => 'string'
        ]);

        Buku::create($data);

        return view('admin.tambah-buku')->with('success', 'Berhasil menambahkan buku!');
    }

    /**
     * Hapus Buku
     */
    public function hapus (int $id) {
        $buku = Buku::find($id);

        $buku->delete();

        return view ('admin.list-buku')->with('success', ("Buku dengan judul '" . $buku->judul . "' berhasil dihapus."));
    }

    /**
     * Untuk meminjam buku
     */
    public function pinjam (int $id_buku, Request $request) {
        $request->validate([
            'jumlah' => 'required|numeric',
            'id_peminjam' => 'required|numeric',
            'tanggal_pinjam' => 'required|date',
            'batas_pinjam' => 'required|date',
            'tanggal_kembali' => 'date'
        ]);

        $buku = Buku::find($id_buku);

        if (!$buku) {
            return view('admin.list-peminjaman')->with('error', 'Buku dengan ID ini tidak ditemukan');
        }

        if (($buku->jumlah - $request->jumlah) < 0) {
            return view('admin.list-peminjaman')->with('error', 'Jumlah peminjaman melebihi stok buku');
        }

        Peminjaman::create([
            'judul_buku' => $buku->judul,
            'jumlah' => $request->jumlah,
            'id_peminjam' => $request->id_peminjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'batas_pinjam' => $request->batas_pinjam,
        ]);

        $buku->jumlah -= $request->jumlah;

        return view('admin.list-peminjaman')->with('success', 'Buku berhasil dipinjam');
    }

    /**
     * Untuk melihat data peminjaman
     */
    public function peminjaman (int $id_peminjaman) {
        $peminjaman = Peminjaman::find($id_peminjaman);

        return view ('admin.peminjaman', ['data_peminjaman' => $peminjaman]);
    }
}
