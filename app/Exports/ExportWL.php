<?php

namespace App\Exports;

use App\Models\QualityStandard;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportWL implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return QualityStandard::all();
    }
}
