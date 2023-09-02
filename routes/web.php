<?php

use App\Http\Controllers\Admin\WaliKelas\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WaliKelas\ClassroomController;
use App\Http\Controllers\WaliKelas\ProfileController;
use App\Http\Controllers\WaliKelas\ProfilController;
use App\Http\Controllers\WaliKelas\SubjectTeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/dasbor', function () {
    return view('admin/dashboard');
})->middleware(['auth', 'verified'])->name('dasbor');




// helper
Route::get('/check-email', [AuthController::class, 'checkEmail'])->name('auth.check.email');

Route::middleware('auth')->group(function () {


    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Profil
    Route::get("/profil", [ProfilController::class, "index"])->name("profil");
    Route::put("/profil", [ProfilController::class, "update"])->name("profil.update");

    // Kelas
    Route::get('/kelas', [ClassroomController::class, 'index'])->name('kelas.index');
    Route::put('/kelas', [ClassroomController::class, 'update'])->name('kelas.update');

    // Siswa
    Route::get("/siswa", [StudentController::class, "index"])->name("siswa");
    Route::get("/siswa/tambah", [StudentController::class, "create"])->name("siswa.tambah.get");
    Route::get("/siswa/edit/{id}", [StudentController::class, "edit"])->name("siswa.edit");
    Route::patch("/siswa/{id}", [StudentController::class, "update"])->name("siswa.update");
    Route::post("/siswa", [StudentController::class, "store"])->name("siswa.post");
    Route::get("/siswa/{id}", [StudentController::class, "detail"])->name("siswa.detail");
    Route::delete("/siswa/{id}", [StudentController::class, "delete"])->name("siswa.delete");


    // Guru Mapel
    Route::get("/guru/mapel", [SubjectTeacherController::class, "index"])->name("guru_mapel");
    Route::delete("/guru/mapel/{id}", [SubjectTeacherController::class, "delete"])->name("guru_mapel.delete");
});

require __DIR__.'/auth.php';
