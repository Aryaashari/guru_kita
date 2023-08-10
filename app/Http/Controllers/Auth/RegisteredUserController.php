<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Ramsey\Uuid\Uuid;
use App\Helper\ResponseJsonFormatter;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register2');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request) : JsonResponse
    {

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
        ])->validate();
        

        DB::beginTransaction();
        $userId = Uuid::uuid4()->toString();
        $user = User::create([
            'id' => $userId,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $classroomId = Uuid::uuid4()->toString();
        Classroom::create([
            'id' => $classroomId,
        ]);

        $teacherId = Uuid::uuid4()->toString();
        Teacher::create([
            'id' => $teacherId,
            'user_id' => $userId,
            'classroom_id' => $classroomId,
            'nip' => $request->nip,
            'tempat_lahir' => $request->tempatLahir,
            'tanggal_lahir' => $request->tanggalLahir,
            'no_telp' => $request->noTelp,
            'jenis_kelamin' => $request->jenisKelamin
        ]);
        
        

        DB::commit();

        return ResponseJsonFormatter::SendReponse(200, true, "berhasil daftar");
    }
}
