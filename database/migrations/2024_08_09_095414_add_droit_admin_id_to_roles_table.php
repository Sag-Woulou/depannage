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
        Schema::table('Roles', function (Blueprint $table) {
            // Ajout de la colonne droit_admin_id avec une clé étrangère vers Droit_admin
            $table->unsignedBigInteger('droit_admin_id')->nullable()->after('nom_role');

            // Définir la clé étrangère qui fait référence à l'ID dans la table Droit_admin
            $table->foreign('droit_admin_id')->references('id')->on('Droit_admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Roles', function (Blueprint $table) {
            // Suppression de la clé étrangère et de la colonne droit_admin_id
            $table->dropForeign(['droit_admin_id']);
            $table->dropColumn('droit_admin_id');
        });
    }
};
