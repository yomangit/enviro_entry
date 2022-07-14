<?php

namespace App\Imports;

use App\Models\Mastergw;
use Maatwebsite\Excel\Concerns\ToModel;

class GroundWaterImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mastergw([
            'standard_id' => $row[1],
            'user_id' => $row[2],
            'gwcodesample_id' => $row[3],
            'date' => $row[4],
            'start_time' => $row[5],
            'stop_time' => $row[6],
            'well' => $row[7],
            'well_water' => $row[8],
            'h' => $row[9],
            'd_pipe' => $row[10],
            'tt' => $row[11],
            'r' => $row[12],
            'water_volume' => $row[13],
            'temperatur' => $row[14],
            'ph' => $row[15],
            'conductivity' => $row[16],
            'tds' => $row[17],
            'redox' => $row[18],
            'do' => $row[19],
            'salinity' => $row[20],
            'turbidity' => $row[21],
            'water_color' => $row[22],
            'odor' => $row[23],
            'rain_before_sampling' => $row[24],
            'rain_during_sampling' => $row[25],
            'oil_layer' => $row[26],
            'source_pollution' => $row[27],
            'sampler' => $row[28],
            'hard_copy' => $row[29]
        ]);
    }
}
