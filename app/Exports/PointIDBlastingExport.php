<?php

namespace App\Exports;

use App\Models\PointIdBlasting;
use Maatwebsite\Excel\Concerns\FromCollection;

class PointIDBlastingExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PointIdBlasting::all();
    }
}
