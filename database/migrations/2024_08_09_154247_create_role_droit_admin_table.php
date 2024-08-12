<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleDroitAdminTable extends Migration
{
    public function up()
    {
        Schema::create('role_droit_admin', function (Blueprint $table) {
            $table->id(); // Ajoute une colonne id comme clé primaire
            $table->unsignedBigInteger('role_id'); // Clé étrangère pour les rôles
            $table->unsignedBigInteger('droit_admin_id'); // Clé étrangère pour les droits admin
            $table->timestamps(); // Colonne pour les timestamps (created_at, updated_at)

            // Définir les clés étrangères
            $table->foreign('role_id')
                ->references('id')->on('roles')
                ->onDelete('cascade'); // Supprime les enregistrements liés si le rôle est supprimé

            $table->foreign('droit_admin_id')
                ->references('id')->on('droit_admin')
                ->onDelete('cascade'); // Supprime les enregistrements liés si le droit admin est supprimé

            // Définir une contrainte unique pour éviter les doublons
            $table->unique(['role_id', 'droit_admin_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('role_droit_admin');
    }
}
