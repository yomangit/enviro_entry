<?php

namespace App\Imports;

use App\Models\Soilqualitystandard;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportSoilStandard implements ToModel, WithValidation, WithHeadingRow
{
    use SkipsErrors, Importable, SkipsFailures;



    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
     
        return new Soilqualitystandard([
            'user_id'=> $row['user_id'],
            'nama' => $row['nama'],
            'ph' => $row['ph'],
            'ph_h2o' => $row['ph_h2o'],
            'total_organic_carbon' => $row['total_organic_carbon'],
            'total_nitrogen' => $row['total_nitrogen'],
            'cn' => $row['cn'],
            'calsium' => $row['calsium'],
            'magnesium' => $row['magnesium'],
            'pottasium' => $row['pottasium'],
            'sodium' => $row['sodium'],
            'jumlah' => $row['jumlah'],
            'p2o5_hcl_25' => $row['p2o5_hcl_25'],
            'k2o_hcl_25' => $row['k2o_hcl_25'],
            'p2o5_olsen' => $row['p2o5_olsen'],
            'kapasitas_tukar_kation' => $row['kapasitas_tukar_kation'],
            'kb_kejenuhan_basa' => $row['kb_kejenuhan_basa'],
            'al_tukar' => $row['al_tukar'],
            'h_tukar' => $row['h_tukar'],
            'pasir' => $row['pasir'],
            'debu' => $row['debu'],
            'lempung' => $row['lempung'],
            'moisture_content' => $row['moisture_content'],
            'bulk_density' => $row['bulk_density'],
            'ruang_pori_total' => $row['ruang_pori_total'],
            'pd' => $row['pd'],
            'sangat_cepat' => $row['sangat_cepat'],
            'cepat' => $row['cepat'],
            'lambat' => $row['lambat'],
            'air_tersedia' => $row['air_tersedia'],
            'permeabilitas' => $row['permeabilitas'],
            'pf_1' => $row['pf_1'],
            'pf_2' => $row['pf_2'],
            'pf_2_54' => $row['pf_2_54'],
            'pf_4_2' => $row['pf_4_2'],
            'laboratorium' => $row['laboratorium'],
        ]);
    }
    public function rules(): array
    {
        return [
            'user_id' =>'required',
            'nama' => 'required',
            'ph' => 'required',
            'ph_h2o' => 'required',
            'total_organic_carbon' => 'required',
            'total_nitrogen' => 'required',
            'cn' => 'required',
            'calsium' => 'required',
            'magnesium' => 'required',
            'pottasium' => 'required',
            'sodium' => 'required',
            'jumlah' => 'required',
            'p2o5_hcl_25' => 'required',
            'k2o_hcl_25' => 'required',
            'p2o5_olsen' => 'required',
            'kapasitas_tukar_kation' => 'required',
            'kb_kejenuhan_basa' => 'required',
            'al_tukar' => 'required',
            'h_tukar' => 'required',
            'pasir' => 'required',
            'debu' => 'required',
            'lempung' => 'required',
            'moisture_content' => 'required',
            'bulk_density' => 'required',
            'ruang_pori_total' => 'required',
            'pd' => 'required',
            'sangat_cepat' => 'required',
            'cepat' => 'required',
            'lambat' => 'required',
            'air_tersedia' => 'required',
            'permeabilitas' => 'required',
            'pf_1' => 'required',
            'pf_2' => 'required',
            'pf_2_54' => 'required',
            'pf_4_2' => 'required',
            'laboratorium' => 'required',
        ];
    }
}
