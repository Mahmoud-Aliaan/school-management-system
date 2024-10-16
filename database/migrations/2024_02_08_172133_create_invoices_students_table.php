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
        Schema::create('invoices_students', function (Blueprint $table) {
            $table->id();
            $table->date('date');  
            $table->string('type'); 
            $table->foreignId('fees_invoice_id')->nullable()->references('id')->on('fees__invoices')->onDelete('cascade');
            $table->foreignId('receipt_id')->nullable()->references('id')->on('recipt_students')->onDelete('cascade');
            $table->foreignId('processing_id')->nullable()->references('id')->on('processing__fees')->onDelete('cascade');
            $table->foreignId('payment_id')->nullable()->references('id')->on('payment__students')->onDelete('cascade');
            $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->decimal('Debit',8,2)->nullable();
            $table->decimal('credit',8,2)->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices_students');
    }
};
