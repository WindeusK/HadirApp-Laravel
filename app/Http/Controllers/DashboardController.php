<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard () {
        $user = Auth::user();
        if (Gate::allows('admin', $user)) {
            return redirect('/admin' + '/dashboard');
        } else {
            return view('dashboard.siswa', ['user' => $user]);
        }
    }
}
