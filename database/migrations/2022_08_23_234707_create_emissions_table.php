<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('point_id');
            $table->date('date');
            $table->string('engine');
            $table->string('fuel_type');
            $table->string('capacity');
            $table->string('ambient_temperature');
            $table->string('stack_temperature');
            $table->string('meter_temperature');
            $table->string('moisture_content');
            $table->string('actual_volume_sample');
            $table->string('standard_volume_sample');
            $table->string('actual_oxygen_o2');
            $table->string('velocity_linear');
            $table->string('dry_molecular_weight');
            $table->string('actual_stack_flowrate');
            $table->string('percent_of_isokinetic');
            $table->string('total_particulate_isokinetic_actual');
            $table->string('sulfur_dioxide_so2_actual');
            $table->string('nitrogen_oxide_nox_as_nitrogen_dioxide_no2_actual');
            $table->string('nitrogen_oxide_nox_actual');
            $table->string('carbon_monoxide_co_actual');
            $table->string('carbon_dioxide_co');
            $table->string('opacity');
            $table->string('total_particulate_isokinetic');
            $table->string('sulfur_dioxide_so2');
            $table->string('nitrogen_oxide_nox_as_nitrogen_dioxide_no2');
            $table->string('nitrogen_oxide_nox');
            $table->string('carbon_monoxide_co');
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
        Schema::dropIfExists('emissions');
    }
}
