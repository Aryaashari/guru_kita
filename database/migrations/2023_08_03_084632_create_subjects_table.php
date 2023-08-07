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
        Schema::create('subjects', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->foreignUuid("classroom_id")->references("id")->on("classrooms")->onDelete("cascade");
            $table->foreignUuid("subject_teacher_id")->references("id")->on("subject_teachers")->onDelete("cascade");
            $table->string("nama", 100)->nullable(false);
            $table->enum("semester", ["1", "2", "3", "4", "5", "6", "7", "8"])->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
