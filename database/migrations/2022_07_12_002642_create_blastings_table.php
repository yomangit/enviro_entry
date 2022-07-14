<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlastingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blastings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('point_id');
            $table->foreignId('standard_id');
            $table->date('date');
            $table->string('time');
            $table->string('transversal_freq');
            $table->string('vertical_freq');
            $table->string('longitudinal_freq');
            $table->string('transversal_ppv');
            $table->string('vertical_ppv');
            $table->string('longitudinal_ppv');
            $table->string('peak_vektor');
            $table->string('noise_level');
            $table->string('blast_location');
            $table->string('weather');
            $table->string('sampler');
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
        Schema::dropIfExists('blastings');
    }
}
