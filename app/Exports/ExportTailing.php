<?php

namespace App\Exports;

use App\Models\Tailing;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportTailing implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tailing::all();
    }
}
