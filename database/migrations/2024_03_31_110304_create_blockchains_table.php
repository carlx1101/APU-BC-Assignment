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
        Schema::create('blockchains', function (Blueprint $table) {
            $table->id();
            $table->date('timestamp');
            $table->string('hospital_id');
            $table->string('patient_id');
            $table->string('record_type');
            $table->text('data');
            $table->text('encrypted_symmetric_key');
            $table->text('digital_signature');
            $table->string('previous_block_hash');
            $table->string('merkle_root');
            $table->string('block_hash')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blockchains');
    }
};
