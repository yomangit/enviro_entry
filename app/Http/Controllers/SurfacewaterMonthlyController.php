<?php

namespace App\Http\Controllers;

use App\Models\Dataentry;
use App\Models\Codesample;
use Illuminate\Http\Request;
use App\Models\SurfacewaterMonthly;
use App\Imports\MonthlyReportImport;
use App\Models\StandardSurfacewater;
use Maatwebsite\Excel\Facades\Excel;

class SurfacewaterMonthlyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        return view('dashboard.SurfaceWater.Monthly.index',[
=======

        $firstDayofPreviousMonth = doubleval(strtotime(request('fromDate')));
        $lastDayofPreviousMonth = doubleval(strtotime(request('toDate')));
        if (empty($firstDayofPreviousMonth)) {
            $table = 30;
        } else
            $table = ($lastDayofPreviousMonth - $firstDayofPreviousMonth) / 86400;
        $grafiks = SurfacewaterMonthly::orderBy('date','desc')->filter(request(['fromDate', 'search','search1','search2']))->paginate($table)->withQueryString();
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
        $tdsStandard = [];
        $conductivityStandard = [];
        $phMin = [];
        $phMax = [];
        $doStandard = [];

        foreach ($grafiks as $grafik) {
            $nama[] = $grafik->PointId->nama;
            $lokasi[] = $grafik->PointId->lokasi;
            // $doStandard[]=$grafik->standard->do;
            $tanggal[] = date('d-m-Y', strtotime($grafik->date));

            if (is_numeric($grafik->temperature)) {
                $suhu[] = doubleval($grafik->temperature);
            } else {

                $suhu[] = '';
            }


            if (is_numeric($grafik->conductivity)) {
                $conductivity[] =  doubleval($grafik->conductivity);
            } else {

                $conductivity[] = '';
            }
            if (is_numeric($grafik->total_dissolved_solids_tds)) {

                $tds[] =  doubleval($grafik->total_dissolved_solids_tds);
            } else {
                $tds[] = '';
            }
            if (is_numeric($grafik->total_suspended_solids_tss)) {
                $tss[] =  doubleval($grafik->total_suspended_solids_tss);
            } else {
                $tss[] = '';
            }
            if (is_numeric($grafik->ph)) {
                $ph[] =  doubleval($grafik->ph); # code...
                
            } else {
                $ph[] = '';
            }
            if (is_numeric($grafik->dissolved_oxygen_do)) {
                $do[] =  doubleval($grafik->dissolved_oxygen_do); # code...

            } else {
                $do[] = '';
            }


            

            if (!is_numeric($grafik->ph)) {
                $phMax[] = '';
                $phMin[] = '';
            } 
            elseif (is_numeric($grafik->ph) )
            {
               
               
                $phMax[] =  9;
                $phMin[] =  6;
            } 


            if (!is_numeric($grafik->conductivity)) {
                $conductivityStandard[] = '';
            } 
            elseif (is_numeric($grafik->conductivity)) {
                $conductivityStandard[] = doubleval($grafik->standard->conductivity);
            } else {
                $conductivityStandard[] = '';
            }
            if (is_numeric($grafik->total_suspended_solids_tss)) {
                
            if ($grafik->standard->total_suspended_solids_tss) {
                $tssStandard[] = doubleval($grafik->standard->total_suspended_solids_tss);
            } else {
                $tssStandard[] = '';
            }
            }
            if (is_numeric($grafik->total_dissolved_solids_tds)) {
                $tdsStandard[] = doubleval($grafik->standard->total_dissolved_solids_tds);
            } 
            else {
                $tdsStandard[] = '';
            }
        
            if (is_numeric($grafik->dissolved_oxygen_do)) {
                $doStandard[] = doubleval($grafik->standard->dissolved_oxygen_do);
            } else {
                $doStandard[] = '';
            }
        }
       
        return view('dashboard.SurfaceWater.Monthly.index',[
            'date' => $tanggal,
            'suhu' => $suhu,
            'conductivity' => $conductivity,
            'tds' => $tds,
            'tss' => $tss,
            'point' => $nama,
            'ph' => $ph,
            'do' => $do,
            'doStandard' => $doStandard,
            'tssStandard' => $tssStandard,
            'tdsStandard' => $tdsStandard,
            'cdvStd' => $conductivityStandard,
            'phMin' => $phMax,
            'phMax' => $phMin,
>>>>>>> d0a6326defbeba8c21bdbfff3da64407ba3b31e3
            'tittle' => 'Table Monthly ',
            'breadcrumb' => 'Table Monthly ',
            'code_units' => Codesample::all(),
            'MonthStandard' => StandardSurfacewater::all(),
<<<<<<< HEAD
            'Monthly' => SurfacewaterMonthly::orderBy('date', 'desc')
                ->filter(request(['fromDate', 'search']))
                ->paginate(30)
                ->withQueryString()
=======
            'Monthly' => SurfacewaterMonthly::orderBy('date','desc')->filter(request(['fromDate', 'search','search1','search2']))->paginate($table)->withQueryString()
>>>>>>> d0a6326defbeba8c21bdbfff3da64407ba3b31e3
        ]);
    }
    public function ImportMonthlySurfacewater(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new MonthlyReportImport;

        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/surfacewater/monthly')->with('success', 'Surface water Monthly has been Imported!');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $e->failures();
            return back()->withFailures($e->failures());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.SurfaceWater.Monthly.create',[
            'tittle' => 'Table Monthly ',
            'breadcrumb' => 'Table Monthly ',
            'code_units' => Codesample::all(),
            'MonthStandard' => StandardSurfacewater::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'codesample_id' => 'required',
            'standard_id' => 'required',
            'date' => 'required',
            'conductivity' => 'required',
            'total_dissolved_solids_tds' => 'required',
            'total_suspended_solids_tss' => 'required',
            'turbidity' => 'required',
            'hardness' => 'required',
            'temperature' => 'required',
            'colour' => 'required',
            'salinity' => 'required',
            'alkalinity_as_caco3' => 'required',
            'dissolved_oxygen_do' => 'required',
            'alkalinity_total' => 'required',
            'alkalinitycarbonate' => 'required',
            'alkalinitybicarbonate' => 'required',
            'ph' => 'required',
            'chloride_cl' => 'required',
            'free_chlorine' => 'required',
            'fluoride_f' => 'required',
            'sulphate_so4' => 'required',
            'sulphite_h2s' => 'required',
            'free_cyanide_fcn' => 'required',
            'total_cyanide_cn_tot' => 'required',
            'wad_cyanide_cn_wad' => 'required',
            'ammonium_nh4' => 'required',
            'ammonia_nnh3' => 'required',
            'nitrate_no3' => 'required',
            'nitrite_no2' => 'required',
            'phosphate_po4' => 'required',
            'total_nitrogen' => 'required',
            'aluminium_al' => 'required',
            'antimony_sb' => 'required',
            'arsenic_as' => 'required',
            'barium_ba' => 'required',
            'boron_b' => 'required',
            'calcium_ca' => 'required',
            'cadmium_cd' => 'required',
            'chromium_cr' => 'required',
            'chromium_hexavalent_cr6' => 'required',
            'cobalt_co' => 'required',
            'copper_cu' => 'required',
            'iron_fe' => 'required',
            'lead_pb' => 'required',
            'magnesium_mg' => 'required',
            'manganese_mn' => 'required',
            'mercury_hg' => 'required',
            'nickel_ni' => 'required',
            'selenium_se' => 'required',
            'silver_ag' => 'required',
            'sodium_na' => 'required',
            'zinc_zn' => 'required',
            'aluminium_tal' => 'required',
            'arsenic_tas' => 'required',
            'cadmium_tcd' => 'required',
            'chromium_hexavalent_tcr6' => 'required',
            'chromium_tcr' => 'required',
            'cobalt_tco' => 'required',
            'copper_tcu' => 'required',
            'iron_tfe' => 'required',
            'lead_tpb' => 'required',
            'selenium_tse' => 'required',
            'mercury_thg' => 'required',
            'nickel_tni' => 'required',
            'zinc_tzn' => 'required',
            'bod' => 'required',
            'cod' => 'required',
            'oil_and_grease' => 'required',
            'phenols' => 'required',
            'surfactant_mbas' => 'required',
            'benzene_hexa_chloride_bhc' => 'required',
            'endrin' => 'required',
            'dichloro_diphenyl_trichloroethane_ddt' => 'required',
            'fecal_coliform' => 'required',
            'e_coli' => 'required',
            'total_coliform_bacteria' => 'required',
         
        ]);
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
        SurfacewaterMonthly::create($validatedData);
        return redirect('/surfacewater/monthly/create')->with('success','New Monthly report has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SurfacewaterMonthly  $monthly
     * @return \Illuminate\Http\Response
     */
    public function show(SurfacewaterMonthly $monthly)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SurfacewaterMonthly  $monthly
     * @return \Illuminate\Http\Response
     */
    public function edit(SurfacewaterMonthly $monthly)
    {
        return view('dashboard.SurfaceWater.Monthly.edit', [
            'code_units' => Codesample::all(),
            'MonthStandard' => StandardSurfacewater::all(),
            'tittle' => 'Table Monthly',
            'breadcrumb' => 'Table Monthly',
            'Monthly' => $monthly,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SurfacewaterMonthly  $monthly
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SurfacewaterMonthly $monthly)
    {
        $rules = [
            'codesample_id' => 'required',
            'standard_id' => 'required',
            'date' => 'required',
            'conductivity' => 'required',
            'total_dissolved_solids_tds' => 'required',
            'total_suspended_solids_tss' => 'required',
            'turbidity' => 'required',
            'hardness' => 'required',
            'temperature' => 'required',
            'colour' => 'required',
            'salinity' => 'required',
            'alkalinity_as_caco3' => 'required',
            'dissolved_oxygen_do' => 'required',
            'alkalinity_total' => 'required',
            'alkalinitycarbonate' => 'required',
            'alkalinitybicarbonate' => 'required',
            'ph' => 'required',
            'chloride_cl' => 'required',
            'free_chlorine' => 'required',
            'fluoride_f' => 'required',
            'sulphate_so4' => 'required',
            'sulphite_h2s' => 'required',
            'free_cyanide_fcn' => 'required',
            'total_cyanide_cn_tot' => 'required',
            'wad_cyanide_cn_wad' => 'required',
            'ammonium_nh4' => 'required',
            'ammonia_nnh3' => 'required',
            'nitrate_no3' => 'required',
            'nitrite_no2' => 'required',
            'phosphate_po4' => 'required',
            'total_nitrogen' => 'required',
            'aluminium_al' => 'required',
            'antimony_sb' => 'required',
            'arsenic_as' => 'required',
            'barium_ba' => 'required',
            'boron_b' => 'required',
            'calcium_ca' => 'required',
            'cadmium_cd' => 'required',
            'chromium_cr' => 'required',
            'chromium_hexavalent_cr6' => 'required',
            'cobalt_co' => 'required',
            'copper_cu' => 'required',
            'iron_fe' => 'required',
            'lead_pb' => 'required',
            'magnesium_mg' => 'required',
            'manganese_mn' => 'required',
            'mercury_hg' => 'required',
            'nickel_ni' => 'required',
            'selenium_se' => 'required',
            'silver_ag' => 'required',
            'sodium_na' => 'required',
            'zinc_zn' => 'required',
            'aluminium_tal' => 'required',
            'arsenic_tas' => 'required',
            'cadmium_tcd' => 'required',
            'chromium_hexavalent_tcr6' => 'required',
            'chromium_tcr' => 'required',
            'cobalt_tco' => 'required',
            'copper_tcu' => 'required',
            'iron_tfe' => 'required',
            'lead_tpb' => 'required',
            'selenium_tse' => 'required',
            'mercury_thg' => 'required',
            'nickel_tni' => 'required',
            'zinc_tzn' => 'required',
            'bod' => 'required',
            'cod' => 'required',
            'oil_and_grease' => 'required',
            'phenols' => 'required',
            'surfactant_mbas' => 'required',
            'benzene_hexa_chloride_bhc' => 'required',
            'endrin' => 'required',
            'dichloro_diphenyl_trichloroethane_ddt' => 'required',
            'fecal_coliform' => 'required',
            'e_coli' => 'required',
            'total_coliform_bacteria' => 'required',
        ];



        $validatedData = $request->validate($rules);
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
        SurfacewaterMonthly::where('id', $monthly->id)
            ->update($validatedData);
        return redirect('/surfacewater/monthly')->with('success', ' Monthly Report has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SurfacewaterMonthly  $monthly
     * @return \Illuminate\Http\Response
     */
    public function destroy(SurfacewaterMonthly $monthly)
    {
        SurfacewaterMonthly::destroy($monthly->id);
        return redirect('/surfacewater/monthly')->with('success', ' Monthly Report has been deleted!');

    }
}
