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
        Schema::create('grades', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid("subject_id")->references("id")->on("subjects")->onDelete("cascade");
            $table->foreignUuid("student_id")->references("id")->on("students")->onDelete("cascade");
            $table->unsignedFloat("nilai")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
