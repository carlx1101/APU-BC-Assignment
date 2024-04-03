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
        Schema::create('vital_results', function (Blueprint $table) {
            $table->id();
            $table->dateTime('measurement_datetime');
            $table->integer('blood_pressure');
            $table->integer('heart_rate');
            $table->integer('respiratory_rate');
            $table->decimal('temperature', 5, 2);
            $table->decimal('oxygen_saturation', 5, 2);
            $table->decimal('weight', 5, 2);
            $table->decimal('height', 5, 2);
            $table->decimal('BMI', 5, 2);
            $table->foreignId('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vital_results');
    }
};
