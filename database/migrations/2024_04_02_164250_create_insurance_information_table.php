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
        Schema::create('insurance_information', function (Blueprint $table) {
            $table->id();
            $table->string('provider_name')->nullable();
            $table->date('coverage_start_date')->nullable();
            $table->date('coverage_end_date')->nullable();
            $table->decimal('copayment_amount', 8, 2)->nullable();
            $table->decimal('deductible', 8, 2)->nullable();
            $table->text('claim_details')->nullable();
            $table->string('global_hash')->nullable();
            $table->string('hash_value')->nullable();
            $table->foreignId('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_information');
    }
};
