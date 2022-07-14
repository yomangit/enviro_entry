<?php

namespace App\Imports;

use App\Models\Codesample;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Throwable;

class SampleSurfaceWaterImport implements ToModel, WithValidation,WithHeadingRow
{
    use Importable,SkipsFailures,SkipsErrors;
    
    public function model(array $row)
    {
        return new Codesample([
            'user_id' => $row['user_id'],
            'nama' => $row['nama'],
            'lokasi' => $row['lokasi']
        ]);
    }

    public function rules(): array
    {
        return[
                '*.nama'=>['unique:codesamples']
        ];
    }

}
