<?php

namespace App\Imports;

use App\Models\Dataentry;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class DataImport implements ToModel, WithHeadingRow
{
    use SkipsErrors, Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Dataentry([
            'standard_id'=>$row['standard_id'],
            'user_id' =>$row['user_id'],
            'codesample_id'=>$row['codesample_id'],
            'date'           =>$row['date'],     
            'start_time'       =>$row['start_time'],   
            'tss'                =>$row['tss'], 
            'ph'                  =>$row['ph'],
            'do'                  =>$row['do'],
            'orp'               =>$row['orp'],
              'conductivity'     =>$row['conductivity'],   
              'tds'                =>$row['tds'], 
              'temperatur'          =>$row['temperatur'],
              'salinity'            =>$row['salinity'],
              'turbidity'           =>$row['turbidity'],
              'tl_wall'           =>$row['tl_wall'],
              'tl_tsf'           =>$row['tl_tsf'],
            'water_condition'     =>$row['water_condition'],
            'water_color'         =>$row['water_color'],
            'odor'       =>$row['odor'],
            'rain'         =>$row['rain'],       
            'rain_during_sampling'=>$row['rain_during_sampling'],
            'oil_layer'           =>$row['oil_layer'],
            'source_pollution'    =>$row['source_pollution'],
            'sampler'    =>$row['sampler'],
            'cyanide'    =>$row['level'],
            'level'    =>$row['level'],
            'lvl_lgr'    =>$row['lvl_lgr'],
            'debit_s'    =>$row['debit_s'],
            'debit_d'    =>$row['debit_d']
        ]);
    }



}
