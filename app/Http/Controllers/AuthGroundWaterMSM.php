<?php

namespace App\Http\Controllers;

use App\Models\Mastergw;
use App\Models\Codesamplegw;
use Illuminate\Http\Request;

class AuthGroundWaterMSM extends Controller
{
    public function index()
    {
        $grafiks = Mastergw::with('user')
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
        return view('Auth.GroundWaterMSM.index',[
            'code_units'=>Codesamplegw::all(),
            "tittle"=>"Ground Water MSM",
            'breadcrumb'=>'Ground Water MSM',
            'date' => $tanggal,
            'suhu' => $suhu,
            'ph' => $ph,
            'Master'=>Mastergw::with('user')->latest()->filter(request(['fromDate','search']))->paginate(30)->withQueryString()//with diguanakan untuk mengatasi N+1 problem
            
         ]);
    }
}
