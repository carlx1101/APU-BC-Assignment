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
            $table->date('date_of_immunization')->nullable();
            $table->string('vaccine_name')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('lot_number')->nullable();
            $table->string('dose_number')->nullable();
            $table->string('administration_route')->nullable();
            $table->string('anatomical_site')->nullable();
            $table->string('adverse_reaction')->nullable();
            $table->date('next_due_date')->nullable();
            $table->string('vaccination_status')->nullable();
            $table->text('contraindications')->nullable();
            $table->string('patient_consent')->nullable();
            $table->text('vaccination_schedule')->nullable();
            $table->string('global_hash')->nullable();
            $table->string('hash_value')->nullable();
            $table->foreignId('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('immunization_provider_id')->references('id')->on('users')->onDelete('cascade');
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
