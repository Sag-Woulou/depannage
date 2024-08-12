<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdToCentreDistributionSansRef extends Migration
{
    public function up()
    {
        Schema::table('centreDistributionSansRef', function (Blueprint $table) {
            $table->bigInteger('id')->nullable()->after('distLibelle');
        });

        // Remplir les valeurs ID pour les données existantes
        \DB::statement('
            ;WITH CTE AS (
                SELECT *, ROW_NUMBER() OVER (ORDER BY (SELECT NULL)) AS rownum
                FROM centreDistributionSansRef
            )
            UPDATE CTE
            SET id = rownum
        ');

        // Changer la colonne id en clé primaire
        Schema::table('centreDistributionSansRef', function (Blueprint $table) {
            $table->bigInteger('id')->primary()->change();
        });
    }

    public function down()
    {
        Schema::table('centreDistributionSansRef', function (Blueprint $table) {
            $table->dropPrimary('id');
            $table->dropColumn('id');
        });
    }
}
