<?php

namespace App\Exports;

use App\Models\GroundWaterStandard;
use Maatwebsite\Excel\Concerns\FromCollection;

class GwStandardExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return GroundWaterStandard::all();
    }
}
