<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MestomTable3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_mestom_tables3s', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('point_id');
            $table->text("Antimony_Sb");
            $table->text("Arsenic_As");
            $table->text("Barium_Ba");
            $table->text("Beryllium_Be");
            $table->text("Boron_B");
            $table->text("Cadmium_Cd");
            $table->text("Chromium_Hexavalent_CrVI");
            $table->text("Copper_Cu");
            $table->text("Lead_Pb");
            $table->text("Mercury_Hg");
            $table->text("Molybdenum_Mo");
            $table->text("Nickel_Ni");
            $table->text("Selenium_Se");
            $table->text("Silver_Ag");
            $table->text("Tributyltin_oxide");
            $table->text("Zinc_Zn");
            $table->text("Chloride");
            $table->text("Cyanide_Total");
            $table->text("Fluoride");
            $table->text("Iodium");
            $table->text("Nitrate_NNO3");
            $table->text("Nitrite_NNO2");
            $table->text("Benzene");
            $table->text("Benzoapyrene");
            $table->text("C6_C9_Petroleum_Hydrocarbon");
            $table->text("C10_C36_Petroleum_Hydrocarbon");
            $table->text("Carbontetrachloride");
            $table->text("Chlorobenzene");
            $table->text("Chloroform");
            $table->text("2_Cholorophenol");
            $table->text("Total_Cresol");
            $table->text("Di2_etilhelsil_ftalat");
            $table->text("1_2_Dichlorobenzene");
            $table->text("1_4_Dichlorobenzene");
            $table->text("1_2_Dichloroethane");
            $table->text("1_1_Dichloroethene");
            $table->text("1_2_Dichloroethene");
            $table->text("Dichloro_Methane_Methylen_Chloride");
            $table->text("2_4_Dichlorophenol");
            $table->text("2_4_Dinitrotoulene");
            $table->text("Ethylbenzene");
            $table->text("Ethylenediaminetetraacetic_EDTA");
            $table->text("Formaldehyde");
            $table->text("Hexachlorobutadiene");
            $table->text("Methyl_Ethyl_Ketone");
            $table->text("Nitrobenzene");
            $table->text("Poly_Aromatic_Hydrocarbons_PAHs");
            $table->text("Phenol_Total,_non_halogenated");
            $table->text("Polychlorinated_Biphenyls_PCBs");
            $table->text("Styrene");
            $table->text("1_1_1_2_Tetrachloroethane");
            $table->text("1_1_2_2_Tetrachloroethane");
            $table->text("Tetrachloroethene");
            $table->text("Toluene");
            $table->text("Trichloroenzene");
            $table->text("1_1_1_Trichloroethane");
            $table->text("1_1_2_Trichloroethane");
            $table->text("Trichloroethene");
            $table->text("2_4_5_Trichlorophenol");
            $table->text("2_4_6_Trichlorophenol");
            $table->text("Vinyl_Chloride");
            $table->text("Xylene_Total");
            $table->text("Aldrin_Dieldrin");
            $table->text("DDT_DDD_DDE");
            $table->text("2_4_D_2_4_dichlorophenoxyacetic_acid");
            $table->text("Chlordane");
            $table->text("Heptachlor");
            $table->text("Lindane");
            $table->text("Methoxychlor");
            $table->text("Pentachlorophenol");
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
        Schema::dropIfExists('create_mestom_tables3s');
    }
}
