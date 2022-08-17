<?php

namespace App\Imports;

use App\Models\Codesamplenm;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CodeSampleNoiseImport implements ToModel,WithValidation,WithHeadingRow
{
    use SkipsErrors,Importable,SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Codesamplenm([
            'user_id'=>$row['user_id'],
            'nama'=>$row['nama']
        ]);
    }
    public function rules(): array
    {
       return[
          
           '*.nama'=>['unique:codesamplenms']
       ];
    }
}
