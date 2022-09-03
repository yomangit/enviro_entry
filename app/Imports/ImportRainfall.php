<?php

namespace App\Imports;

use App\Models\Rainfall;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportRainfall implements ToModel,WithValidation, WithHeadingRow
{
    use SkipsErrors, Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Rainfall([
            'user_id' => $row['user_id'],
            'point_id' => $row['point_id'],
            'date' => $row['date'],
            'rainfall' => $row['rainfall'],

        ]);
    }

    public function rules(): array
    {
        return[
                'user_id' =>'required',
                'point_id' =>'required',
                'date' =>'required',
                'rainfall' =>'required'
        ];
    }
}
