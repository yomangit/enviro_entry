<?php

namespace App\Imports;

use App\Models\StandardBlasting;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TableStandardBlastingImport implements ToModel,WithHeadingRow
{
    use SkipsErrors,Importable,SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new StandardBlasting([
            'user_id' => $row['user_id'],
            'frequency' => $row['frequency'],
            'ppv' => $row['ppv'],
            'noise_level' => $row['noise_level']
        ]);
    }
}
