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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom_user');
            $table->string('prenom_user');
            $table->string('login_user');
            $table->string('adresse_mail_user');
            $table->boolean('valider_ad_user');
            $table->string('modif_en_cours_user')->nullable();
            $table->string('ancien_nom_user')->nullable();
            $table->string('ancien_prenom_user')->nullable();
            $table->string('ancien_login_user')->nullable();
            $table->string('ancien_mail_user')->nullable();
            $table->boolean('activer_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
