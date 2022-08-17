<?php

namespace App\Exports;

use App\Models\Hydrometric;
use Maatwebsite\Excel\Concerns\FromCollection;

class HydroExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Hydrometric::all();
    }
}
