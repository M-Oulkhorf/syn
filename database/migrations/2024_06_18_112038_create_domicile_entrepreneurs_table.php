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
        Schema::create('domicile_entrepreneurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Entrepreneur_id')->constrained()->onDelete('cascade');
            $table->string('rue_domicile_entrepreneur');
            $table->string('num_rue_domicile_entrepreneur');
            $table->string('ville_domicile_entrepreneur');
            $table->string('cp_domicile_entrepreneur');
            $table->foreignId('dpt_id')->constrained()->onDelete('cascade');
            $table->foreignId('region_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domicile_entrepreneurs');
    }
};
