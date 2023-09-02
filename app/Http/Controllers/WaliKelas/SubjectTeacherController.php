<?php

namespace App\Http\Controllers\WaliKelas;

use App\Helper\ResponseJsonFormatter;
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

    public function create() {
        return view("admin/wali_kelas/guru/tambah");
    }

    public function delete(string $id) {

        $subjectTeacher = SubjectTeacher::findOrFail($id);
        $subjectTeacher->delete();

        return ResponseJsonFormatter::SendReponse(200, true, "berhasil delete");

    }

}
