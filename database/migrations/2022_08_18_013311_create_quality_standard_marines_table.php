<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualityStandardMarinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quality_standard_marines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nama');
            $table->string('clarity');
            $table->string('temperature_water');
            $table->string('garbage');
            $table->string('oil_ayer');
            $table->string('odour');
            $table->string('colour');
            $table->string('turbidity');
            $table->string('total_suspended_solids');
            $table->string('salinity_in_situ');
            $table->string('total_dissolved_solids');
            $table->string('conductivity_insitu');
            $table->string('ph');
            $table->string('sulphide');
            $table->string('ammonia_n_nh3');
            $table->string('nitrate_n_no3');
            $table->string('total_phosphate_p_po4');
            $table->string('cyanide_total');
            $table->string('total_coliform');
            $table->string('chromium_hexavalent_total_cr_vi');
            $table->string('arsenic_hydrid_dissolved_as');
            $table->string('boron_dissolved_b');
            $table->string('cadmium_dissolved_cd');
            $table->string('copper_dissolved_cu');
            $table->string('lead_dissolved_pb');
            $table->string('nickel_dissolved_ni');
            $table->string('zinc_dissolved_zn');
            $table->string('mercury_dissolved_hg');
            $table->string('biologycal_oxygen_demand');
            $table->string('dissolved_oxygen');
            $table->string('oil_grease');
            $table->string('surfactant');
            $table->string('total_phenol');
            $table->string('hydrocarbon');
            $table->string('tributyl_tin');
            $table->string('total_poly_chlor_biphenyl');
            $table->string('poly_aromatic_hydrocarbon');
            $table->string('total_pesticides_as_organo_chlorine_pesticides');
            $table->string('benzene_hexa_chloride');
            $table->string('endrin');
            $table->string('dichloro_diphenyl_trichloroethane');
            $table->string('total_petroleum_hydrocarbons');
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
        Schema::dropIfExists('quality_standard_marines');
    }
}
