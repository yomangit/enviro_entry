<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Blasting;
use App\Models\Mastergw;
use App\Models\Rainfall;
use App\Models\Dataentry;
use App\Models\Wastewater;
use App\Models\Hydrometric;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        
        //PAJAJARAN
        $avg_rainfallPajajaran= Rainfall::with('user')->join('rainfallpointids','rainfalls.point_id','=','rainfallpointids.id')
        ->where('rainfallpointids.nama','=','Pajajaran')->orderBy('date', 'asc')->whereMonth('date', '>', Carbon::now()->subMonth())
        ->orderBy('rainfallpointids.nama','desc')
        ->select('rainfalls.*')->get()->sum('rainfall');
        $avg_yearPajajaran= Rainfall::with('user')->join('rainfallpointids','rainfalls.point_id','=','rainfallpointids.id')
        ->where('rainfallpointids.nama','=','Pajajaran')->orderBy('date', 'asc')->whereYear('date','=', Carbon::now()->format('Y'))
        ->orderBy('rainfallpointids.nama','desc')
        ->select('rainfalls.*')->get()->sum('rainfall');
        //KOPRA
        $avg_rainfallKopra= Rainfall::with('user')->join('rainfallpointids','rainfalls.point_id','=','rainfallpointids.id')
        ->where('rainfallpointids.nama','=','Kopra')->orderBy('date', 'asc')->whereMonth('date', '>', Carbon::now()->subMonth())
        ->orderBy('rainfallpointids.nama','desc')
        ->select('rainfalls.*')->get()->sum('rainfall');
        $avg_yearKopra= Rainfall::with('user')->join('rainfallpointids','rainfalls.point_id','=','rainfallpointids.id')
        ->where('rainfallpointids.nama','=','Kopra')->orderBy('date', 'asc')->whereYear('date','=', Carbon::now()->format('Y'))
        ->orderBy('rainfallpointids.nama','desc')
        ->select('rainfalls.*')->get()->sum('rainfall');
        //MAESA CAMP
        $avg_rainfallMaesa= Rainfall::with('user')->join('rainfallpointids','rainfalls.point_id','=','rainfallpointids.id')
        ->where('rainfallpointids.nama','=','Maesa camp')->orderBy('date', 'asc')->whereMonth('date', '>', Carbon::now()->subMonth())
        ->orderBy('rainfallpointids.nama','desc')
        ->select('rainfalls.*')->get()->sum('rainfall');
        $avg_yearMaesa= Rainfall::with('user')->join('rainfallpointids','rainfalls.point_id','=','rainfallpointids.id')
        ->where('rainfallpointids.nama','=','Maesa camp')->orderBy('date', 'asc')->whereYear('date','=', Carbon::now()->format('Y'))
        ->orderBy('rainfallpointids.nama','desc')
        ->select('rainfalls.*')->get()->sum('rainfall');
        //PLANT SITE
        $avg_rainfallPlant= Rainfall::with('user')->join('rainfallpointids','rainfalls.point_id','=','rainfallpointids.id')
        ->where('rainfallpointids.nama','=','Plant site')->orderBy('date', 'asc')->whereMonth('date', '>', Carbon::now()->subMonth())
        ->orderBy('rainfallpointids.nama','desc')
        ->select('rainfalls.*')->get()->sum('rainfall');
        $avg_yearPlant= Rainfall::with('user')->join('rainfallpointids','rainfalls.point_id','=','rainfallpointids.id')
        ->where('rainfallpointids.nama','=','Plant site')->orderBy('date', 'asc')->whereYear('date','=', Carbon::now()->format('Y'))
        ->orderBy('rainfallpointids.nama','desc')
        ->select('rainfalls.*')->get()->sum('rainfall');
        //ARAREN
        $avg_rainfallAraren= Rainfall::with('user')->join('rainfallpointids','rainfalls.point_id','=','rainfallpointids.id')
        ->where('rainfallpointids.nama','=','Araren')->orderBy('date', 'asc')->whereMonth('date', '>', Carbon::now()->subMonth())
        ->orderBy('rainfallpointids.nama','desc')
        ->select('rainfalls.*')->get()->sum('rainfall');
        $avg_yearAraren= Rainfall::with('user')->join('rainfallpointids','rainfalls.point_id','=','rainfallpointids.id')
        ->where('rainfallpointids.nama','=','Araren')->orderBy('date', 'asc')->whereYear('date','=', Carbon::now()->format('Y'))
        ->orderBy('rainfallpointids.nama','desc')
        ->select('rainfalls.*')->get()->sum('rainfall');
        //ALASKAR
        $avg_rainfallAlaskar= Rainfall::with('user')->join('rainfallpointids','rainfalls.point_id','=','rainfallpointids.id')
        ->where('rainfallpointids.nama','=','Alaskar')->orderBy('date', 'asc')->whereMonth('date', '>', Carbon::now()->subMonth())
        ->orderBy('rainfallpointids.nama','desc')
        ->select('rainfalls.*')->get()->sum('rainfall');
        $avg_yearAlaskar= Rainfall::with('user')->join('rainfallpointids','rainfalls.point_id','=','rainfallpointids.id')
        ->where('rainfallpointids.nama','=','Alaskar')->orderBy('date', 'asc')->whereYear('date','=', Carbon::now()->format('Y'))
        ->orderBy('rainfallpointids.nama','desc')
        ->select('rainfalls.*')->get()->sum('rainfall');
        //TSF
        $avg_rainfallTSF= Rainfall::with('user')->join('rainfallpointids','rainfalls.point_id','=','rainfallpointids.id')
        ->where('rainfallpointids.nama','=','TSF')->orderBy('date', 'asc')->whereMonth('date', '>', Carbon::now()->subMonth())
        ->orderBy('rainfallpointids.nama','desc')
        ->select('rainfalls.*')->get()->sum('rainfall');
        $avg_yearTSF= Rainfall::with('user')->join('rainfallpointids','rainfalls.point_id','=','rainfallpointids.id')
        ->where('rainfallpointids.nama','=','TSF')->orderBy('date', 'asc')->whereYear('date','=', Carbon::now()->format('Y'))
        ->orderBy('rainfallpointids.nama','desc')
        ->select('rainfalls.*')->get()->sum('rainfall');

        $grafiks = Blasting::with('user', 'StandardID')->filter(request(['fromDate', 'search']))->orderBy('date', 'asc')->whereDate('date', '>', Carbon::now()->subMonth())->get();
        $peak_std = [];
        $noise_std = [];
        $noise = [];
        $peak = [];
        $loc = [];
        $name = [];
        $tgl_blas=[];
        foreach ($grafiks as $grafik) {


            $tgl_blas[] = date('d-M-Y', strtotime($grafik->date));

            if (!is_numeric($grafik->peak_vektor)) {
                $peak_std[] = '';
            } elseif (is_numeric($grafik->StandardID->ppv)) {
                $peak_std[] = doubleval($grafik->StandardID->ppv);
            } else {

                $peak_std[] = '';
            }
            if (is_numeric($grafik->peak_vektor)) {
                $peak[] = doubleval($grafik->peak_vektor);
            } else {
                $peak[] = '';
            }



            if (is_numeric($grafik->noise_level)) {
                $noise[] = doubleval($grafik->noise_level);
            } else {
                $noise[] = '';
            }
            if (!is_numeric($grafik->noise_level)) {
                $noise_std[] = '';
            } elseif (is_numeric($grafik->StandardID->noise_level)) {
                $noise_std[] = doubleval($grafik->StandardID->noise_level);
            } else {
                $noise_std[] = '';
            }
        }
        
        $Chart = Hydrometric::with('user', 'standard') ->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString();
        $tanggal = [];
        $suhu = [];
        $conductivity = [];
        $tds = [];
        $nama = [];
        $lokasi = [];
        $tss = [];
        $ph = [];
        $do = [];
        $tssStandard = [];
        $conductivityStandard = [];
        $phMin = [];
        $phMax = [];
        $doStandard = [];

        foreach ($Chart as $grafik) {
            $nama[] = $grafik->CodeSample->nama;
            $lokasi[] = $grafik->CodeSample->lokasi;
            // $doStandard[]=$grafik->standard->do;
            $tanggal[] = date('d-M-Y', strtotime($grafik->date));
            if (is_numeric($grafik->standard->ph_max)) {
                $phMax[] = doubleval($grafik->standard->ph_max);
            } else {
                $phMax[] = '';
            }
            if (is_numeric($grafik->standard->ph_min)) {
                $phMin[] = doubleval($grafik->standard->ph_min);
            } else {
                $phMin[] = '';
            }
            if (is_numeric($grafik->standard->conductivity)) {
                $conductivityStandard[] = doubleval($grafik->standard->conductivity);
            } else {
                $conductivityStandard[] = '';
            }
            if ($grafik->standard->tss) {
                $tssStandard[] = doubleval($grafik->standard->tss);
            } else {
                $tssStandard[] = '';
            }
            if (is_numeric($grafik->standard->do)) {
                $doStandard[] = doubleval($grafik->standard->do);
            } else {
                $doStandard[] = '';
            }


            if (is_numeric($grafik->temperatur)) {
                $suhu[] = doubleval($grafik->temperatur);
            } else {

                $suhu[] = '';
            }
            if (is_numeric($grafik->conductivity)) {
                $conductivity[] =  doubleval($grafik->conductivity);
            } else {

                $conductivity[] = '';
            }
            if (is_numeric($grafik->tds)) {

                $tds[] =  doubleval($grafik->tds);
            } else {
                $tds[] = '';
            }
            if (is_numeric($grafik->tss)) {
                $tss[] =  doubleval($grafik->tss);
            } else {
                $tss[] = '';
            }
            if (is_numeric($grafik->ph)) {
                $ph[] =  doubleval($grafik->ph); # code...

            } else {
                $ph[] = '';
            }
            if (is_numeric($grafik->do)) {
                $do[] =  doubleval($grafik->do); # code...

            } else {
                $do[] = '';
            }
        }
        $Wastewater = Wastewater::with('user')->filter(request(['fromDate', 'search']))->orderBy('date', 'desc')->whereDate('date', '>', Carbon::now()->subMonth())->get();
        $tanggal1 = [];
        $tss = [];
        $tss_std = [];
        $nama_std = [];

        foreach ($Wastewater as $item) {
            $tanggal1[] = date('d-M-Y', strtotime($item->date));
            $nama_std[] = $item->StandardId->nama;
            if (is_numeric($item->totalsuspendedsolids_tss)) {
                $tss[] = doubleval($item->totalsuspendedsolids_tss);
            } else {
                $tss[] = '';
            }
            if (!is_numeric($item->totalsuspendedsolids_tss)) {
                $tss_std[] = '';
            } elseif (is_numeric($item->StandardId->totalsuspendedsolids_tss)) {
                $tss_std[] = doubleval($item->StandardId->totalsuspendedsolids_tss);
            } else {
                $tss_std[] = '';
            }
        }

        
        
        return view('dashboard.index',[
            'tittle'=>'Dashboard',
            'Input' => Dataentry::with('user')->filter(request(['fromDate', 'search']))->paginate(30)->withQueryString(),
            'peak' => $peak,
            'peak_std' => $peak_std,
            'tgl_blas' => $tgl_blas,
            'noise' => $noise,
            'noise_std' => $noise_std,
            'name' => $name,
            'loc' => $loc,
            'date1' => $tanggal1,
            'date' => $tanggal,
            'suhu' => $suhu,
            'conductivity' => $conductivity,
            'tds' => $tds,
            'tss' => $tss,
            'ph' => $ph,
            'do' => $do,
            'doStandard' => $doStandard,
            'tssStandard' => $tssStandard,
            'cdvStd' => $conductivityStandard,
            'phMin' => $phMin,
            'phMax' => $phMax,
            'tss' => $tss,
            'tss_std' => $tss_std,
            'nama_std' => $nama_std,
            'avg_rainfallAlaskar'=>$avg_rainfallAlaskar,
            'avg_yearAlaskar'=>$avg_yearAlaskar,
            'avg_rainfallPajajaran'=>$avg_rainfallPajajaran,
            'avg_yearPajajaran'=>$avg_yearPajajaran,
            'avg_rainfallKopra'=>$avg_rainfallKopra,
            'avg_yearKopra'=>$avg_yearKopra,
            'avg_rainfallMaesa'=>$avg_rainfallMaesa,
            'avg_yearMaesa'=>$avg_yearMaesa,
            'avg_rainfallPlant'=>$avg_rainfallPlant,
            'avg_yearPlant'=>$avg_yearPlant,
            'avg_rainfallAraren'=>$avg_rainfallAraren,
            'avg_yearAraren'=>$avg_yearAraren,
            'avg_rainfallTSF'=>$avg_rainfallTSF,
            'avg_yearTSF'=>$avg_yearTSF,
            'Input' => Dataentry::with('user')->filter(request(['fromDate', 'search']))->paginate(100)->withQueryString(),
            'User' => User::all(),
            'Blasting' => Blasting::all(),
            'Groundwater' => Mastergw::all(),
            
            'Wastewater' => Wastewater::with('user')
            ->filter(request(['fromDate', 'search']))
            ->orderBy('date', 'asc')->whereDate('date', '>', Carbon::now()->subDay())
            ->paginate(1)->withQueryString(),

            'Waste'=>Wastewater::join('wastewaterpointids','wastewaters.point_id','=','wastewaterpointids.id')
            ->where('wastewaterpointids.nama','=','DP-01')->whereDate('date', '>', Carbon::now()->subDay())
            ->orderBy('wastewaterpointids.nama','desc') 
            ->select('wastewaters.*')->get(),

            'Waste2'=>Wastewater::join('wastewaterpointids','wastewaters.point_id','=','wastewaterpointids.id')
            ->where('wastewaterpointids.nama','=','DP-02')->whereDate('date', '>', Carbon::now()->subDay())
            ->orderBy('wastewaterpointids.nama','desc')
            ->select('wastewaters.*')->get(),
            'Waste3'=>Wastewater::join('wastewaterpointids','wastewaters.point_id','=','wastewaterpointids.id')
            ->where('wastewaterpointids.nama','=','DM-01')->whereDate('date', '>', Carbon::now()->subDay())
            ->orderBy('wastewaterpointids.nama','desc')
            ->select('wastewaters.*')->get(),
            //SURFACEWATER
            'Surfacewater1'=>Dataentry::join('codesamples','dataentries.codesample_id','=','codesamples.id')
            ->where('codesamples.nama','=','WQ-13')->whereDate('date', '>', Carbon::now()->subDay())
            ->orderBy('codesamples.nama','desc')
            ->select('dataentries.*')->get(),
            'Surfacewater2'=>Dataentry::join('codesamples','dataentries.codesample_id','=','codesamples.id')
            ->where('codesamples.nama','=','WQ-02')->whereDate('date', '>', Carbon::now()->subDay())
            ->orderBy('codesamples.nama','desc')
            ->select('dataentries.*')->get(),
            'Surfacewater3'=>Dataentry::join('codesamples','dataentries.codesample_id','=','codesamples.id')
            ->where('codesamples.nama','=','WQ-14')->whereDate('date', '>', Carbon::now()->subDay())
            ->orderBy('codesamples.nama','desc')
            ->select('dataentries.*')->get(),




            //PAJAJARAN 
            'Rainfall_pajajaran' => Rainfall::join('rainfallpointids','rainfalls.point_id','=','rainfallpointids.id')
            ->where('rainfallpointids.nama','=','Pajajaran')->whereDate('date', '>', Carbon::now()->subDay())
            ->orderBy('rainfallpointids.nama','desc')
            ->select('rainfalls.*')->get(),
            //KOPRA 
            'Rainfall_kopra' => Rainfall::join('rainfallpointids','rainfalls.point_id','=','rainfallpointids.id')
            ->where('rainfallpointids.nama','=','Kopra')->whereDate('date', '>', Carbon::now()->subDay())
            ->orderBy('rainfallpointids.nama','desc')
            ->select('rainfalls.*')->get(),
            //MAESA CAMP 
            'Rainfall_maesa' => Rainfall::join('rainfallpointids','rainfalls.point_id','=','rainfallpointids.id')
            ->where('rainfallpointids.nama','=','Maesa camp')->whereDate('date', '>', Carbon::now()->subDay())
            ->orderBy('rainfallpointids.nama','desc')
            ->select('rainfalls.*')->get(),
            //PLANT SITE 
            'Rainfall_plan' => Rainfall::join('rainfallpointids','rainfalls.point_id','=','rainfallpointids.id')
            ->where('rainfallpointids.nama','=','Plant site')->whereDate('date', '>', Carbon::now()->subDay())
            ->orderBy('rainfallpointids.nama','desc')
            ->select('rainfalls.*')->get(),
            //ARAREN 
            'Rainfall_araren' => Rainfall::join('rainfallpointids','rainfalls.point_id','=','rainfallpointids.id')
            ->where('rainfallpointids.nama','=','Araren')->whereDate('date', '>', Carbon::now()->subDay())
            ->orderBy('rainfallpointids.nama','desc')
            ->select('rainfalls.*')->get(),
            //ALASKAR 
            'Rainfall_alaskar' => Rainfall::join('rainfallpointids','rainfalls.point_id','=','rainfallpointids.id')
            ->where('rainfallpointids.nama','=','Alaskar')->whereDate('date', '>', Carbon::now()->subDay())
            ->orderBy('rainfallpointids.nama','desc')
            ->select('rainfalls.*')->get(),
            //TSF 
            'Rainfall_tsf' => Rainfall::join('rainfallpointids','rainfalls.point_id','=','rainfallpointids.id')
            ->where('rainfallpointids.nama','=','TSF')->whereDate('date', '>', Carbon::now()->subDay())
            ->orderBy('rainfallpointids.nama','desc')
            ->select('rainfalls.*')->get(),
           


        ]);
    }
}
