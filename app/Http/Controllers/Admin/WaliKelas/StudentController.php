<?php

namespace App\Http\Controllers\Admin\WaliKelas;

use App\Helper\ResponseJsonFormatter;
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
        $students = $user->teacher->classroom->students()->select('id', 'nama', 'nis', 'nisn', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir')->get();

        return view("admin/wali_kelas/siswa/siswa", compact("students"));
    }
    

    public function getDataSiswa() {
        
        $students = Student::select('nama', 'nis', 'nisn', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir')->get();
        return DataTables::of($students)->make(true);

    }


    public function detail(string $id) {
        $student = Student::findOrFail($id);
        return view("admin/wali_kelas/siswa/detail", compact("student"));
    }


    public function create() {
        return view("admin/wali_kelas/siswa/tambah");
    }

    public function store(Request $request) {

        $request->validate(
            [
                "nama" => "required|regex:/^[a-zA-Z\s]+$/",
                "nis" => "required|regex:/^[0-9]+$/",
                "nisn" => "required|regex:/^[0-9]+$/",
                "tempatLahir" => "required|regex:/^[a-zA-Z\s]+$/",
                "tanggalLahir" => "required",
                "jenisKelamin" => "required",
                "noTelp" => "nullable|regex:/^[0-9]+$/|digits_between:10,12",
                "namaAyah" => "nullable|regex:/^[a-zA-Z\s]+$/",
                "pekerjaanAyah" => "nullable|regex:/^[a-zA-Z\s]+$/",
                "noTelpAyah" => "nullable|regex:/^[0-9]+$/|digits_between:10,12",
                "namaIbu" => "nullable|regex:/^[a-zA-Z\s]+$/",
                "pekerjaanIbu" => "nullable|regex:/^[a-zA-Z\s]+$/",
                "noTelpIbu" => "nullable|regex:/^[0-9]+$/|digits_between:10,12",
                "namaWali" => "nullable|regex:/^[a-zA-Z\s]+$/",
                "pekerjaanWali" => "nullable|regex:/^[a-zA-Z\s]+$/",
                "noTelpWali" => "nullable|regex:/^[0-9]+$/|digits_between:10,12",
            ],

            [
                "nama.required" => "Anda belum memasukkan nama siswa",
                "nama.regex" => "Nama hanya boleh karakter (a-z, A-Z, dan spasi)",

                "nis.required" => "Anda belum memasukkan nis siswa",
                "nis.regex" => "NIS hanya boleh karakter (0-9)",

                "nisn.required" => "Anda belum memasukkan nisn siswa",
                "nisn.regex" => "NISN hanya boleh karakter (0-9)",

                "tempatLahir.required" => "Anda belum memasukkan tempat lahir siswa",
                "tempatLahir.regex" => "Tempat lahir hanya boleh karakter (a-z, A-Z, dan spasi)",

                "tanggalLahir.required" => "Anda belum memasukkan tanggal lahir siswa",

                "jenisKelamin.required" => "Anda belum memasukkan jenis kelamin siswa",

                "noTelp.regex" => "No telp/WA hanya boleh karakter (0-9)",
                "noTelp.digits_between" => "No telp/WA minimal 10 dan maksimal 12 karakter",

                "namaAyah.regex" => "Nama ayah hanya boleh karakter (a-z, A-Z, dan spasi)",
                "pekerjaanAyah.regex" => "Pekerjaan ayah hanya boleh karakter (a-z, A-Z, dan spasi)",
                "noTelpAyah.regex" => "No telp/WA hanya boleh karakter (0-9)",
                "noTelpAyah.digits_between" => "No telp/WA minimal 10 dan maksimal 12 karakter",

                "namaIbu.regex" => "Nama ibu hanya boleh karakter (a-z, A-Z, dan spasi)",
                "pekerjaanIbu.regex" => "Pekerjaan ibu hanya boleh karakter (a-z, A-Z, dan spasi)",
                "noTelpIbu.regex" => "No telp/WA hanya boleh karakter (0-9)",
                "noTelpIbu.digits_between" => "No telp/WA minimal 10 dan maksimal 12 karakter",

                "namaWali.regex" => "Nama wali hanya boleh karakter (a-z, A-Z, dan spasi)",
                "pekerjaanWali.regex" => "Pekerjaan wali hanya boleh karakter (a-z, A-Z, dan spasi)",
                "noTelpWali.regex" => "No telp/WA hanya boleh karakter (0-9)",
                "noTelpWali.digits_between" => "No telp/WA minimal 10 dan maksimal 12 karakter",
            ]
        );

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

    public function edit(string $id) {

        $student = Student::findOrFail($id);

        return view("admin/wali_kelas/siswa/edit", compact("student"));

    }


    public function update(Request $request, string $id) {
        $request->validate(
            [
                "nama" => "required|regex:/^[a-zA-Z\s]+$/",
                "nis" => "required|regex:/^[0-9]+$/",
                "nisn" => "required|regex:/^[0-9]+$/",
                "tempatLahir" => "required|regex:/^[a-zA-Z\s]+$/",
                "tanggalLahir" => "required",
                "jenisKelamin" => "required",
                "noTelp" => "nullable|regex:/^[0-9]+$/|digits_between:10,12",
                "namaAyah" => "nullable|regex:/^[a-zA-Z\s]+$/",
                "pekerjaanAyah" => "nullable|regex:/^[a-zA-Z\s]+$/",
                "noTelpAyah" => "nullable|regex:/^[0-9]+$/|digits_between:10,12",
                "namaIbu" => "nullable|regex:/^[a-zA-Z\s]+$/",
                "pekerjaanIbu" => "nullable|regex:/^[a-zA-Z\s]+$/",
                "noTelpIbu" => "nullable|regex:/^[0-9]+$/|digits_between:10,12",
                "namaWali" => "nullable|regex:/^[a-zA-Z\s]+$/",
                "pekerjaanWali" => "nullable|regex:/^[a-zA-Z\s]+$/",
                "noTelpWali" => "nullable|regex:/^[0-9]+$/|digits_between:10,12",
            ],

            [
                "nama.required" => "Anda belum memasukkan nama siswa",
                "nama.regex" => "Nama hanya boleh karakter (a-z, A-Z, dan spasi)",

                "nis.required" => "Anda belum memasukkan nis siswa",
                "nis.regex" => "NIS hanya boleh karakter (0-9)",

                "nisn.required" => "Anda belum memasukkan nisn siswa",
                "nisn.regex" => "NISN hanya boleh karakter (0-9)",

                "tempatLahir.required" => "Anda belum memasukkan tempat lahir siswa",
                "tempatLahir.regex" => "Tempat lahir hanya boleh karakter (a-z, A-Z, dan spasi)",

                "tanggalLahir.required" => "Anda belum memasukkan tanggal lahir siswa",

                "jenisKelamin.required" => "Anda belum memasukkan jenis kelamin siswa",

                "noTelp.regex" => "No telp/WA hanya boleh karakter (0-9)",
                "noTelp.digits_between" => "No telp/WA minimal 10 dan maksimal 12 karakter",

                "namaAyah.regex" => "Nama ayah hanya boleh karakter (a-z, A-Z, dan spasi)",
                "pekerjaanAyah.regex" => "Pekerjaan ayah hanya boleh karakter (a-z, A-Z, dan spasi)",
                "noTelpAyah.regex" => "No telp/WA hanya boleh karakter (0-9)",
                "noTelpAyah.digits_between" => "No telp/WA minimal 10 dan maksimal 12 karakter",

                "namaIbu.regex" => "Nama ibu hanya boleh karakter (a-z, A-Z, dan spasi)",
                "pekerjaanIbu.regex" => "Pekerjaan ibu hanya boleh karakter (a-z, A-Z, dan spasi)",
                "noTelpIbu.regex" => "No telp/WA hanya boleh karakter (0-9)",
                "noTelpIbu.digits_between" => "No telp/WA minimal 10 dan maksimal 12 karakter",

                "namaWali.regex" => "Nama wali hanya boleh karakter (a-z, A-Z, dan spasi)",
                "pekerjaanWali.regex" => "Pekerjaan wali hanya boleh karakter (a-z, A-Z, dan spasi)",
                "noTelpWali.regex" => "No telp/WA hanya boleh karakter (0-9)",
                "noTelpWali.digits_between" => "No telp/WA minimal 10 dan maksimal 12 karakter",
            ]
        );

        $student = Student::findOrFail($id);
        $student->update(
            [
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
            ]   
        );

        return redirect("/siswa/".$student->id)->with("message", "Berhasil edit data!");

    }

    public function delete(string $id) {
        try {

            $student = Student::findOrFail($id);
            $student->delete();
            return ResponseJsonFormatter::SendReponse(200, true, "delete data successfully");
        } catch(\Exception $e) {
            abort(500);
        }

    }

}
