<?php

namespace App\Imports;

use App\Models\Masterttn;
use Maatwebsite\Excel\Concerns\ToModel;

class MasterTTNImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Masterttn([
            //
        ]);
    }
}
