<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoilqualitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soilqualities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('point_id');
            $table->date('date');
            $table->string('ph');
            $table->string('ph_h2o');
            $table->string('total_organic_carbon');
            $table->string('total_nitrogen');
            $table->string('cn');
            $table->string('calsium');
            $table->string('magnesium');
            $table->string('pottasium');
            $table->string('sodium');
            $table->string('jumlah');
            $table->string('p2o5_hcl_25');
            $table->string('k2o_hcl_25');
            $table->string('p2o5_olsen');
            $table->string('kapasitas_tukar_kation');
            $table->string('kb_kejenuhan_basa');
            $table->string('al_tukar');
            $table->string('h_tukar');
            $table->string('pasir');
            $table->string('debu');
            $table->string('lempung');
            $table->string('moisture_content');
            $table->string('bulk_density');
            $table->string('ruang_pori_total');
            $table->string('pd');
            $table->string('sangat_cepat');
            $table->string('cepat');
            $table->string('lambat');
            $table->string('air_tersedia');
            $table->string('permeabilitas');
            $table->string('pf_1');
            $table->string('pf_2');
            $table->string('pf_2_54');
            $table->string('pf_4_2');
            $table->string('laboratorium');
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
        Schema::dropIfExists('soilqualities');
    }
}
