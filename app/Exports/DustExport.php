<?php

namespace App\Exports;

use App\Models\Dust;
use Maatwebsite\Excel\Concerns\FromCollection;

class DustExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Dust::all();
    }
}
