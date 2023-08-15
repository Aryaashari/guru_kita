<?php

namespace App\Http\Controllers\Admin\WaliKelas;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    
    public function index() {
        // $students = Student::select('nama', 'nis', 'nisn', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir')->get();

        $user = Auth::user();
        $students = $user->teacher->classroom->students()->select('nama', 'nis', 'nisn', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir')->get();

        return view("admin/wali_kelas/siswa/siswa", compact("students"));
    }
    

    public function getDataSiswa() {
        
        $students = Student::select('nama', 'nis', 'nisn', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir')->get();
        return DataTables::of($students)->make(true);

    }


    public function detail(string $id) {
        // $student = Student::where("id", $id);
        // dd($student);
    }


    public function create() {
        return view("admin/wali_kelas/siswa/tambah");
    }

}
