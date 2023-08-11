<?php

namespace App\Http\Controllers\WaliKelas;

use App\Helper\ResponseJsonFormatter;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    
    public function index() {
        $profil = User::with('teacher')->find(Auth::user()->id);

        return view("admin/wali_kelas/profil/profil", compact("profil"));
    }


    public function update(Request $request): JsonResponse {

        try {
            DB::beginTransaction();
            // validasi
            $validator = Validator::make($request->all(), [
                "nama" => "required|regex:/^[a-zA-Z\s]+$/",
                "nip" => "required|regex:/^[0-9]+$/",
                "tempatLahir" => "required|regex:/^[a-zA-Z\s]+$/",
                "tanggalLahir" => "required",
                "noTelp" => "required|regex:/^[0-9]+$/|digits_between:10,12",
                "fotoProfil" => "nullable|mimes:jpg,png,jpeg|max:3072",
            ]);
    
            if ($validator->fails()) {
                return ResponseJsonFormatter::SendReponse(400, false, "validasi gagal", null, $validator->errors());
            }
    
            $profil = User::with('teacher')->find(Auth::user()->id);
    
            // store logo file
            $filePath = null;
            if ($request->hasFile("fotoProfil")) {
    
                // hapus data foto sebelumnya di storage
                if ($profil->teacher->foto_profile != null) {
                    Storage::disk("public")->delete($profil->teacher->foto_profile);
                }
    
                $file = $request->file("fotoProfil");
                $fileName = "Foto_Profil_" . time() . ".". $file->getClientOriginalExtension();
                $filePath = $file->storeAs('profil', $fileName, 'public');
            }
    
            // update
            $profil->nama = $request->nama;

            if ($profil->teacher) {
                $teacher = $profil->teacher;
                $teacher->nip = $request->nip;
                $teacher->tempat_lahir = $request->tempatLahir;
                $teacher->tanggal_lahir = $request->tanggalLahir;
                $teacher->no_telp = $request->noTelp;
                $teacher->foto_profile = $filePath ?? $teacher->foto_profile;
                $teacher->jenis_kelamin = $request->jenisKelamin;
                $teacher->save();
            }

            $profil->save();
            
            DB::commit();
            
            // return
            return ResponseJsonFormatter::SendReponse(200, true, "berhasil edit profil", $profil, null);
        } catch(\Exception $e) {
            DB::rollBack();
            return ResponseJsonFormatter::SendReponse(500, false, "server error", null, $e->getMessage());
        }
    }   

}
