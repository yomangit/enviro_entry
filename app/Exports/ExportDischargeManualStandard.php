<?php

namespace App\Exports;

use App\Models\DischargeManualQualityStandard;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDischargeManualStandard implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DischargeManualQualityStandard::all();
    }
}
