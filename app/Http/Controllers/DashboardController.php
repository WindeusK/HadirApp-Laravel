<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        if (Gate::allows('admin', $user)) {
            return redirect('/admin/list-peminjaman');
        } else {
            return view('siswa', ['user' => $user]);
        }
    }

    public function buku()
    {
        $buku = Buku::paginate(15);
        return view('dashboard.buku', ['buku' => $buku]);
    }

    public function lihatPeminjaman()
    {
        $user_id = Auth::id();

        $peminjaman = Peminjaman::where('id', '=', $user_id)->get();

        return view('dashboard.peminjaman', ['data' => $peminjaman]);
    }

    public function kembalikanPeminjaman(Request $request)
    {
        $request->validate([
            'id_peminjaman' => 'required|numeric',
            'id_peminjam' => 'required|numeric'
        ]);

        $peminjaman = Peminjaman::where('id', '=', $request->id_peminjaman)
            ->where('id_peminjam', '=', $request->id_peminjam)
            ->get();

        if (!$peminjaman) {
            return view('dashboard.peminjaman')->with('error', 'ID Peminjaman tidak berhasil ditemukan!');
        }

        $peminjaman->tanggal_kembali = now();

        return view('dashboard.peminjaman')->with('success', 'Terima kasih telah mengembalikan buku!');
    }
}
