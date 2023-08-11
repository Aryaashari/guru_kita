<?php

namespace App\Http\Controllers\WaliKelas;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Helper\ResponseJsonFormatter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ClassroomController extends Controller
{


    public function index(): View {

        $classroom = Auth::user()->teacher->classroom;

        return view('admin/wali_kelas/kelas/kelas', compact('classroom'));
    }

    public function update(Request $request): JsonResponse {
        $validator = Validator::make($request->all(), [
            "namaKelas" => "required|regex:/^[a-zA-Z0-9\s\-]+$/",
            "jurusanKelas" => "required|regex:/^[a-zA-Z\s]+$/",
            "namaSekolah" => "required|regex:/^[a-zA-Z0-9\s]+$/",
            "npsn" => "required|regex:/^[0-9]+$/",
            "akreditasiSekolah" => "required",
            "namaKepalaSekolah" => "nullable|regex:/^[a-zA-Z\s]+$/",
            "nipKepalaSekolah" => "nullable|regex:/^[0-9]+$/",
            "logoSekolah" => "nullable|mimes:jpg,png,jpeg|max:3072"
        ]);

        if ($validator->fails()) {
            return ResponseJsonFormatter::SendReponse(400, false, "validasi gagal", null, $validator->errors());
        }

        $classroom = Auth::user()->teacher->classroom;

        // store logo file
        $filePath = null;
        if ($request->hasFile("logoSekolah")) {

            // hapus data foto sebelumnya di storage
            if ($classroom->logo_sekolah != null) {
                Storage::disk("public")->delete($classroom->logo_sekolah);
            }

            $file = $request->file("logoSekolah");
            $fileName = "Logo_Sekolah_" . time() . ".". $file->getClientOriginalExtension();
            $filePath = $file->storeAs('kelas', $fileName, 'public');
        }
        
        // update data
        $classroom->nama = $request->namaKelas;
        $classroom->jurusan = $request->jurusanKelas;
        $classroom->nama_sekolah = $request->namaSekolah;
        $classroom->npsn = $request->npsn;
        $classroom->akreditasi = $request->akreditasiSekolah;
        $classroom->alamat = $request->alamatSekolah;
        $classroom->nama_kepala_sekolah = $request->namaKepalaSekolah;
        $classroom->nip_kepala_sekolah = $request->nipKepalaSekolah;
        $classroom->logo_sekolah = $filePath ?? $classroom->logo_sekolah;
        $classroom->save();

        // return
        return ResponseJsonFormatter::SendReponse(200, true, "berhasil edit data", $classroom);

    }


}
