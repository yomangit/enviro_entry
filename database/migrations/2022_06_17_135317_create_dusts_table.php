<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDustsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dusts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
			$table->foreignId('codedust_id');
            $table->date('date_in');
            $table->date('date_out');
            $table->string('m4',);
            $table->string('m3');
            $table->string('m6');
            $table->string('m5');
            $table->string('no_insect');
            $table->string('vb_dirt');
            $table->string('vb_algae');
            $table->string('area_observation');
            $table->string('observer');
            $table->string('volume_filtrat');
            $table->string('total_vlm_water');
            $table->string('remarks');
            $table->timestamps();
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dusts');
    }
}
