<?php

namespace App\Http\Controllers;

use App\Models\Dataentry;
use App\Models\Codesample;
use Illuminate\Http\Request;

class AuthSurfaceWaterController extends Controller
{
    public function index()
    {
        $grafiks = Dataentry::with('user')
            ->filter(request(['fromDate', 'search']))
            ->paginate(30)
            ->withQueryString();
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
            if ($suhu1[] = $grafik->temperatur === 'error') {
                //   $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
                $suhu[] = '';
            } elseif ($suhu1[] = $grafik->temperatur != 'error') {
                //  $tanggal[] = date('d-m-Y', strtotime($grafik->date));
                $suhu[] = $suhu1[] = doubleval($grafik->temperatur);
            }
            if ($conductivity1[] = $grafik->conductivity === 'error') {
                // $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
                $conductivity[] = '';
            } elseif ($conductivity1[] = $grafik->conductivity != 'error') {
                // $tanggal[] = date('d-m-Y', strtotime($grafik->date));
                $conductivity[] = $conductivity1[] = doubleval($grafik->conductivity);
            }
            if ($tds1[] = $grafik->tds === 'error') {
                $tds[] = '';
                // $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
            } elseif ($tds1[] = $grafik->tds != 0.1) {
                $tds[] = $tds1[] = doubleval($grafik->tds);
                // $tanggal[] = date('d-m-Y', strtotime($grafik->date));
            }
            if ($tss1[] = $grafik->tss === 'error') {
                //  $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
                $tss[] = '';
            } elseif ($tss1[] = $grafik->tss != 0.1) {
                $tss[] = $tss1[] = doubleval($grafik->tss);
                // $tanggal[] = date('d-m-Y', strtotime($grafik->date));
                # code...
            }
            if ($ph1[] = $grafik->ph === 'error') {
                // $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
                $ph[] = '';
            } elseif ($ph1[] = $grafik->ph != 0.1) {
                $ph[] = $ph1[] = doubleval($grafik->ph); # code...
                // $tanggal[] = date('d-m-Y', strtotime($grafik->date));
            }

            // $tanggal[] = date('d-m-Y', strtotime($grafik->date));
        }

        return view('Auth.SurfaceWater.index', [
            'code_units' => Codesample::all(),
            'tittle' => 'Surface Water',
            'breadcrumb' => 'Surface Water',
            'date' => $tanggal,
            'suhu' => $suhu,
            'conductivity' => $conductivity,
            'tds' => $tds,
            'tss' => $tss,
            'ph' => $ph,
            'Input' => Dataentry::with('user')
                ->filter(request(['fromDate', 'search']))
                ->paginate(30)
                ->withQueryString(), //with diguanakan untuk mengatasi N+1 problem
        ]);
    }
}
