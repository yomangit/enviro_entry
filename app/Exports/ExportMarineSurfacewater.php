<?php

namespace App\Exports;

use App\Models\MarineSurfacewater;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportMarineSurfacewater implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MarineSurfacewater::all();
    }
}
