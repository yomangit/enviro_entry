<?php

namespace App\Exports;

use App\Models\LocationBiota;
use Maatwebsite\Excel\Concerns\FromCollection;

class LocationBiotaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LocationBiota::all();
    }
}
