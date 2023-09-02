<?php

namespace App\Http\Controllers\WaliKelas;

use App\Helper\ResponseJsonFormatter;
use App\Http\Controllers\Controller;
use App\Models\SubjectTeacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Rfc4122\UuidV1;

class SubjectTeacherController extends Controller
{
    
    public function index() {

        $subjectTeachers = SubjectTeacher::where("user_id", Auth::user()->id)->get();
        return view("admin/wali_kelas/guru/guru", compact("subjectTeachers"));
    }

    public function create() {
        return view("admin/wali_kelas/guru/tambah");
    }

    public function store(Request $request) {

        $request->validate(
            [
                "nama" => "required|regex:/^[a-zA-Z\s]+$/",
                "nip" => "required|regex:/^[0-9]+$/",
                "noTelp" => "required|regex:/^[0-9]+$/|digits_between:10,12",
                "jenisKelamin" => "required"
            ],
            [
                "nama.required" => "Anda belum memasukkan nama guru",
                "nama.regex" => "Nama hanya boleh karakter (a-z, A-Z, dan spasi)",

                "nip.required" => "Anda belum memasukkan nip guru",
                "nip.regex" => "NIP hanya boleh karakter (0-9)",

                "noTelp.required" => "Anda belum memasukkan no telp/WA",
                "noTelp.regex" => "No telp/WA hanya boleh karakter (0-9)",
                "noTelp.digits_between" => "No telp/WA minimal 10 dan maksimal 12 karakter",
            ]
        );

        SubjectTeacher::create([
            "id" => UuidV1::uuid4()->toString(),
            "user_id" => Auth::user()->id,
            "nama" => $request->nama, 
            "nip" => $request->nip,
            "no_telp" => $request->noTelp,
            "jenis_kelamin" => $request->jenisKelamin
        ]);

        return redirect("/guru/mapel")->with("message", "Berhasil tambah data!");

    }


    public function edit(string $id) {

        $subjectTeacher = SubjectTeacher::findOrFail($id);
        return view("admin/wali_kelas/guru/edit", compact("subjectTeacher"));

    }

    public function update(Request $request, string $id) {

        $request->validate(
            [
                "nama" => "required|regex:/^[a-zA-Z\s]+$/",
                "nip" => "required|regex:/^[0-9]+$/",
                "noTelp" => "required|regex:/^[0-9]+$/|digits_between:10,12",
                "jenisKelamin" => "required"
            ],
            [
                "nama.required" => "Anda belum memasukkan nama guru",
                "nama.regex" => "Nama hanya boleh karakter (a-z, A-Z, dan spasi)",

                "nip.required" => "Anda belum memasukkan nip guru",
                "nip.regex" => "NIP hanya boleh karakter (0-9)",

                "noTelp.required" => "Anda belum memasukkan no telp/WA",
                "noTelp.regex" => "No telp/WA hanya boleh karakter (0-9)",
                "noTelp.digits_between" => "No telp/WA minimal 10 dan maksimal 12 karakter",
            ]
        );

        $subjectTeacher = SubjectTeacher::findOrFail($id);
        $subjectTeacher->update([
            "nama" => $request->nama,
            "nip" => $request->nip,
            "no_telp" => $request->noTelp,
            "jenis_kelamin" => $request->jenisKelamin
        ]);

        return back()->with("message", "Berhasil edit data!");

    }

    public function delete(string $id) {

        $subjectTeacher = SubjectTeacher::findOrFail($id);
        $subjectTeacher->delete();

        return ResponseJsonFormatter::SendReponse(200, true, "berhasil delete");

    }

}
