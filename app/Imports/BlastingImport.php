<?php

namespace App\Imports;

use App\Models\Blasting;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BlastingImport implements ToModel,WithHeadingRow
{
    use SkipsErrors, Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Blasting([
           'user_id'=>$row['user_id'],
           'point_id'=>$row['point_id'],
           'standard_id'=>$row['standard_id'],
           'date'=>$row['date'],
           'time'=>$row['time'],
           'transversal_freq'=>$row['transversal_freq'],
           'vertical_freq'=>$row['vertical_freq'],
           'longitudinal_freq'=>$row['longitudinal_freq'],
           'transversal_ppv'=>$row['transversal_ppv'],
           'vertical_ppv'=>$row['vertical_ppv'],
           'longitudinal_ppv'=>$row['longitudinal_ppv'],
           'peak_vektor'=>$row['peak_vektor'],
           'peak_vektor_std'=>$row['peak_vektor_std'],
           'noise_level'=>$row['noise_level'],
           'blast_location'=>$row['blast_location'],
           'weather'=>$row['weather'],
           'sampler'=>$row['sampler'],
           'remarks'=>$row['remarks'],
           
        ]);
    }
}
