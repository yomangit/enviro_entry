<?php

namespace App\Imports;

use App\Models\Codesamplegw;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Codesamplettn;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CodeSampleGWImport implements ToModel,WithValidation,WithHeadingRow
{
    use SkipsErrors,Importable,SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Codesamplegw([
            'user_id' => $row['user_id'],
            'nama' => $row['nama'],
            'lokasi' => $row['lokasi'],
            'total' => $row['total'],
            'gl' => $row['gl'],
            'rl' => $row['rl'],
        ]);
    }
    public function rules(): array
    {
       return[
          
           '*.nama'=>['unique:codesamplegws']
       ];
    }
}
