<?php

namespace App\Exports;

use App\Models\Biota;
use Maatwebsite\Excel\Concerns\FromCollection;

class BiotaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Biota::all();
    }
}
