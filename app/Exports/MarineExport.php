<?php

namespace App\Exports;

use App\Models\Marine;
use Maatwebsite\Excel\Concerns\FromCollection;

class MarineExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Marine::all();
    }
}
