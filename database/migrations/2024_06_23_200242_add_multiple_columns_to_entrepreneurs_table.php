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
        Schema::table('entrepreneurs', function (Blueprint $table) {
            $table->unsignedBigInteger('dpt_entree_id')->nullable()->after('cadeau_id');
            $table->foreign('dpt_entree_id')->references('id')->on('dpts')->onDelete('set null');
            $table->unsignedBigInteger('dpt_actuel_id')->nullable()->after('dpt_entree_id');
            $table->foreign('dpt_actuel_id')->references('id')->on('dpts')->onDelete('set null');
            $table->unsignedBigInteger('Accompagnant_id')->nullable()->after('mail_entrepreneur');
            $table->foreign('Accompagnant_id')->references('id')->on('accompagnants')->onDelete('set null');
            $table->date('date_fin_accompagnement')->nullable()->after('Accompagnant_id');
            $table->string('matricule_silae')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('entrepreneurs', function (Blueprint $table) {
            $table->dropColumn([
                'dpt_entree_id',
                'dpt_actuel_id',
                'Accompagnant_id',
                'date_fin_accompagnement',
                'matricule_silae',
            ]);
        });
    }
};
