<?php

namespace App\Exports;

use App\Models\QualityStdDrinkWater;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportQualityStdDrinkWater implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return QualityStdDrinkWater::all();
    }
}
