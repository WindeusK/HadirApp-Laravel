<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Petugas;

class DashboardController extends Controller
{
    public function dashboard () {
        return view('admin.dashboard', [
            'admin_info' => Petugas::find(Auth::id())
        ]);
    }
}
