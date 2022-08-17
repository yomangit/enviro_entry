<?php

namespace App\Http\Controllers;

use App\Models\Masterttn;
use Illuminate\Http\Request;
use App\Models\Codesamplettn;

class AuthGroundWaterTTN extends Controller
{
    public function index()
    {
        $grafiks = Masterttn::with('user')
        ->filter(request(['fromDate', 'search']))
        ->paginate(30)
        ->withQueryString();
    $tanggal = [];
    $suhu = [];
    $ph = [];
    $suhu1 = [];
    $ph1 = [];
    foreach ($grafiks as $grafik) 
    {
        $tanggal[] = date('d-m-Y', strtotime($grafik->date));
        if ($suhu1[] = $grafik->temperatur === '-') {
            //   $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
            $suhu[] = '';
        } elseif ($suhu1[] = $grafik->temperatur != '-') {
            //  $tanggal[] = date('d-m-Y', strtotime($grafik->date));
            $suhu[] = $suhu1[] = doubleval($grafik->temperatur);
        }
        if ($ph1[] = $grafik->ph === '-') {
            // $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
            $ph[] = '';
        } elseif ($ph1[] = $grafik->ph !='-') {
           $ph[]=$ph1[] = doubleval($grafik->ph); # code...
            // $tanggal[] = date('d-m-Y', strtotime($grafik->date));
        }

        // $tanggal[] = date('d-m-Y', strtotime($grafik->date));
    }
        return view('auth.GroundWaterTTN.index',[
            'code_units'=>Codesamplettn::all(),
            "tittle"=>"Ground Water",
            'breadcrumb'=>'Ground Water TTN',
            'date' => $tanggal,
            'suhu' => $suhu,
            'ph' => $ph,
            'Master'=>Masterttn::with('user')->latest()->filter(request(['fromDate','search']))->paginate(10)->withQueryString()//with diguanakan untuk mengatasi N+1 problem
            
         ]);
    }
}
