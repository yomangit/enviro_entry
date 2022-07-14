<?php

use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablestandardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tablestandards', function (Blueprint $table) {
            $table->id();
            $table->string('parameter');
            $table->string('unit');
            $table->string('pp');
            $table->string('permenkes');
            $table->string('ifc_standard');
            $table->string('kmlh');
            $table->string('bkmm_ri');
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
        Schema::dropIfExists('tablestandards');
    }
}
