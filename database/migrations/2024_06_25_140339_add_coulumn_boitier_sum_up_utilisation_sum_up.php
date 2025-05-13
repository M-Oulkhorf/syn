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
        Schema::table('utilisation_sum_ups', function (Blueprint $table) {
            $table->unsignedBigInteger('boitier_sum_up_id')->nullable();
            $table->foreign('boitier_sum_up_id')->references('id')->on('boitier_sum_ups')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('utilisation_sum_ups', function (Blueprint $table) {
            $table->dropColumn('boitier_sum_up_id');
        });
    }
};
