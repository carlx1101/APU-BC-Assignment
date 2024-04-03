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
        Schema::create('medication_records', function (Blueprint $table) {
            $table->id();
            $table->string('medication_name');
            $table->string('dosage');
            $table->string('frequency');
            $table->unsignedBigInteger('prescribing_doctor_id');
            $table->unsignedBigInteger('dispensing_pharmacy_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('doctor_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medication_records');
    }
};
