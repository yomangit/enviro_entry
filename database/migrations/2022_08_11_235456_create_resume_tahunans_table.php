<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumeTahunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume_tahunans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('locationResume');
            $table->date('date');
            $table->string('l1');
            $table->string('l2');
            $table->string('l3');
            $table->string('l4');
            $table->string('l5');
            $table->string('l6');
            $table->string('l7');
            $table->string('ls');
            $table->string('lm');
            $table->string('lsm');
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
        Schema::dropIfExists('resume_tahunans');
    }
}
