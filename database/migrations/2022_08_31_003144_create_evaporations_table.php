<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaporationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaporations', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id");
            $table->foreignId("point_id");
            $table->date("date");
            $table->string("time_observation");
            $table->string("day_rainfall");
            $table->string("initial_water_elevation");
            $table->string("final_water_elevation");
            $table->string("evaporation");

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
        Schema::dropIfExists('evaporations');
    }
}
