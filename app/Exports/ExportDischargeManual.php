<?php

namespace App\Exports;

use App\Models\DischargeManual;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDischargeManual implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DischargeManual::all();
    }
}
