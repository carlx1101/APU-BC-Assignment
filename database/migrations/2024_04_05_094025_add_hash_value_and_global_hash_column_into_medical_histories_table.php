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
        Schema::table('medical_histories', function (Blueprint $table) {
            $table->string('global_hash')->after('family_medical_history')->nullable();
            $table->string('hash_value')->after('global_hash')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medical_histories', function (Blueprint $table) {
            //
        });
    }
};
