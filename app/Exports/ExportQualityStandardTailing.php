<?php

namespace App\Exports;

use App\Models\TailingQualityStandard;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportQualityStandardTailing implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TailingQualityStandard::all();
    }
}
