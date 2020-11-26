<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHfLocationToHfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('health_facilities', function (Blueprint $table) {
            $table->string('hf_location');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('health_facilities', function (Blueprint $table) {
           $table->dropColumn('hf_location');
        });
    }
}
