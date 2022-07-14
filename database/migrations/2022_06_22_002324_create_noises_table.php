<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->date('date');
            $table->foreignId('codesample_id');
            $table->foreignId('location_id');
            $table->double('A1',);$table->double('A2');$table->double('A3'); $table->double('A4'); $table->double('A5'); $table->double('A6'); $table->double('A7'); $table->double('A8'); $table->double('A9'); $table->double('A10'); $table->double('A11');$table->double('A12');
            $table->double('B1'); $table->double('B2'); $table->double('B3'); $table->double('B4'); $table->double('B5'); $table->double('B6'); $table->double('B7'); $table->double('B8'); $table->double('B9'); $table->double('B10'); $table->double('B11'); $table->double('B12');
            $table->double('C1'); $table->double('C2'); $table->double('C3'); $table->double('C4'); $table->double('C5'); $table->double('C6'); $table->double('C7'); $table->double('C8'); $table->double('C9'); $table->double('C10'); $table->double('C11'); $table->double('C12');
            $table->double('D1'); $table->double('D2'); $table->double('D3'); $table->double('D4'); $table->double('D5'); $table->double('D6'); $table->double('D7'); $table->double('D8'); $table->double('D9'); $table->double('D10'); $table->double('D11'); $table->double('D12');
            $table->double('E1'); $table->double('E2'); $table->double('E3'); $table->double('E4'); $table->double('E5'); $table->double('E6'); $table->double('E7'); $table->double('E8'); $table->double('E9'); $table->double('E10'); $table->double('E11'); $table->double('E12');
            $table->double('F1'); $table->double('F2'); $table->double('F3'); $table->double('F4'); $table->double('F5'); $table->double('F6'); $table->double('F7'); $table->double('F8'); $table->double('F9'); $table->double('F10'); $table->double('F11'); $table->double('F12');
            $table->double('G1'); $table->double('G2'); $table->double('G3'); $table->double('G4'); $table->double('G5'); $table->double('G6'); $table->double('G7'); $table->double('G8'); $table->double('G9'); $table->double('G10'); $table->double('G11'); $table->double('G12');
            $table->double('H1'); $table->double('H2'); $table->double('H3'); $table->double('H4'); $table->double('H5'); $table->double('H6'); $table->double('H7'); $table->double('H8'); $table->double('H9'); $table->double('H10'); $table->double('H11'); $table->double('H12');
            $table->double('I1'); $table->double('I2'); $table->double('I3'); $table->double('I4'); $table->double('I5'); $table->double('I6'); $table->double('I7'); $table->double('I8'); $table->double('I9'); $table->double('I10'); $table->double('I11'); $table->double('I12');
            $table->double('J1'); $table->double('J2'); $table->double('J3'); $table->double('J4'); $table->double('J5'); $table->double('J6'); $table->double('J7'); $table->double('J8'); $table->double('J9'); $table->double('J10'); $table->double('J11'); $table->double('J12');
            
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
        Schema::dropIfExists('noises');
    }
}
