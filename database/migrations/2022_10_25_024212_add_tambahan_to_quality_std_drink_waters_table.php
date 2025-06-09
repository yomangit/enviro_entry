<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTambahanToQualityStdDrinkWatersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quality_std_drink_waters', function (Blueprint $table) {
            $table->string('permanganate_number_as_kmno4');
            $table->string('surfactant');
            $table->string('benzene');
            $table->string('total_pesticides_as_organo_chlorine_pesticides');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quality_std_drink_waters', function (Blueprint $table) {
            $table->string('permanganate_number_as_kmno4');
            $table->string('surfactant');
            $table->string('benzene');
            $table->string('total_pesticides_as_organo_chlorine_pesticides');
        });
    }
}
