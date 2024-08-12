<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZonesTable extends Migration
{
    public function up()
    {
        Schema::create('zones', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée
            $table->string('name');

            // Définir les clés étrangères
            $table->foreignId('centre_id')->nullable()->constrained('centreDistributionSansRef')->onDelete('set null');
            $table->foreignId('exploitation_id')->nullable()->constrained('ExploitationsDepannage')->onDelete('set null');
            $table->foreignId('service_id')->nullable()->constrained('service')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('zones');
    }
}
