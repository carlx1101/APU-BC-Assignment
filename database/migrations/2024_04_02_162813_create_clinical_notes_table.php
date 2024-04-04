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
        Schema::create('clinical_notes', function (Blueprint $table) {
            $table->id();
            $table->dateTime('assessment_datetime');
            $table->text('diagnosis');
            $table->text('treatment_plan');
            $table->text('follow_up_recommendations')->nullable();
            $table->text('referrals')->nullable();
            $table->text('patient_education')->nullable();
            $table->text('procedures')->nullable();
            $table->text('assessment_findings')->nullable();
            $table->text('risks_management')->nullable();
            $table->string('global_hash')->nullable();
            $table->foreignId('doctor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinical_notes');
    }
};
