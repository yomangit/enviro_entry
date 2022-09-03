<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWastewaterstandardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wastewaterstandards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nama');
            $table->string('conductivity');
            $table->string('tds');
            $table->string('tss');
            $table->string('turbidity');
            $table->string('hardness');
            $table->string('alkalinity_as_caco3');
            $table->string('alkalinity_carbonate');
            $table->string('alkalinity_bicarbonate');
            $table->string('temperature');
            $table->string('salinity');
            $table->string('do');
            $table->string('ph');
            $table->string('alkalinity_total');
            $table->string('cl');
            $table->string('fluoride');
            $table->string('sulphate');
            $table->string('sulphite');
            $table->string('free_chlorine');
            $table->string('fcn');
            $table->string('total_cyanide');
            $table->string('wad_cyanide');
            $table->string('ammonia');
            $table->string('nitrate');
            $table->string('nitrite');
            $table->string('phosphate');
            $table->string('total_phosphate');
            $table->string('aluminium');
            $table->string('antimony');
            $table->string('arsenic');
            $table->string('barium');
            $table->string('cadmium');
            $table->string('calcium');
            $table->string('chromium');
            $table->string('chromium_hexavalent');
            $table->string('cobalt');
            $table->string('copper');
            $table->string('iron');
            $table->string('lead');
            $table->string('magnesium');
            $table->string('manganese');
            $table->string('mercury');
            $table->string('nickel');
            $table->string('selenium');
            $table->string('silver');
            $table->string('sodium');
            $table->string('tin');
            $table->text('zinc');
            $table->text('aluminium_t_ai');
            $table->text('arsenic_t_as');
            $table->text('cadmium_t_cd');
            $table->text('chromium_t');
            $table->text('chromium_hexavalent_t');
            $table->text('cobalt_t');
            $table->text('cooper');
            $table->text('lead_t');
            $table->text('selenium_t');
            $table->text('mercury_t');
            $table->text('nickel_t');
            $table->text('zinc_t');
            $table->text('bod');
            $table->text('cod');
            $table->text('oil_and_grease');
            $table->text('phenols');
            $table->text('surfactant');
            $table->text('total_pcb');
            $table->text('a_o_x');
            $table->text('pcdfs');
            $table->text('pcdds');
            $table->text('fecal_coliform');
            $table->text('e_coli');
            $table->text('total_coliform_bacteria');
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
        Schema::dropIfExists('wastewaterstandards');
    }
}
