<?php

namespace App\Exports;

use App\Models\Masterttn;
use Maatwebsite\Excel\Concerns\FromCollection;

class MasterTTNExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Masterttn::all();
    }
}
