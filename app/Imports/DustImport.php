<?php

namespace App\Imports;

use App\Models\Dust;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DustImport implements ToModel,WithHeadingRow
{
    use SkipsErrors, Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Dust([
            'user_id'=>$row['user_id'],
            'codedust_id'=>$row['codedust_id'],
            'date_in'=>$row['date_in'],
            'date_out'=>$row['date_out'],
            'm4'=>$row['m4'],
            'm3'=>$row['m3'],
            'm6'=>$row['m6'],
            'm5'=>$row['m5'],
            'no_insect'=>$row['no_insect'],
            'vb_dirt'=>$row['vb_dirt'],
            'vb_algae'=>$row['vb_algae'],
            'area_observation'=>$row['area_observation'],
            'observer'=>$row['observer'],
            'volume_filtrat'=>$row['volume_filtrat'],
            'total_vlm_water'=>$row['total_vlm_water'],
            'remarks'=>$row['remarks'],
        ]);
    }
}
