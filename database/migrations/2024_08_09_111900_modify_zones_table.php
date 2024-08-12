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
        Schema::table('zones', function (Blueprint $table) {
            // Supprimer les colonnes centre_id et exploitation_id
            $table->dropForeign(['centre_id']);
            $table->dropColumn('centre_id');

            $table->dropForeign(['exploitation_id']);
            $table->dropColumn('exploitation_id');

            // Ajouter la nouvelle colonne centre_exploitation_id
            $table->unsignedBigInteger('centre_exploitation_id')->nullable()->after('name');

            // Définir la clé étrangère pour la nouvelle colonne
            $table->foreign('centre_exploitation_id')->references('id')->on('centreDistributionSansRef');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('zones', function (Blueprint $table) {
            // Ajouter les colonnes centre_id et exploitation_id
            $table->unsignedBigInteger('centre_id')->nullable()->after('name');
            $table->unsignedBigInteger('exploitation_id')->nullable()->after('centre_id');

            // Définir les clés étrangères pour les colonnes originales
            $table->foreign('centre_id')->references('id')->on('centres'); // Assurez-vous que cette table existe
            $table->foreign('exploitation_id')->references('id')->on('exploitations'); // Assurez-vous que cette table existe

            // Supprimer la colonne centre_exploitation_id
            $table->dropForeign(['centre_exploitation_id']);
            $table->dropColumn('centre_exploitation_id');
        });
    }
};
