<?php

namespace App\Exports;

use App\Models\AmbienPointId;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportAmbienPointId implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AmbienPointId::all();
    }
}
