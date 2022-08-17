<?php

namespace App\Exports;

use App\Models\DrinkWater;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDrinkWater implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DrinkWater::all();
    }
}
