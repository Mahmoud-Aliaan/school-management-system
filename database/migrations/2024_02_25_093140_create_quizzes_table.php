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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignid('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreignid('Grade_id')->references('id')->on('Grades')->onDelete('cascade');
            $table->foreignid('Classroom_id')->references('id')->on('Classrooms')->onDelete('cascade');
            $table->foreignid('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreignid('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
