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
        Schema::create('teachers', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreignUuid("classroom_id")->references("id")->on("classrooms")->onDelete("cascade");
            $table->string("nip", 100)->nullable(false);
            $table->string("tempat_lahir", 100)->nullable(false);
            $table->date("tanggal_lahir")->nullable(false);
            $table->char("no_telp", 13)->nullable(false);
            $table->string("foto_profile", 255)->nullable();
            $table->enum("jenis_kelamin", ["L", "P"])->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
