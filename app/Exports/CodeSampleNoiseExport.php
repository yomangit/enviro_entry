<?php

namespace App\Exports;

use App\Models\Codesamplenm;
use Maatwebsite\Excel\Concerns\FromCollection;

class CodeSampleNoiseExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Codesamplenm::all();
    }
}
