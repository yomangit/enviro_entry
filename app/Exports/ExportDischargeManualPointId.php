<?php

namespace App\Exports;

use App\Models\DischargeManualPointid;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDischargeManualPointId implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DischargeManualPointid::all();
    }
}
