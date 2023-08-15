<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "nama",
        "jurusan",
        "nama_sekolah",
        "logo_sekolah",
        "npsn",
        "akreditasi",
        "alamat",
        "nama_kepala_sekolah",
        "nip_kepala_sekolah"
    ];


    public function teacher() {
        return $this->hasOne(Teacher::class);
    }

    public function students() {
        return $this->hasMany(Student::class);
    }
}
