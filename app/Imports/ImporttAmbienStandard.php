<?php

namespace App\Imports;

use App\Models\AmbienQualityStd;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImporttAmbienStandard implements ToModel, WithValidation, WithHeadingRow
{
    use SkipsErrors, Importable, SkipsFailures;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new AmbienQualityStd([
            'user_id' => $row['user_id'],
            'nama' => $row['nama'],
            'sulphur_dioxide_so2' => $row['sulphur_dioxide_so2'],
            'nitrogen_dioxide_no2' => $row['nitrogen_dioxide_no2'],
            'carbon_monoxide' => $row['carbon_monoxide'],
            'ozone' => $row['ozone'],
            'total_suspended_particulate_24_hours' => $row['total_suspended_particulate_24_hours'],
            'particulate_matter_10' => $row['particulate_matter_10'],
            'particulate_matter_2_5' => $row['particulate_matter_2_5'],
            'temperature_ambient' => $row['temperature_ambient'],
            'humidity' => $row['humidity'],
            'wind_speed' => $row['wind_speed'],
            'wind_direction' => $row['wind_direction'],
            'weather' => $row['weather'],
            'barometric_pressure' => $row['barometric_pressure'],
            'lead_pb' => $row['lead_pb'],
            'hydrocarbon' => $row['hydrocarbon'],
        ]);
    }
    public function rules(): array
    {
        return [
            'user_id' => 'required',
            'nama' => 'required',
            'sulphur_dioxide_so2' => 'required',
            'nitrogen_dioxide_no2' => 'required',
            'carbon_monoxide' => 'required',
            'ozone' => 'required',
            'total_suspended_particulate_24_hours' => 'required',
            'particulate_matter_10' => 'required',
            'particulate_matter_2_5' => 'required',
            'temperature_ambient' => 'required',
            'humidity' => 'required',
            'wind_speed' => 'required',
            'wind_direction' => 'required',
            'weather' => 'required',
            'barometric_pressure' => 'required',
            'lead_pb' => 'required',
            'hydrocarbon' => 'required',
        ];
    }
}
