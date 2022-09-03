<?php

namespace App\Exports;

use App\Models\QualityStandardMarine;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportQualityStandardMarine implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return QualityStandardMarine::all();
    }
}
