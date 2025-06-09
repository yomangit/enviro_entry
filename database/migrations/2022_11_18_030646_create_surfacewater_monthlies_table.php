<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurfacewaterMonthliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surfacewater_monthlies', function (Blueprint $table) {
            $table->id();
            $table->foreignId("codesample_id");
            $table->foreignId("standard_id");
            $table->date("date");
            $table->text("conductivity");
            $table->text("total_dissolved_solids_tds");
            $table->text("total_suspended_solids_tss");
            $table->text("turbidity");
            $table->text("hardness");
            $table->text("temperature");
            $table->text("colour");
            $table->text("salinity");
            $table->text("alkalinity_as_caco3");
            $table->text("dissolved_oxygen_do");
            $table->text("alkalinity_total");
            $table->text("alkalinitycarbonate");
            $table->text("alkalinitybicarbonate");
            $table->text("ph");
            $table->text("chloride_cl");
            $table->text("free_chlorine");
            $table->text("fluoride_f");
            $table->text("sulphate_so4");
            $table->text("sulphite_h2s");
            $table->text("free_cyanide_fcn");
            $table->text("total_cyanide_cn_tot");
            $table->text("wad_cyanide_cn_wad");
            $table->text("ammonium_nh4");
            $table->text("ammonia_nnh3");
            $table->text("nitrate_no3");
            $table->text("nitrite_no2");
            $table->text("phosphate_po4");
            $table->text("total_nitrogen");
            $table->text("aluminium_al");
            $table->text("antimony_sb");
            $table->text("arsenic_as");
            $table->text("barium_ba");
            $table->text("boron_b");
            $table->text("calcium_ca");
            $table->text("cadmium_cd");
            $table->text("chromium_cr");
            $table->text("chromium_hexavalent_cr6");
            $table->text("cobalt_co");
            $table->text("copper_cu");
            $table->text("iron_fe");
            $table->text("lead_pb");
            $table->text("magnesium_mg");
            $table->text("manganese_mn");
            $table->text("mercury_hg");
            $table->text("nickel_ni");
            $table->text("selenium_se");
            $table->text("silver_ag");
            $table->text("sodium_na");
            $table->text("zinc_zn");
            $table->text("aluminium_tal");
            $table->text("arsenic_tas");
            $table->text("cadmium_tcd");
            $table->text("chromium_hexavalent_tcr6");
            $table->text("chromium_tcr");
            $table->text("cobalt_tco");
            $table->text("copper_tcu");
            $table->text("iron_tfe");
            $table->text("lead_tpb");
            $table->text("selenium_tse");
            $table->text("mercury_thg");
            $table->text("nickel_tni");
            $table->text("zinc_tzn");
            $table->text("bod");
            $table->text("cod");
            $table->text("oil_and_grease");
            $table->text("phenols");
            $table->text("surfactant_mbas");
            $table->text("benzene_hexa_chloride_bhc");
            $table->text("endrin");
            $table->text("dichloro_diphenyl_trichloroethane_ddt");
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
        Schema::dropIfExists('surfacewater_monthlies');
    }
}
