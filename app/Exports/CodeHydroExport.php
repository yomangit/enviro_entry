<?php

namespace App\Exports;

use App\Models\CodeHydrometric;
use Maatwebsite\Excel\Concerns\FromCollection;

class CodeHydroExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CodeHydrometric::all();
    }
}
