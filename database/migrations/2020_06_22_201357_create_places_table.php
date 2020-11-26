<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
            $table->string('place_name');
            $table->string('place_short_name');
            $table->string('place_code');
            $table->string('place_lat_long');
            $table->string('place_alt_spellings');
            $table->enum('place_type' , ['province','division','district','tehsil','union_council','village']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
