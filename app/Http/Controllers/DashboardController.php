<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Blasting;
use App\Models\Mastergw;
use App\Models\Dataentry;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $grafiks = Dataentry::with('user')->filter(request(['fromDate', 'search']))->paginate(2000)->withQueryString();
        $tanggal = [];
        $suhu = [];
        $conductivity = [];
        $tds = [];
        $nama = [];
        $lokasi = [];
        $tss = [];
        $ph = [];
        $suhu1 = [];
        $conductivity1 = [];
        $tds1 = [];
        $tss1 = [];
        $ph1 = [];
        foreach ($grafiks as $grafik) {
            $nama[] = $grafik->CodeSample->nama;
            $lokasi[] = $grafik->CodeSample->lokasi;
            $tanggal[] = date('d-m-Y', strtotime($grafik->date));
            if ($suhu1[] = $grafik->temperatur === '-') {
                //   $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
                $suhu[] = '';
            } elseif ($suhu1[] = $grafik->temperatur != '-') {
                //  $tanggal[] = date('d-m-Y', strtotime($grafik->date));
                $suhu[] = $suhu1[] = doubleval($grafik->temperatur);
            }
            if ($conductivity1[] = $grafik->conductivity === '-') {
                // $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
                $conductivity[] = '';
            } elseif ($conductivity1[] = $grafik->conductivity != '-') {
                // $tanggal[] = date('d-m-Y', strtotime($grafik->date));
                $conductivity[] = $conductivity1[] = doubleval($grafik->conductivity);
            }
            if ($tds1[] = $grafik->tds === '-') {
                $tds[] = '';
                // $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
            } elseif ($tds1[] = $grafik->tds !='-') {
                $tds[] = $tds1[] = doubleval($grafik->tds);
                // $tanggal[] = date('d-m-Y', strtotime($grafik->date));
            }
            if ($tss1[] = $grafik->tss === '-' ) {
                //  $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
                $tss[] = '';
            } elseif ($tss1[] = $grafik->tss !='-') {
                $tss[] = $tss1[] = doubleval($grafik->tss);
                // $tanggal[] = date('d-m-Y', strtotime($grafik->date));
                # code...
            }
            if ($ph1[] = $grafik->ph === '-') {
                // $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
                $ph[] = '';
            } elseif ($ph1[] = $grafik->ph !='-') {
                $ph[] = $ph1[] = doubleval($grafik->ph); # code...
                // $tanggal[] = date('d-m-Y', strtotime($grafik->date));
            }

            // $tanggal[] = date('d-m-Y', strtotime($grafik->date));
        }

        $blasting = Blasting::with('user')->filter(request(['fromDate', 'search']))->paginate(20)->withQueryString();
        $date = [];
        $peak_std=[];
        $freq = [];
        $peak = [];
        $freq1 = [];
        $peak1 = [];
        foreach ($blasting as $blastings) {

            
            $date[]=date('d-m-Y', strtotime( $blastings->date));
            $peak_std[]= doubleval($blastings->peak_vektor_std);
            if ($freq1[] = $blastings->StandardID->ppv === 'error') {
                //   $date[]=date('d-m-Y', strtotime( $blastings->date));
                $freq[] = '';
            } elseif ($freq1[] =$blastings->StandardID->ppv != 'error') {
                //  $date[] = date('d-m-Y', strtotime($blastings->date));
                $freq[] = $freq1[] = doubleval($blastings->StandardID->ppv);
            }
            if ($peak1[] = $blastings->peak_vektor === 'error') {
                // $date[]=date('d-m-Y', strtotime( $blastings->date));
                $peak[] = '';
            } elseif ($peak1[] =$blastings->peak_vektor != 'error') {
                // $date[] = date('d-m-Y', strtotime($blastings->date));
                $peak[] = $peak1[] = doubleval($blastings->peak_vektor);
            }
        
        }
        return view('dashboard.index',[
            'tittle'=>'Dashboard',
            'Input' => Dataentry::with('user')->filter(request(['fromDate', 'search']))->paginate(30)->withQueryString(),
            'date' => $tanggal,
            'suhu' => $suhu,
            'conductivity' => $conductivity,
            'tds' => $tds,
            'tss' => $tss,
            'ph' => $ph,
            'freq'=>$freq,
            'peak'=>$peak,
            'peak_std'=>$peak_std,
            'tanggal'=>$date,
            'User' => User::all(),
            'Blasting'=>Blasting::all(),
            'Groundwater'=>Mastergw::all()
            
        ]);
    }
}
