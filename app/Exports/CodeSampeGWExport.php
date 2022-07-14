<?php

namespace App\Exports;

use App\Models\Codesamplegw;
use Maatwebsite\Excel\Concerns\FromCollection;

class CodeSampeGWExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Codesamplegw::all();
    }
}
