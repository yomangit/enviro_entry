<?php

namespace App\Imports;

use App\Models\Hydrometric;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HydroImport implements ToModel, WithHeadingRow
{
    use SkipsErrors, Importable, SkipsFailures;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Hydrometric([
            'standard_id' => $row['standard_id'],
            'point_id' => $row['point_id'],
            'user_id' => $row['user_id'],
            'date'           => $row['date'],
            'start_time'       => $row['start_time'],
            'stop_time'       => $row['stop_time'],
            'tss'                => $row['tss'],
            'ph'                  => $row['ph'],
            'do'                  => $row['do'],
            'orp'               => $row['orp'],
            'conductivity'     => $row['conductivity'],
            'tds'                => $row['tds'],
            'temperatur'          => $row['temperatur'],
            'salinity'            => $row['salinity'],
            'turbidity'           => $row['turbidity'],
            'tl_wall'           => $row['tl_wall'],
            'tl_tsf'           => $row['tl_tsf'],
            'water_condition'     => $row['water_condition'],
            'water_color'         => $row['water_color'],
            'odor'       => $row['odor'],
            'rain'         => $row['rain'],
            'rain_during_sampling' => $row['rain_during_sampling'],
            'oil_layer'           => $row['oil_layer'],
            'source_pollution'    => $row['source_pollution'],
            'sampler'    => $row['sampler'],
            'cyanide'    => $row['level'],
            'level'    => $row['level'],
            'lvl_lgr'    => $row['lvl_lgr'],
            'debit_s'    => $row['debit_s'],
            'debit_d'    => $row['debit_d'],
            'remarks'    => $row['remarks']
        ]);
    }
    public function rules(): array
    {
        return [

            '*.standard_id' => ['required'],
            '*.point_id' => ['required'],
            '*.user_id' => ['required'],
            '*.date' => ['required'],
            '*.start_time' => ['required'],
            '*.stop_time' => ['required'],
            '*.tss' => ['required'],
            '*.ph' => ['required'],
            '*.do' => ['required'],
            '*.orp' => ['required'],
            '*.conductivity' => ['required'],
            '*.tds' => ['required'],
            '*.temperatur' => ['required'],
            '*.salinity' => ['required'],
            '*.turbidity' => ['required'],
            '*.tl_wall' => ['required'],
            '*.tl_tsf' => ['required'],
            '*.water_condition' => ['required'],
            '*.water_color' => ['required'],
            '*.odor' => ['required'],
            '*.rain' => ['required'],
            '*.rain_during_sampling' => ['required'],
            '*.oil_layer' => ['required'],
            '*.source_pollution' => ['required'],
            '*.sampler' => ['required'],
            '*.cyanide' => ['required'],
            '*.level' => ['required'],
            '*.lvl_lgr' => ['required'],
            '*.debit_s' => ['required'],
            '*.debit_d' => ['required'],
            '*.remarks' => ['required']

        ];
    }
}
