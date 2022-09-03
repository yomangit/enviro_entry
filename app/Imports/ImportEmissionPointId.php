<?php

namespace App\Imports;


use App\Models\EmissionPointId;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportEmissionPointId implements ToModel, WithValidation, WithHeadingRow
{
    use SkipsErrors, Importable, SkipsFailures;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new EmissionPointId([
            'user_id' => $row['user_id'],
            'nama' => $row['nama'],
            'lokasi' => $row['lokasi']
        ]);
    }

    public function rules(): array
    {
        return [
            '*.nama' => ['unique:point_id_marines'],
            'lokasi' => ['required']
        ];
    }
}
