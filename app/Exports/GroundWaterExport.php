<?php

namespace App\Exports;

use App\Models\Mastergw;
use Maatwebsite\Excel\Concerns\FromCollection;

class GroundWaterExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mastergw::all();
    }
}
