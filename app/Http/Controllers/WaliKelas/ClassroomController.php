<?php

namespace App\Http\Controllers\WaliKelas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassroomController extends Controller
{


    public function index() {

        $classroom = Auth::user()->teacher->classroom;
        // $teacher = Auth::user()->teacher;
        // dump($teacher->user);
        // dd(Auth::user()->nama);

        return view('admin/guru/kelas/kelas', compact('classroom'));
    }


}
