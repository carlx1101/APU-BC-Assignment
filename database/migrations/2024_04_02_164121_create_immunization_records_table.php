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
        Schema::create('immunization_records', function (Blueprint $table) {
            $table->id();
            $table->date('date_of_immunization');
            $table->string('vaccine_name');
            $table->string('manufacturer');
            $table->string('lot_number');
            $table->string('dose_number');
            $table->string('administration_route');
            $table->string('anatomical_site');
            $table->string('adverse_reaction')->nullable();
            $table->date('next_due_date')->nullable();
            $table->string('vaccination_status');
            $table->text('contraindications')->nullable();
            $table->string('patient_consent');
            $table->text('vaccination_schedule')->nullable();
            $table->foreignId('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('immunization_provider_id')->references('id')->on('branches')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('immunization_records');
    }
};
