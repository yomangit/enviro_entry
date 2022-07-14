<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('biota_id');
            $table->foreignId('location_id');
            $table->string('date');
            $table->double('taxa_richness');
            $table->double('species_density');
            $table->double('diversity_index');
            $table->double('evenness_value');
            $table->double('dominance_index');
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
        Schema::dropIfExists('marines');
    }
}
