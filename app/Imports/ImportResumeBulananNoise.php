<?php

namespace App\Imports;

use App\Models\ResumeBulananNoise;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportResumeBulananNoise implements ToModel,WithValidation, WithHeadingRow
{
    use SkipsErrors, Importable, SkipsFailures;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ResumeBulananNoise([
            'user_id' => $row['user_id'],
            'locationresume' => $row['locationresume'],
            'date' => $row['date'],
            'l1' => $row['l1'],
            'l2' => $row['l2'],
            'l3' => $row['l3'],
            'l4' => $row['l4'],
            'l5' => $row['l5'],
            'l6' => $row['l6'],
            'l7' => $row['l7'],
            'ls' => $row['ls'],
            'lm' => $row['lm'],
            'lsm' => $row['lsm']
        ]);
    }
    public function rules(): array
    {
        return[
            'user_id' =>'required',
            'locationresume' => 'required',
            'date' => 'required',
            'l1' => 'required',
            'l2' => 'required',
            'l3' => 'required',
            'l4' => 'required',
            'l5' => 'required',
            'l6' => 'required',
            'l7' => 'required',
            'ls' => 'required',
            'lm' => 'required',
            'lsm' => 'required' 
        ];
    }
}
