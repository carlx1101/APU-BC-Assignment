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
        Schema::create('labortory_test_results', function (Blueprint $table) {
            $table->id();
            $table->string('test_type');
            $table->dateTime('test_date');
            $table->string('test_result');
            $table->string('reference_range');
            $table->string('testing_facility');
            $table->text('interpretation')->nullable();
            $table->foreignId('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('physician_attendant_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labortory_test_results');
    }
};
