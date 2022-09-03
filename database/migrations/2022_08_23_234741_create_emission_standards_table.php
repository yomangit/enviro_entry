<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmissionStandardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emission_standards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string("nama");
            $table->string("equipment");
            $table->string("fuel_type");
            $table->string("capacity");
            $table->string("ambient_temperature");
            $table->string("stack_temperature");
            $table->string("meter_temperature");
            $table->string("moisture_content");
            $table->string("actual_volume_sample");
            $table->string("standard_volume_sample");
            $table->string("actual_oxygen_o2");
            $table->string("velocity_linear");
            $table->string("dry_molecular_weight");
            $table->string("actual_stack_flowrate");
            $table->string("percent_of_isokinetic");
            $table->string("ammonia_nh3");
            $table->string("chlorine_cl2");
            $table->string("hydrogen_chloride_hcl");
            $table->string("hydrogen_fluoride_hf");
            $table->string("nitrogen_oxide_nox_as_nitrogen_dioxide_no2");
            $table->string("opacity");
            $table->string("total_particulate_isokinetic");
            $table->string("sulfur_dioxide_so2");
            $table->string("hydrogen_sulphide_h2s");
            $table->string("mercury_hg");
            $table->string("arsenic_as");
            $table->string("antimony_sb");
            $table->string("cadmium_cd");
            $table->string("zinc_zn");
            $table->string("lead_pb");

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
        Schema::dropIfExists('emission_standards');
    }
}
