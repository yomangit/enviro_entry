<?php

namespace App\Imports;

use App\Models\EmissionStandard2;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportQualityStandard implements ToModel, WithValidation, WithHeadingRow
{
    use SkipsErrors, Importable, SkipsFailures;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new EmissionStandard2([
            'user_id' => $row['user_id'],
            'nama' => $row['nama'],
            'engine' => $row['engine'],
            'fuel_type' => $row['fuel_type'],
            'capacity' => $row['capacity'],
            'ambient_temperature' => $row['ambient_temperature'],
            'stack_temperature' => $row['stack_temperature'],
            'meter_temperature' => $row['meter_temperature'],
            'moisture_content' => $row['moisture_content'],
            'actual_volume_sample' => $row['actual_volume_sample'],
            'standard_volume_sample' => $row['standard_volume_sample'],
            'actual_oxygen_o2' => $row['actual_oxygen_o2'],
            'velocity_linear' => $row['velocity_linear'],
            'dry_molecular_weight' => $row['dry_molecular_weight'],
            'actual_stack_flowrate' => $row['actual_stack_flowrate'],
            'percent_of_isokinetic' => $row['percent_of_isokinetic'],
            'total_particulate_isokinetic_actual' => $row['total_particulate_isokinetic_actual'],
            'sulfur_dioxide_so2_actual' => $row['sulfur_dioxide_so2_actual'],
            'nitrogen_oxide_nox_as_nitrogen_dioxide_no2_actual' => $row['nitrogen_oxide_nox_as_nitrogen_dioxide_no2_actual'],
            'nitrogen_oxide_nox_actual' => $row['nitrogen_oxide_nox_actual'],
            'carbon_monoxide_co_actual' => $row['carbon_monoxide_co_actual'],
            'carbon_dioxide_co' => $row['carbon_dioxide_co'],
            'opacity' => $row['opacity'],
            'total_particulate_isokinetic' => $row['total_particulate_isokinetic'],
            'sulfur_dioxide_so2' => $row['sulfur_dioxide_so2'],
            'nitrogen_oxide_nox_as_nitrogen_dioxide_no2' => $row['nitrogen_oxide_nox_as_nitrogen_dioxide_no2'],
            'nitrogen_oxide_nox' => $row['nitrogen_oxide_nox'],
            'carbon_monoxide_co' => $row['carbon_monoxide_co'],

        ]);
    }
    public function rules(): array
    {
        return [
            'user_id' => 'required',
            'nama' => 'required',
            'engine' => 'required',
            'fuel_type' => 'required',
            'capacity' => 'required',
            'ambient_temperature' => 'required',
            'stack_temperature' => 'required',
            'meter_temperature' => 'required',
            'moisture_content' => 'required',
            'actual_volume_sample' => 'required',
            'standard_volume_sample' => 'required',
            'actual_oxygen_o2' => 'required',
            'velocity_linear' => 'required',
            'dry_molecular_weight' => 'required',
            'actual_stack_flowrate' => 'required',
            'percent_of_isokinetic' => 'required',
            'total_particulate_isokinetic_actual' => 'required',
            'sulfur_dioxide_so2_actual' => 'required',
            'nitrogen_oxide_nox_as_nitrogen_dioxide_no2_actual' => 'required',
            'nitrogen_oxide_nox_actual' => 'required',
            'carbon_monoxide_co_actual' => 'required',
            'carbon_dioxide_co' => 'required',
            'opacity' => 'required',
            'total_particulate_isokinetic' => 'required',
            'sulfur_dioxide_so2' => 'required',
            'nitrogen_oxide_nox_as_nitrogen_dioxide_no2' => 'required',
            'nitrogen_oxide_nox' => 'required',
            'carbon_monoxide_co' => 'required',
        ];
    }
}
