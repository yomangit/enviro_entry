<?php

namespace App\Exports;

use App\Models\GroundWaterMonth;
use Maatwebsite\Excel\Concerns\FromCollection;

class exportMonthlyGW implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return GroundWaterMonth::all();
    }
}
