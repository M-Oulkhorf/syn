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
            $table->date('date_sortie')->nullable()->after('dpt_actuel_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('entrepreneurs', function (Blueprint $table) {
                $table->dropColumn('date_sortie');
        });
    }
};
