<?php

namespace App\Exports;

use App\Models\Codesampledg;
use Maatwebsite\Excel\Concerns\FromCollection;

class CodeDustExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Codesampledg::all();
    }
}
