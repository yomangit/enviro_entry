<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDischargeManualQualitystandardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discharge_manual_qualitystandards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('tss');
            $table->string('ph_max');      
            $table->string('ph_min');    
            $table->string('do');         
            $table->string('redox');      
            $table->string('conductivity');
            $table->string('tds');        
            $table->string('temperatur'); 
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
        Schema::dropIfExists('discharge_manual_qualitystandards');
    }
}
