<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTailingQualityStandardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tailing_quality_standards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nama');
            $table->string('antimony');
            $table->string('arsenic');
            $table->string('barium');
            $table->string('beryllium');
            $table->string('boron');
            $table->string('cadmium');
            $table->string('hexavalent');
            $table->string('chromium_cr');
            $table->string('copper');
            $table->string('iodide');
            $table->string('lead');
            $table->string('mercury');
            $table->string('molybdenum');
            $table->string('nickel');
            $table->string('selenium');
            $table->string('silver');
            $table->string('tributyl');
            $table->string('zinc_zn');
            $table->string('chloride_cl');
            $table->string('free_cyanide');
            $table->string('total_cyanide');
            $table->string('fluoride');
            $table->string('nitrite_no2');
            $table->string('nitrate');
            $table->string('aldrin');
            $table->string('dieldrin');
            $table->string('benzene');
            $table->string('benzo_a_pyrene');
            $table->string('tetrachloride');
            $table->string('chlordane');
            $table->string('chlorobenzene');
            $table->string('chlorophenol2');
            $table->string('chloroform');
            $table->string('o_cresol');
            $table->string('m_cresol');
            $table->string('p_cresol');
            $table->string('total_cresol');
            $table->string('ethylhexylphthalate');
            $table->string('d');
            $table->string('dichlorobenzene2');
            $table->string('dichlorobenzene4');
            $table->string('dichloroethane1');
            $table->string('dichloroethylene');
            $table->string('dichloroethene2');
            $table->string('dichloroethene3');
            $table->string('dichloromethane');
            $table->string('dichlorophenol');
            $table->string('dinitrotoluene');
            $table->string('ethyl_benzene');
            $table->string('thylenediaminetetraacetic');
            $table->string('formaldehyde');
            $table->string('hexachloro');
            $table->string('endrin');
            $table->string('heptachlor');
            $table->string('hexachlorobenzene');
            $table->string('hexachlorobutadiene');
            $table->string('hexachloroethane');
            $table->string('total_phenols');
            $table->string('lindane');
            $table->string('methoxychlor1');
            $table->string('ketone');
            $table->string('parathion1');
            $table->text('nitrobenzene');
            $table->text('styrene');
            $table->text('tetrachloroethane1');
            $table->text('tetrachloroethane2');
            $table->text('nitriloacetic');
            $table->text('pentachlorophenol');
            $table->text('pyridine');
            $table->text('toxaphene1');
            $table->text('parathion');
            $table->text('total_chlor');
            $table->text('tetrachloroethene');
            $table->text('toluene');
            $table->text('trichlorobenzene');
            $table->text('methoxychlor2');
            $table->text('trichloroethane1');
            $table->text('trichloroethene2');
            $table->text('toxaphene2');
            $table->text('trichloroethylene');
            $table->text('trihalomethanes');
            $table->text('trichlorophenol5');
            $table->text('trichlorophenol6');
            $table->text('tp_silvex');
            $table->text('vinyl_chloride');
            $table->text('xylenes_total');
            $table->text('ddt_ddd_dde');
            $table->text('dichlorophenoxyacetic');
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
        Schema::dropIfExists('tailing_quality_standards');
    }
}
