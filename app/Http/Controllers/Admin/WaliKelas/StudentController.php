<?php

namespace App\Http\Controllers\Admin\WaliKelas;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    
    public function index() {
        return view("admin/wali_kelas/siswa/siswa");
    }
    

    public function getDataSiswa() {

        $student = Student::select('nama', 'nis', 'nisn', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir')->get();
        return DataTables::of($student)->make(true);

    }

}
