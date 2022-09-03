<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHydrometricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hydrometrics', function (Blueprint $table) {
            $table->id     (                      );
            $table->foreignId('standard_id');
            $table->foreignId('point_id');
            $table->foreignId('user_id');
            $table->date   ('date'                );
            $table->string   ('start_time'          );
            $table->string   ('stop_time'          );
            $table->string('tss'                 );
            $table->string  ('ph'                  );
            $table->string  ('do'                  );
            $table->string('orp'               );
            $table->string  ('conductivity'        );
            $table->string  ('tds'                 );
            $table->string  ('temperatur'          );
            $table->string  ('salinity'            );
            $table->string  ('turbidity'           );
            $table->string  ('tl_wall'           );
            $table->string  ('tl_tsf'           );
            $table->string   ('water_condition'     );
            $table->string   ('water_color'         );
            $table->string   ('odor'       );
            $table->string   ('rain'                );
            $table->string   ('rain_during_sampling');
            $table->string   ('oil_layer'           );
            $table->string   ('source_pollution'    );
            $table->string   ('sampler'    );
            $table->string   ('cyanide'    );
            $table->string   ('level'    );
            $table->string   ('lvl_lgr'    );
            $table->string   ('debit_s'    );
            $table->string   ('debit_d'    );
            $table->string ('remarks'           );
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
        Schema::dropIfExists('hydrometrics');
    }
}
