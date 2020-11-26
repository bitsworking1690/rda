<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDivisionDistrictTehsilToPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('places', function (Blueprint $table) {
            $table->string('place_name_filter');
            $table->integer('province_id');
            $table->integer('division_id');
            $table->integer('district_id');
            $table->integer('tehsil_id');
            $table->integer('uc_id');
            $table->integer('village_id');
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
            $table->dropColumn('place_name_filter');
            $table->dropColumn('province_id');
            $table->dropColumn('division_id');
            $table->dropColumn('district_id');
            $table->dropColumn('tehsil_id');
            $table->dropColumn('uc_id');
            $table->dropColumn('village_id');
        });
    }
}
