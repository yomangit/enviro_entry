<?php

namespace App\Imports;

use App\Models\GroundWaterStandard;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GwStandardImport implements ToModel, WithHeadingRow
{
    use SkipsErrors, Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new GroundWaterStandard([
            'user_id' => $row['user_id'],
            'd_pipe' => $row['d_pipe'],
            'tt' => $row['tt'],
            'r' => $row['r'],
        ]);
    }
}
