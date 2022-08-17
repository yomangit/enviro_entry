<?php

namespace App\Imports;

use App\Models\CodeHydrometric;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CodeHydroImport implements ToModel,WithValidation,WithHeadingRow
{
    use Importable,SkipsFailures,SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CodeHydrometric([
            'user_id' => $row['user_id'],
            'nama' => $row['nama'],
            'lokasi' => $row['lokasi']
        ]);
    }

    public function rules(): array
    {
        return[
                '*.nama'=>['unique:code_hydrometrics']
        ];
    }
}
