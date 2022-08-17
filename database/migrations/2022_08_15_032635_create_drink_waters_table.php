<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrinkWatersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drink_waters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('point_id');
            $table->foreignId('user_id');
            $table->date('date');
            $table->string('conductivity');
            $table->string('tds');
            $table->string('tss');
            $table->string('turbidity');
            $table->string('hardness');
            $table->string('color');
            $table->string('odor');
            $table->string('taste');
            $table->string('ph');
            $table->string('chloride');
            $table->string('fluoride');
            $table->string('residual_chlorine');
            $table->string('sulphate');
            $table->string('sulphite');
            $table->string('free_cyanide');
            $table->string('total_cyanide');
            $table->string('wad_cyanide');
            $table->string('ammonia_nh4');
            $table->string('ammonia_nnh3');
            $table->string('nitrate_no3');
            $table->string('nitrate_no2');
            $table->string('phosphate_po4');
            $table->string('aluminium_al');
            $table->string('arsenic_as');
            $table->string('barium_ba');
            $table->string('cadmium_cd');
            $table->string('chromium_cr');
            $table->string('chromium_hexavalent');
            $table->string('cobalt_co');
            $table->string('copper_cu');
            $table->string('iron_fe');
            $table->string('lead_pb');
            $table->string('manganese_mn');
            $table->string('mercury_hg');
            $table->string('nickel_ni');
            $table->string('selenium_se');
            $table->string('silver_ag');
            $table->string('zinc_zn');
            $table->string('fecal_coliform');
            $table->string('c_coli');
            $table->string('total_coliform_bacteria');
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
        Schema::dropIfExists('drink_waters');
    }
}
