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
        Schema::table('Droit_admin', function (Blueprint $table) {
            // Change the column type
            $table->string('niveau_droit_admin')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Droit_admin', function (Blueprint $table) {
            // Revert the column type back to integer
            $table->integer('niveau_droit_admin')->change();
        });
    }
};
