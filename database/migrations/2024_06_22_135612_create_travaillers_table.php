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
        Schema::create('travaillers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Entrepreneur_id')->constrained()->onDelete('cascade');
            $table->foreignId('Entite_id')->constrained()->onDelete('cascade');
            $table->foreignId('Contrat_id')->constrained()->onDelete('cascade');
            $table->foreignId('Activite_id')->constrained()->onDelete('cascade');
            $table->foreignId('visite_medicale_id')->constrained()->onDelete('cascade');
            $table->foreignId('dpt_id')->constrained()->onDelete('cascade');
            $table->foreignId('region_id')->constrained()->onDelete('cascade');
            $table->date('date_access_societariat');
            $table->boolean('adhesion_en_cours');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travaillers');
    }
};
