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
        Schema::table('activites', function (Blueprint $table) {
            $table->string('nom_commercial')->nullable()->after('nom_activite');
            $table->string('mot_cle_activite')->nullable()->after('nom_commercial');
            $table->boolean('necessite_stock')->nullable()->after('salaire_activite');
            $table->date('date_dernier_etat_stock')->nullable()->after('necessite_stock');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activites', function (Blueprint $table) {
            $table->dropColumn('nom_commercial');
            $table->dropColumn('mot_cle_activite');
            $table->dropColumn('necessite_stock');
            $table->dropColumn('date_dernier_etat_stock');
        });
    }
};
