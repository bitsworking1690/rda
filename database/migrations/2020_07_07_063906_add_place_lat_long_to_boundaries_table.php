<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlaceLatLongToBoundariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('boundaries', function (Blueprint $table) {
             $table->string('place_lat_long');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('boundaries', function (Blueprint $table) {
           $table->dropColumn('place_lat_long');
        });
    }
}
