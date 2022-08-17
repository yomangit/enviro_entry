<?php

namespace App\Exports;

use App\Models\PointIdDrinkwater;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportPointIdDrink implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PointIdDrinkwater::all();
    }
}
