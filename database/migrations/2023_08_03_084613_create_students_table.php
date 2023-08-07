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
        Schema::create('students', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid("classroom_id")->references("id")->on("classrooms")->onDelete("cascade");
            $table->string("nama", 100)->nullable(false);
            $table->string("nis", 100)->nullable();
            $table->string("nisn", 100)->nullable();
            $table->enum("jenis_kelamin", ["L", "P"])->nullable(false);
            $table->string("tempat_lahir")->nullable();
            $table->date("tanggal_lahir")->nullable();
            $table->string("alamat", 255)->nullable();
            $table->char("no_telp", 13)->nullable();
            $table->string("nama_ayah", 100)->nullable();
            $table->string("pekerjaan_ayah", 100)->nullable();
            $table->string("alamat_ayah", 255)->nullable();
            $table->char("no_telp_ayah", 13)->nullable();
            $table->string("nama_ibu", 100)->nullable();
            $table->string("pekerjaan_ibu", 100)->nullable();
            $table->string("alamat_ibu", 255)->nullable();
            $table->char("no_telp_ibu", 13)->nullable();
            $table->string("nama_wali", 100)->nullable();
            $table->string("pekerjaan_wali", 100)->nullable();
            $table->string("alamat_wali", 255)->nullable();
            $table->char("no_telp_wali", 13)->nullable();
            $table->string("status_wali", 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
