<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectTeacher extends Model
{
    use HasFactory;

    protected $fillable = ["id", "user_id", "nama", "nip", "no_telp", "jenis_kelamin"];

    protected $casts = [
        "id" => "string"
    ];
}
