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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('amount');
            $table->foreignid('Grade_id')->references('id')->on('Grades')->onDelete('cascade');
            $table->foreignid('Classroom_id')->references('id')->on('Classrooms')->onDelete('cascade');
            $table->string('description')->nullable();
            $table->string('year');
            $table->Integer('Fee_type');


            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
