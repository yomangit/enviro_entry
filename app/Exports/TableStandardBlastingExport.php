<?php

namespace App\Exports;

use App\Models\StandardBlasting;
use Maatwebsite\Excel\Concerns\FromCollection;

class TableStandardBlastingExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return StandardBlasting::all();
    }
}
