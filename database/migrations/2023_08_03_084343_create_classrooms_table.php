<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("nama", 100)->nullable();
            $table->string("jurusan", 100)->nullable();
            $table->string("nama_sekolah", 100)->nullable();
            $table->string("logo_sekolah", 255)->nullable();
            $table->string("npsn", 255)->nullable();
            $table->char("akreditasi", 2)->nullable();
            $table->string("alamat", 255)->nullable();
            $table->string("nama_kepala_sekolah", 100)->nullable();
            $table->string("nip_kepala_sekolah", 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classrooms');
    }
};
