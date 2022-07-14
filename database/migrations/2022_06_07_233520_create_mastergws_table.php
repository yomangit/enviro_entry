<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMastergwsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mastergws', function (Blueprint $table) {
            $table->id ( );
            $table->foreignId('user_id');
            $table->foreignId('gwcodesample_id');
            $table->date ('date' );
            $table->string ('start_time' );
            $table->string ('stop_time' );
            $table->string('well' );
            $table->string ('well_water' );
            $table->string ('h' );
            $table->string('d_pipe' );
            $table->string ('tt' );
            $table->string ('r' );
            $table->string ('water_volume' );
            $table->string ('temperatur' );
            $table->string ('ph' );
            $table->string ('conductivity' );
            $table->string ('tds' );
            $table->string ('redox' );
            $table->string ('do' );
            $table->string ('salinity' );
            $table->string ('turbidity' );
            $table->string ('water_color' );
            $table->string ('odor' );
            $table->string ('rain_before_sampling' );
            $table->string ('rain_during_sampling');
            $table->string ('oil_layer' );
            $table->string ('source_pollution' );
            $table->string ('sampler' );
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
        Schema::dropIfExists('mastergws');
    }
}
