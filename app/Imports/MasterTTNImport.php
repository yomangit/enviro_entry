<?php

namespace App\Imports;

use App\Models\Masterttn;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MasterTTNImport implements ToModel, WithHeadingRow
{
    use SkipsErrors, Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Masterttn([
            'user_id' => $row['user_id'],
            'gwcodesample_id' => $row['gwcodesample_id'],
            'gwtablestandard_id' => $row['gwtablestandard_id'],
            'date' => $row['date'],
            'start_time' => $row['start_time'],
            'stop_time' => $row['stop_time'],
            'well' => $row['well'],
            'well_water' => $row['well_water'],
            'h' => $row['h'],
            'water_volume' => $row['water_volume'],
            'temperatur' => $row['temperatur'],
            'ph' => $row['ph'],
            'conductivity' => $row['conductivity'],
            'tds' => $row['tds'],
            'redox' => $row['redox'],
            'do' => $row['do'],
            'salinity' => $row['salinity'],
            'turbidity' => $row['turbidity'],
            'water_color' => $row['water_color'],
            'odor' => $row['odor'],
            'rain_before_sampling' => $row['rain_before_sampling'],
            'rain_during_sampling' => $row['rain_during_sampling'],
            'oil_layer' => $row['oil_layer'],
            'source_pollution' => $row['source_pollution'],
            'sampler' => $row['sampler'],
            'remarks' => $row['remarks']
        ]);
    }
}
