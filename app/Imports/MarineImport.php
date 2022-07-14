<?php

namespace App\Imports;

use App\Models\Marine;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class MarineImport implements ToModel, WithValidation, WithHeadingRow
{
    use SkipsErrors, Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Marine([
            'user_id' => $row["user_id"],
            'biota_id'=>$row['biota_id'],
            'location_id'=>$row['location_id'],
            'date'=>$row['date'],
            'taxa_richness'=>$row['taxa_richness'],
            'species_density'=>$row['species_density'],
            'diversity_index'=>$row['diversity_index'],
            'evenness_value'=>$row['evenness_value'],
            'dominance_index'=>$row['dominance_index'],
        ]);
    }
    public function rules(): array
    {
        return [

            '*.species_density' => ['required'],
            '*.location_id' => ['required'],
            '*.biota_id' => ['required']

        ];
    }
}
