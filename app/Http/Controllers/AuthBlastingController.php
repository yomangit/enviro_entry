<?php

namespace App\Http\Controllers;

use App\Models\Blasting;
use Illuminate\Http\Request;
use App\Models\PointIdBlasting;
use App\Models\StandardBlasting;

class AuthBlastingController extends Controller
{
    public function index()
    {

        $grafiks = Blasting::with('user')->filter(request(['fromDate', 'search']))->paginate(20)->withQueryString();
        $tanggal = [];
        $freq = [];
        $peak = [];
        $freq1 = [];
        $peak1 = [];
        $peak_std=[];
        foreach ($grafiks as $grafik) {

            
            $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
            $peak_std[]= doubleval($grafik->peak_vektor_std);
           if ($freq1[] = $grafik->StandardID->ppv === 'error') {
               //   $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
               $freq[] = '';
           } elseif ($freq1[] =$grafik->StandardID->ppv != 'error') {
               //  $tanggal[] = date('d-m-Y', strtotime($grafik->date));
               $freq[] = $freq1[] = doubleval($grafik->StandardID->ppv);
           }
           if ($peak1[] = $grafik->peak_vektor === 'error') {
               // $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
               $peak[] = '';
           } elseif ($peak1[] =$grafik->peak_vektor != 'error') {
               // $tanggal[] = date('d-m-Y', strtotime($grafik->date));
               $peak[] = $peak1[] = doubleval($grafik->peak_vektor);
           }
          
       }
  

        return view('Auth.Blasting.index',[
            "tittle"=>" Blasting",
            'breadcrumb'=>' Blasting',
            'Point_ID'=>PointIdBlasting::all(),
            'freq'=>$freq,
            'peak'=>$peak,
            'peak_std'=>$peak_std,
            'date'=>$tanggal,
            'Standard_id'=>StandardBlasting::all(),
            'Blasting'=>Blasting::with('user')->filter(request(['fromDate','search']))->paginate(10)->withQueryString()//with diguanakan untuk mengatasi N+1 problem

         ]);
    }
}
