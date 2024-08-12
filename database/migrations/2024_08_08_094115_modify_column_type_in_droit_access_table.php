<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('Droit_access', function (Blueprint $table) {
            // Change the column type
            $table->string('niveau_droit_access')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Droit_access', function (Blueprint $table) {
            // Revert the column type back to integer
            $table->integer('niveau_droit_access')->change();
        });
    }
};
