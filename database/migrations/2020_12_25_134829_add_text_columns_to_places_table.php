<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTextColumnsToPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('places', function (Blueprint $table) {
            $table->string('province_name');
            $table->string('division_name');
            $table->string('district_name');
            $table->string('tehsil_name');
            $table->string('uc_name');
            $table->string('village_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('places', function (Blueprint $table) {
            $table->dropColumn('province_name');
            $table->dropColumn('division_name');
            $table->dropColumn('district_name');
            $table->dropColumn('tehsil_name');
            $table->dropColumn('uc_name');
            $table->dropColumn('village_name');
        });
    }
}
