<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreshWatersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fresh_waters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('biota_id');
            $table->foreignId('location_id');
            $table->date('date');
            $table->string('taxa_richness');
            $table->string('species_density');
            $table->string('diversity_index');
            $table->string('evenness_value');
            $table->string('dominance_index');
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
        Schema::dropIfExists('fresh_waters');
    }
}
