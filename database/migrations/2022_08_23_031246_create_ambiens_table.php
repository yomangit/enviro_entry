<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmbiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambiens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('point_id');
            $table->date('date');
            $table->string('sulphur_dioxide_so2');
            $table->string('nitrogen_dioxide_no2');
            $table->string('carbon_monoxide');
            $table->string('ozone');
            $table->string('total_suspended_particulate_24_hours');
            $table->string('particulate_matter_10');
            $table->string('particulate_matter_2_5');
            $table->string('temperature_ambient');
            $table->string('humidity');
            $table->string('wind_speed');
            $table->string('wind_direction');
            $table->string('weather');
            $table->string('barometric_pressure');
            $table->string('lead_pb');
            $table->string('hydrocarbon');

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
        Schema::dropIfExists('ambiens');
    }
}
