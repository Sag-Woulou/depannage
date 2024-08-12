<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTable extends Migration
{
    public function up()
    {
        Schema::create('service', function (Blueprint $table) {
            $table->id(); // Crée une colonne 'id' auto-incrémentée
            $table->string('serviceName');
            $table->timestamps(); // Ajoute les colonnes created_at et updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('service');
    }
}
