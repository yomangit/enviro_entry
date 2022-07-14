<?php

namespace App\Exports;

use App\Models\Codesample;
use Maatwebsite\Excel\Concerns\FromCollection;

class CodeSampleSWExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Codesample::all();
    }
}
