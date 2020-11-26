<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoundariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boundaries', function (Blueprint $table) {
            $table->id();
            $table->longtext('geometry_points');
            $table->multiPolygon('geometry_points_multi_polygon');
            $table->polygon('geometry_points_polygon');
            $table->string('geometry_name');
            $table->string('geometry_center');
            $table->enum('geometry_type' , ['province','division','district','tehsil','uc']);
            $table->string('geometry_province');
            $table->string('geometry_division');
            $table->string('geometry_district');
            $table->string('geometry_tehsil');
            $table->string('geometry_uc');
            $table->integer('geometry_province_id');
            $table->integer('geometry_division_id');
            $table->integer('geometry_district_id');
            $table->integer('geometry_tehsil_id');
            $table->integer('geometry_uc_id');
            $table->string('geometry_status');
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
        Schema::dropIfExists('boundaries');
    }
}
