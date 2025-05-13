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
        Schema::create('entrepreneurs', function (Blueprint $table) {
            $table->id();
            $table->string('code_analytique_entrepreneur');
            $table->string('nom_entrepreneur');
            $table->string('prenom_entrepreneur');
            $table->string('sexe_entrepreneur');
            $table->date('date_naissance_entrepreneur');
            $table->string('lieu_naissance_entrepreneur');
            $table->string('nationalite_entrepreneur');
            $table->string('numero_ss_entrepreneur');
            $table->string('telephone1_entrepreneur');
            $table->string('telephone2_entrepreneur');
            $table->string('mail_entrepreneur');
            $table->boolean('demandeur_emploi');
            $table->boolean('entrepreneur_actif');
            $table->foreignId('cadeau_id')->constrained()->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrepreneurs');
    }
};
