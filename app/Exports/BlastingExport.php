<?php

namespace App\Exports;

use App\Models\Blasting;
use Maatwebsite\Excel\Concerns\FromCollection;

class BlastingExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Blasting::all();
    }
}
