<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Fortify;
use Ramsey\Uuid\Uuid;

class AuthController extends Controller
{
    
    public function loginView() : View {
        return view("auth.login");
    }

    public function registerView() : View {
        return view("auth.register");
    }

    public function checkEmail(Request $request) {

        $user = User::where("email", $request->email)->first();

        if ($user) {
            return response()->json(["isRegistered" => true], 200);
        } else {
            return response()->json(["isRegistered" => false], 200);
        }
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:100'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => [
                'required',
                'min:8',
                'confirmed'
            ],
            'nip' => [
                'required',
                'numeric'
            ],
            'tempatLahir' => [
                'required',
            ],
            'tanggalLahir' => [
                'required'
            ],
            'noTelp' => [
                'required',
                'digits_between:10,13',
            ],
            'jenisKelamin' => [
                'required'
            ]
        ]);
        
        if ($validator->fails()) {
            return response()->json(
            [
                "success" => false,
                "error" => $validator->failed()
            ], 400);
        }
    

        DB::beginTransaction();
        
        try {
            
            $userId = Uuid::uuid4()->toString();
            User::create([
                'id' => $userId,
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            $teacherId = Uuid::uuid4()->toString();
            Teacher::create([
                'id' => $teacherId,
                'user_id' => $userId,
                'nip' => $request->nip,
                'tempat_lahir' => $request->tempatLahir,
                'tanggal_lahir' => $request->tanggalLahir,
                'no_telp' => $request->noTelp,
                'foto_profile' => "default.png",
                'jenis_kelamin' => $request->jenisKelamin
            ]);
            
            Classroom::create([
                'id' => Uuid::uuid4()->toString(),
                'teacher_id' => $teacherId,
                'nama' => 'Nama Kelas',
                'jurusan' => 'Jurusan'
            ]);
            
            DB::commit();
            return response()->json(["success" => true], 200);
        } catch(\Exception $e) {
            DB::rollBack();
            var_dump($e);
            return response()->json(["success", false, "error" => $e], 500);
        }
    }



}
