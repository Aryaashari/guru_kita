<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'classroom_id',
        'nip',
        'tempat_lahir',
        'tanggal_lahir',
        'no_telp',
        'foto_profile',
        'jenis_kelamin'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }
}
