<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use App\Models\DischargeManualQualityStandard;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportDischargeManualStandard implements ToModel, WithValidation, WithHeadingRow
{
    use SkipsErrors, Importable, SkipsFailures;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new DischargeManualQualityStandard([
            "user_id" => $row["user_id"],
            "tss" => $row["tss"],
            "ph_max" => $row["ph_max"],
            "ph_min" => $row["ph_min"],
            "redox" => $row["redox"],
            "do" => $row["do"],
            "tds" => $row["tds"],
            "conductivity" => $row["conductivity"],
            "temperatur" => $row["temperatur"]

        ]);
    }
    public function rules(): array
    {
        return[
            'user_id' => 'required|max:255',
            'tss' => 'required|max:255',
            'ph_max' => 'required|max:255',
            'ph_min' => 'required|max:255',
            'redox' => 'required|max:255',
            'do' => 'required|max:255',
            'tds' => 'required|max:255',
            'conductivity' => 'required|max:255',
            'temperatur' => 'required|max:255',
        ];
    }
}
