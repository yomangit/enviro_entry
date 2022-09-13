<?php

namespace App\Imports;

use App\Models\Evaporation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportEvaporation implements ToModel,WithValidation, WithHeadingRow
{
    use SkipsErrors, Importable, SkipsFailures;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Evaporation([
            "user_id" => $row["user_id"],
            "point_id" => $row["point_id"],
            "date" => $row["date"],
            "time_observation" => $row["time_observation"],
            "day_rainfall" => $row["day_rainfall"],
            "initial_water_elevation" => $row["initial_water_elevation"],
            "final_water_elevation" => $row["final_water_elevation"],
            "evaporation" => $row["evaporation"],

        ]);
    }
    public function rules(): array
    {
        return[
            'user_id'=>'required',
            'date'=>'required',
            'point_id' => 'required',
            "time_observation" => 'required',
            "day_rainfall" => 'required',
            "initial_water_elevation" => 'required',
            "final_water_elevation" => 'required',
            "evaporation" => 'required',
        ];
    }
}
