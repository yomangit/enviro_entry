<?php

namespace App\Imports;

use App\Models\Emission2;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportEmission2 implements ToModel, WithValidation, WithHeadingRow
{
    use SkipsErrors, Importable, SkipsFailures;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Emission2([
            "user_id" => $row["user_id"],
            "point_id" => $row["point_id"],
            "date" => $row["date"],
            "equipment" => $row["equipment"],
            "fuel_type" => $row["fuel_type"],
            "capacity" => $row["capacity"],
            "ambient_temperature" => $row["ambient_temperature"],
            "stack_temperature" => $row["stack_temperature"],
            "meter_temperature" => $row["meter_temperature"],
            "moisture_content" => $row["moisture_content"],
            "actual_volume_sample" => $row["actual_volume_sample"],
            "standard_volume_sample" => $row["standard_volume_sample"],
            "actual_oxygen_o2" => $row["actual_oxygen_o2"],
            "velocity_linear" => $row["velocity_linear"],
            "dry_molecular_weight" => $row["dry_molecular_weight"],
            "actual_stack_flowrate" => $row["actual_stack_flowrate"],
            "percent_of_isokinetic" => $row["percent_of_isokinetic"],
            "ammonia_nh3" => $row["ammonia_nh3"],
            "chlorine_cl2" => $row["chlorine_cl2"],
            "hydrogen_chloride_hcl" => $row["hydrogen_chloride_hcl"],
            "hydrogen_fluoride_hf" => $row["hydrogen_fluoride_hf"],
            "nitrogen_oxide_nox" => $row["nitrogen_oxide_nox"],
			"nitrogen_dioxide_no2" => $row["nitrogen_dioxide_no2"],
            "opacity" => $row["opacity"],
            "total_particulate_isokinetic" => $row["total_particulate_isokinetic"],
            "sulfur_dioxide_so2" => $row["sulfur_dioxide_so2"],
            "hydrogen_sulphide_h2s" => $row["hydrogen_sulphide_h2s"],
            "mercury_hg" => $row["mercury_hg"],
            "arsenic_as" => $row["arsenic_as"],
            "antimony_sb" => $row["antimony_sb"],
            "cadmium_cd" => $row["cadmium_cd"],
            "zinc_zn" => $row["zinc_zn"],
            "lead_pb" => $row["lead_pb"]

        ]);
    }
    public function rules(): array
    {
        return [
            'user_id'=>'required',
            'point_id'=>'required',
            'date'=>'required',
            'equipment' => 'required',
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
            'ammonia_nh3' => 'required',
            'chlorine_cl2' => 'required',
            'hydrogen_chloride_hcl' => 'required',
            'hydrogen_fluoride_hf' => 'required',
            'nitrogen_oxide_nox' => 'required',
			 'nitrogen_dioxide_no2' => 'required',
            'opacity' => 'required',
            'total_particulate_isokinetic' => 'required',
            'sulfur_dioxide_so2' => 'required',
            'hydrogen_sulphide_h2s' => 'required',
            'mercury_hg' => 'required',
            'arsenic_as' => 'required',
            'antimony_sb' => 'required',
            'cadmium_cd' => 'required',
            'zinc_zn' => 'required',
            'lead_pb' => 'required'
        ];
    }
}
