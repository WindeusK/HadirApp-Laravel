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
}
