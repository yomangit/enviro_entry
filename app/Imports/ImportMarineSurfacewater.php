<?php

namespace App\Imports;

use App\Models\MarineSurfacewater;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportMarineSurfacewater implements ToModel, WithValidation, WithHeadingRow
{
    use SkipsErrors, Importable, SkipsFailures;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new MarineSurfacewater([
            'point_id' => $row['point_id'],
            'user_id' => $row['user_id'],
            'date' => $row['date'],
            'clarity' => $row['clarity'],
            'temperature_water' => $row['temperature_water'],
            'garbage' => $row['garbage'],
            'oil_ayer' => $row['oil_ayer'],
            'odour' => $row['odour'],
            'colour' => $row['colour'],
            'turbidity' => $row['turbidity'],
            'total_suspended_solids' => $row['total_suspended_solids'],
            'salinity_in_situ' => $row['salinity_in_situ'],
            'total_dissolved_solids' => $row['total_dissolved_solids'],
            'conductivity_insitu' => $row['conductivity_insitu'],
            'ph' => $row['ph'],
            'sulphide' => $row['sulphide'],
            'ammonia_n_nh3' => $row['ammonia_n_nh3'],
            'nitrate_n_no3' => $row['nitrate_n_no3'],
            'total_phosphate_p_po4' => $row['total_phosphate_p_po4'],
            'cyanide' => $row['cyanide'],
            'cyanide_total' => $row['cyanide_total'],
            'total_coliform' => $row['total_coliform'],
            'chromium_hexavalent_total_cr_vi' => $row['chromium_hexavalent_total_cr_vi'],
            'arsenic_hydrid_dissolved_as' => $row['arsenic_hydrid_dissolved_as'],
            'boron_dissolved_b' => $row['boron_dissolved_b'],
            'cadmium_dissolved_cd' => $row['cadmium_dissolved_cd'],
            'copper_dissolved_cu' => $row['copper_dissolved_cu'],
            'lead_dissolved_pb' => $row['lead_dissolved_pb'],
            'nickel_dissolved_ni' => $row['nickel_dissolved_ni'],
            'zinc_dissolved_zn' => $row['zinc_dissolved_zn'],
            'mercury_dissolved_hg' => $row['mercury_dissolved_hg'],
            'biologycal_oxygen_demand' => $row['biologycal_oxygen_demand'],
            'dissolved_oxygen' => $row['dissolved_oxygen'],
            'oil_grease' => $row['oil_grease'],
            'surfactant' => $row['surfactant'],
            'total_phenol' => $row['total_phenol'],
            'hydrocarbon' => $row['hydrocarbon'],
            'tributyl_tin' => $row['tributyl_tin'],
            'total_poly_chlor_biphenyl' => $row['total_poly_chlor_biphenyl'],
            'poly_aromatic_hydrocarbon' => $row['poly_aromatic_hydrocarbon'],
            'total_pesticides_as_organo_chlorine_pesticides' => $row['total_pesticides_as_organo_chlorine_pesticides'],
            'benzene_hexa_chloride' => $row['benzene_hexa_chloride'],
            'endrin' => $row['endrin'],
            'dichloro_diphenyl_trichloroethane' => $row['dichloro_diphenyl_trichloroethane'],
            'total_petroleum_hydrocarbons' => $row['total_petroleum_hydrocarbons']
        ]);
    }
    public function rules(): array
    {
        return [
            'point_id' => ['required'],
            'user_id' => ['required'],
            'date' => ['required '],
            'clarity'=>['required'],
            'temperature_water'=>['required'],
            'garbage'=>['required'],
            'oil_ayer'=>['required'],
            'odour'=>['required'],
            'colour'=>['required'],
            'turbidity'=>['required'],
            'total_suspended_solids'=>['required'],
            'salinity_in_situ'=>['required'],
            'total_dissolved_solids'=>['required'],
            'conductivity_insitu'=>['required'],
            'ph'=>['required'],
            'sulphide'=>['required'],
            'ammonia_n_nh3'=>['required'],
            'nitrate_n_no3'=>['required'],
            'total_phosphate_p_po4'=>['required'],
            'cyanide'=>['required'],
            'cyanide_total'=>['required'],
            'total_coliform'=>['required'],
            'chromium_hexavalent_total_cr_vi'=>['required'],
            'arsenic_hydrid_dissolved_as'=>['required'],
            'boron_dissolved_b'=>['required'],
            'cadmium_dissolved_cd'=>['required'],
            'copper_dissolved_cu'=>['required'],
            'lead_dissolved_pb'=>['required'],
            'nickel_dissolved_ni'=>['required'],
            'zinc_dissolved_zn'=>['required'],
            'mercury_dissolved_hg'=>['required'],
            'biologycal_oxygen_demand'=>['required'],
            'dissolved_oxygen'=>['required'],
            'oil_grease'=>['required'],
            'surfactant'=>['required'],
            'total_phenol'=>['required'],
            'hydrocarbon'=>['required'],
            'tributyl_tin'=>['required'],
            'total_poly_chlor_biphenyl'=>['required'],
            'poly_aromatic_hydrocarbon'=>['required'],
            'total_pesticides_as_organo_chlorine_pesticides'=>['required'],
            'benzene_hexa_chloride'=>['required'],
            'endrin'=>['required'],
            'dichloro_diphenyl_trichloroethane'=>['required'],
            'total_petroleum_hydrocarbons'=>['required'],

        ];
    }
}
