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
        Schema::table('Utilisateurs', function (Blueprint $table) {
            // Ajouter la colonne droit_access_id
            $table->foreignId('droit_access_id')->nullable()->constrained('Droit_access')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Utilisateurs', function (Blueprint $table) {
            // Supprimer la colonne droit_access_id
            $table->dropForeign(['droit_access_id']);
            $table->dropColumn('droit_access_id');
        });
    }
};
