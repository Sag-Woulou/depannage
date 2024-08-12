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
        Schema::table('utilisateur_roles', function (Blueprint $table) {
            // Ajouter la colonne zone_id avec une clé étrangère
            $table->foreignId('zone_id')->nullable()->constrained('zones')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('utilisateur_roles', function (Blueprint $table) {
            // Supprimer la clé étrangère et la colonne
            $table->dropForeign(['zone_id']);
            $table->dropColumn('zone_id');
        });
    }
};
