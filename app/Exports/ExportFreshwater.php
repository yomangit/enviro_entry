<?php

namespace App\Exports;

use App\Models\FreshWater;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportFreshwater implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FreshWater::all();
    }
}
