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
            $table->text("conductivity");
            $table->text("totaldissolvedsolids_tds");
            $table->text("totalsuspendedsolids_tss");
            $table->text("turbidity");
            $table->text("hardness");
            $table->text("alkalinity_ascaco3");
            $table->text("alkalinitycarbonate");
            $table->text("alkalinitybicarbonate");
            $table->text("temperature");
            $table->text("salinity");
            $table->text("dissolvedoxygen_do");
            $table->text("ph_min");
            $table->text("ph_max");
            $table->text("alkalinitytotal");
            $table->text("chloride_cl");
            $table->text("fluoride_f");
            $table->text("sulphate_so4");
            $table->text("sulphite_h2s");
            $table->text("freechlorine_cl2");
            $table->text("freecyanide_fcn");
            $table->text("totalcyanide_cntot");
            $table->text("wadcyanide_cnwad");
            $table->text("ammonia_nh4");
            $table->text("ammonium_n_nh3");
            $table->text("nitrate_no3");
            $table->text("nitrite_no2");
            $table->text("phosphate_po4");
            $table->text("totalphosphate_ppo4");
            $table->text("aluminium_al");
            $table->text("antimony_sb");
            $table->text("arsenic_as");
            $table->text("barium_ba");
            $table->text("cadmium_cd");
            $table->text("calcium_ca");
            $table->text("chromium_cr");
            $table->text("chromiumhexavalent_cr6");
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
            $table->text("tin_sn");
            $table->text("zinc_zn");
            $table->text("aluminium_tal");
            $table->text("arsenic_tas");
            $table->text("cadmium_tcd");
            $table->text("chromiumhexavalent_tcr6");
            $table->text("chromium_tcr");
            $table->text("cobalt_tco");
            $table->text("copper_tco");
            $table->text("lead_tpb");
            $table->text("selenium_tse");
            $table->text("mercury_thg");
            $table->text("nickel_tni");
            $table->text("zinc_tzn");
            $table->text("bod");
            $table->text("cod");
            $table->text("oilandgrease");
            $table->text("totalphenols");
            $table->text("surfactant_mbas");
            $table->text("totalpcb");
            $table->text("aox");
            $table->text("pcdfs");
            $table->text("pcdds");
            $table->text("fecalcoliform");
            $table->text("ecoli");
            $table->text("totalcoliformbacteria");



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
