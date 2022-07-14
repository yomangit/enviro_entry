<?php

namespace App\Http\Controllers;

use App\Models\Biota;
use App\Models\Dataentry;
use App\Models\Codesample;
use App\Models\FreshWater;
use Illuminate\Http\Request;
use App\Models\LocationBiota;

class AuthFreshwaterController extends Controller
{
    public function index()
    {
        
        $grafiks= FreshWater::with('user')->filter(request(['fromDate','search']))->get();
        $taxa_richness=[];
        $species_density=[];
        $diversity_index=[];
        $evenness_value=[];
        $dominance_index=[];
        $date=[];
        $biotas=[];
       foreach ($grafiks as $grafik ) {
        $date[]=date('m-Y', strtotime( $grafik->date));
        $taxa_richness[]=$grafik->taxa_richness;
        $species_density[]=$grafik->species_density;  
        $diversity_index[]=$grafik->diversity_index;
        $evenness_value[]=$grafik->evenness_value;
        $dominance_index[]=$grafik->dominance_index;
        $biotas[]=$grafik->biota_id;
       }
        return view('Auth.FreshWater.index', [
            "tittle" => "Fresh Water",
            'Biotum'=>Biota::all(),
            'LocationBiota'=>LocationBiota::all(),
            'breadcrumb' => 'Fresh Water Monitoring',
            'date'=>$date,
            'taxa_richness'=> $taxa_richness,
            'species_density'=> $species_density,
            'diversity_index'=>$diversity_index,
            'evenness_value'=>$evenness_value,
            'dominance_index'=>$dominance_index,
            'biotas'=>$biotas,
            'Freshwaters' => FreshWater::with('user')->latest()->filter(request(['fromDate', 'search','location']))->paginate(10)->withQueryString() //with diguanakan untuk mengatasi N+1 problem
        ]);
    }
}
