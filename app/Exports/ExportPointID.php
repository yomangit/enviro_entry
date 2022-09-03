<?php

namespace App\Exports;

use App\Models\TailingCodeId;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportPointID implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TailingCodeId::all();
    }
}
