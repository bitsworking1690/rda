<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_facilities', function (Blueprint $table) {
            $table->id();
            $table->string('hf_name');
            $table->string('hf_type',50);
            $table->string('hf_province');
            $table->string('hf_division');
            $table->string('hf_district');
            $table->string('hf_tehsil');
            $table->integer('hf_province_id');
            $table->integer('hf_division_id');
            $table->integer('hf_district_id');
            $table->integer('hf_tehsil_id');
            $table->integer('hf_status');
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
        Schema::dropIfExists('health_facilities');
    }
}
