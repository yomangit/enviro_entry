<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodesamplegwsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codesamplegws', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nama')->unique();
            $table->string('lokasi');
            $table->double('total');
            $table->double('gl');
            $table->double('rl');
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
        Schema::dropIfExists('codesamplegws');
    }
}
