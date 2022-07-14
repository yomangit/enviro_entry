<?php

namespace App\Exports;

use App\Models\Noise;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDataNoise implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Noise::all();
    }
}
