<?php

namespace App\Exports;

use App\Models\AmbienQualityStd;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportAmbienStandard implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AmbienQualityStd::all();
    }
}
