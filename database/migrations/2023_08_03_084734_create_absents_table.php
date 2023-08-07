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
        Schema::create('absents', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid("subject_id")->references("id")->on("subjects")->onDelete("cascade");
            $table->foreignUuid("student_id")->references("id")->on("students")->onDelete("cascade");
            $table->enum("kehadiran", ["A", "M", "I", "S"])->nullable(false)->default("A");
            $table->string("keterangan", 255)->nullable();
            $table->date("tanggal")->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absents');
    }
};
