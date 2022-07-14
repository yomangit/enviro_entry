<?php

namespace App\Imports;

use App\Models\Biota;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class BiotaImport implements ToModel, WithValidation, WithHeadingRow
{
    use SkipsErrors, Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Biota([
            'user_id' => $row['user_id'],
            'nama' => $row['nama']
        ]);
    }
    public function rules(): array
    {
        return [

            '*.nama' => ['unique:biotas']
        ];
    }
}
