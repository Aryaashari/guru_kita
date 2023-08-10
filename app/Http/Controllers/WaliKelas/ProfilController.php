<?php

namespace App\Http\Controllers\WaliKelas;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    
    public function index() {
        $profil = User::with('teacher')->find(Auth::user()->id);

        return view("admin/wali_kelas/profil/profil", compact("profil"));
    }

}
