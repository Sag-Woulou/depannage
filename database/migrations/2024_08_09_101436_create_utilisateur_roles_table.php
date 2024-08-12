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
        Schema::create('utilisateur_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utilisateur_id')
                ->constrained('Utilisateurs')
                ->onDelete('cascade');
            $table->foreignId('droit_access_id')
                ->constrained('Droit_access')
                ->onDelete('cascade');
            $table->foreignId('role_id')
                ->constrained('Roles')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateur_roles');
    }
};
