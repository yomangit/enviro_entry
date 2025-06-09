<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroundWaterMonthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ground_water_months', function (Blueprint $table) {
            $table->id();
            $table->foreignId("point_id");
            $table->foreignId("standard_id");
            $table->date("date");
            $table->text("conductivity");
            $table->text("total_dissolved_solids_tds");
            $table->text("total_suspended_solids_tss");
            $table->text("turbidity");
            $table->text("hardness");
            $table->text("alkalinity");
            $table->text("temperature");
            $table->text("salinity");
            $table->text("dissolved_oxygen_do");
            $table->text("colour");
            $table->text("odour");
            $table->text("taste");
            $table->text("ph");
            $table->text("chloride_cl");
            $table->text("fluoride_f");
            $table->text("residual_chlorine");
            $table->text("sulphate_so4");
            $table->text("sulphite_h2s");
            $table->text("free_cyanide_fcn");
            $table->text("total_cyanide_cn_tot");
            $table->text("wad_cyanide_cn_wad");
            $table->text("ammonium_nh4");
            $table->text("ammonia_n_nh3");
            $table->text("nitrate_no3");
            $table->text("nitrite_no2");
            $table->text("phosphate_po4");
            $table->text("aluminium_al");
            $table->text("antimony_sb");
            $table->text("arsenic_as");
            $table->text("barium_ba");
            $table->text("cadmium_cd");
            $table->text("chromium_cr");
            $table->text("chromium_hexavalent_cr6");
            $table->text("cobalt_co");
            $table->text("copper_cu");
            $table->text("iron_fe");
            $table->text("manganese_mn");
            $table->text("lead_pb");
            $table->text("mercury_hg");
            $table->text("nickel_ni");
            $table->text("selenium_se");
            $table->text("silver_ag");
            $table->text("zinc_zn");
            $table->text("aluminium_t_al");
            $table->text("arsenic_t_as");
            $table->text("cadmium_t_cd");
            $table->text("chromium_hexavalent_t_cr6");
            $table->text("chromium_t_cr");
            $table->text("cobalt_t_co");
            $table->text("copper_t_cu");
            $table->text("lead_t_pb");
            $table->text("selenium_t_se");
            $table->text("mercury_t_hg");
            $table->text("nickel_t_ni");
            $table->text("zinc_t_zn");
            $table->text("bod");
            $table->text("cod");
            $table->text("oil_and_grease");
            $table->text("phenols");
            $table->text("permanganate_number_as_kmno4");
            $table->text("surfactant_mbas");
            $table->text("benzene");
            $table->text("chloroform");
            $table->text("2_4_6_trichloropenol");
            $table->text("2_4_d");
            $table->text("pentachlorophenol");
            $table->text("total_pesticides");
            $table->text("chlordane_total_isomer");
            $table->text("dieldrin");
            $table->text("aldrin");
            $table->text("fecal_coliform");
            $table->text("e_coli");
            $table->text("total_coliform_bacteria");

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
        Schema::dropIfExists('ground_water_months');
    }
}
