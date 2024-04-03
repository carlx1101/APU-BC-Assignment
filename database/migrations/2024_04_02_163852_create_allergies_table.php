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
        Schema::create('allergies', function (Blueprint $table) {
            $table->id();
            $table->string('allergen_name')->nullable();
            $table->string('reaction_type')->nullable();
            $table->string('severity')->nullable();
            $table->date('onset_date')->nullable();
            $table->date('resolution_date')->nullable();
            $table->text('management_plan')->nullable();
            $table->foreignId('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allergies');
    }
};
