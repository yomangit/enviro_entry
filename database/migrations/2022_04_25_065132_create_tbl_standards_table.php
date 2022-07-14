<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblStandardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_standards', function (Blueprint $table) {
            $table->id         (              );
            $table->double    ('tss'         );
            $table->double      ('ph_max'      );
            $table->double      ('ph_min'      );
            $table->double      ('do'          );
            $table->char       ('redox'       );
            $table->char       ('conductivity');
            $table->double      ('tds'         );
            $table->char       ('temperatur'  );
            $table->timestamp('failed_at')->useCurrent();
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
        Schema::dropIfExists('tbl_standards');
    }
}
