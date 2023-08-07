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
        Schema::create('subject_teachers', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("nama", 100)->nullable(false);
            $table->string("nip", 100)->nullable();
            $table->char("no_telp", 13)->nullable();
            $table->enum("jenis_kelamin", ["L", "P"])->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_teachers');
    }
};
