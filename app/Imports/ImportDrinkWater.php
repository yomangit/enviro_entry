<?php

namespace App\Imports;

use App\Models\DrinkWater;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportDrinkWater implements ToModel, WithValidation, WithHeadingRow
{
    use SkipsErrors, Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DrinkWater([
            'standard_id'=>$row['standard_id'],
            'user_id'=>$row['user_id'],
            'date'=>$row['date '],
            'conductivity'=>$row['conductivity'],
            'tds' =>$row['tds'],
            'tss'=>$row['tss'],
            'turbidity'=>$row['turbidity'],
            'hardness'=>$row['hardness'],
            'color'=>$row['color'],
            'odor'=>$row['odor'],
            'taste'=>$row['taste'],
            'ph'=>$row['ph'],
            'chloride'=>$row['chloride'],
            'fluoride'=>$row['fluoride'],
            'residual_chlorine'=>$row['residual_chlorine'],
            'sulphate'=>$row['sulphate'],
            'sulphite'=>$row['sulphite'],
            'free_cyanide'=>$row['free_cyanide'],
            'total_cyanide'=>$row['total_cyanide'],
            'wad_cyanide'=>$row['wad_cyanide'],
            'ammonia_nh4'=>$row['ammonia_nh4'],
            'ammonia_nnh3'=>$row['ammonia_nnh3'],
            'nitrate_no3'=>$row['nitrate_no3'],
            'nitrate_no2'=>$row['nitrate_no2'],
            'phosphate_po4'=>$row['phosphate_po4'],
            'aluminium_al'=>$row['aluminium_al'],
            'arsenic_as'=>$row['arsenic_as'],
            'barium_ba'=>$row['barium_ba'],
            'cadmium_cd'=>$row['cadmium_cd'],
            'chromium_cr'=>$row['chromium_cr'],
            'chromium_hexavalent'=>$row['chromium_hexavalent'],
            'cobalt_co'=>$row['cobalt_co'],
            'copper_cu'=>$row['copper_cu'],
            'iron_fe'=>$row['iron_fe'],
            'lead_pb'=>$row['lead_pb'],
            'manganese_mn'=>$row['manganese_mn'],
            'mercury_hg'=>$row['mercury_hg'],
            'nickel_ni'=>$row['nickel_ni'],
            'selenium_se'=>$row['selenium_se'],
            'silver_ag'=>$row['silver_ag'],
            'zinc_zn'=>$row['zinc_zn'],
            'fecal_coliform'=>$row['fecal_coliform'],
            'c_coli'=>$row['c_coli'],
            'total_coliform_bacteria'=>$row['total_coliform_bacteria'],
 ]);
 }
 public function rules(): array
 {
     return [

        'conductivity'=>['required'],
        'tds'=>['required'],
        'tss'=>['required'],
        'turbidity'=>['required'],
        'hardness'=>['required'],
        'color'=>['required'],
        'odor'=>['required'],
        'taste'=>['required'],
        'ph'=>['required'],
        'chloride'=>['required'],
        'fluoride'=>['required'],
        'residual_chlorine'=>['required'],
        'sulphate'=>['required'],
        'sulphite'=>['required'],
        'free_cyanide'=>['required'],
        'total_cyanide'=>['required'],
        'wad_cyanide'=>['required'],
        'ammonia_nh4'=>['required'],
        'ammonia_nnh3'=>['required'],
        'nitrate_no3'=>['required'],
        'nitrate_no2'=>['required'],
        'phosphate_po4'=>['required'],
        'aluminium_al'=>['required'],
        'arsenic_as'=>['required'],
        'barium_ba'=>['required'],
        'cadmium_cd'=>['required'],
        'chromium_cr'=>['required'],
        'chromium_hexavalent'=>['required'],
        'cobalt_co'=>['required'],
        'copper_cu'=>['required'],
        'iron_fe'=>['required'],
        'lead_pb'=>['required'],
        'manganese_mn'=>['required'],
        'mercury_hg'=>['required'],
        'nickel_ni'=>['required'],
        'selenium_se'=>['required'],
        'silver_ag'=>['required'],
        'zinc_zn'=>['required'],
        'fecal_coliform'=>['required'],
        'c_coli'=>['required'],
        'total_coliform_bacteria'=>['required'],      
     ];
 }
}
