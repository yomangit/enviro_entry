<?php

namespace App\Exports;

use App\Models\Codesamplettn;
use Maatwebsite\Excel\Concerns\FromCollection;

class CodeSampleTTNExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Codesamplettn::all();
    }
}
