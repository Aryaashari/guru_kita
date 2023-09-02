<?php

namespace App\Http\Controllers\WaliKelas;

use App\Http\Controllers\Controller;
use App\Models\SubjectTeacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectTeacherController extends Controller
{
    
    public function index() {

        $subjectTeachers = SubjectTeacher::where("user_id", Auth::user()->id)->get();
        return view("admin/wali_kelas/guru/guru", compact("subjectTeachers"));
    }

}
