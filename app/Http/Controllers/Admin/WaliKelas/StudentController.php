<?php

namespace App\Http\Controllers\Admin\WaliKelas;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Rfc4122\UuidV1;
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

    public function store(Request $request) {

        $classroomId = Auth::user()->teacher->classroom_id;

        $student = Student::create([
            "id" => UuidV1::uuid4()->toString(),
            "classroom_id" => $classroomId,
            "nama" => $request->nama,
            "nis" => $request->nis,
            "nisn" => $request->nisn,
            "tempat_lahir" => $request->tempatLahir,
            "tanggal_lahir" => $request->tanggalLahir,
            "jenis_kelamin" => $request->jenisKelamin,
            "alamat" => $request->alamat,
            "no_telp" => $request->noTelp,
            "nama_ibu" => $request->namaIbu,
            "pekerjaan_ibu" => $request->pekerjaanIbu,
            "alamat_ibu" => $request->alamatIbu,
            "no_telp_ibu" => $request->noTelpIbu,
            "nama_ayah" => $request->namaAyah,
            "pekerjaan_ayah" => $request->pekerjaanAyah,
            "alamat_ayah" => $request->alamatAyah,
            "no_telp_ayah" => $request->noTelpAyah,
            "nama_wali" => $request->namaWali,
            "pekerjaan_wali" => $request->pekerjaanWali,
            "alamat_wali" => $request->alamatWali,
            "no_telp_wali" => $request->noTelpWali,
        ]);

        return redirect("/siswa")->with("message", "Berhasil tambahkan data!");

    }

}
