<?php

namespace App\Exports;

use App\Models\PointIdMarine;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportPointIdMarine implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PointIdMarine::all();
    }
}
