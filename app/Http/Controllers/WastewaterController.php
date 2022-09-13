<?php

namespace App\Http\Controllers;

use App\Models\Wastewater;
use Illuminate\Http\Request;
use App\Exports\ExportWastewater;
use App\Imports\ImportWastewater;
use App\Models\Wastewaterpointid;
use App\Models\Wastewaterstandard;
use Maatwebsite\Excel\Facades\Excel;

class WastewaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {

        $firstDayofPreviousMonth = doubleval(strtotime(request('fromDate')));
        $lastDayofPreviousMonth = doubleval(strtotime(request('toDate')));
        if ( empty($firstDayofPreviousMonth) ) {
            $table=30;
        }
        else
        $table = ($lastDayofPreviousMonth-$firstDayofPreviousMonth)/86400;

    $Wastewater = Wastewater::with('user')->filter(request(['fromDate','search']))->paginate($table)->withQueryString();
    $tanggal=[];
    $tss=[];
    $tss_std=[];
    $ph=[];
    $ph_std=[];

    foreach ($Wastewater as $item) 
    {
        $tanggal[] = date('d-M-Y', strtotime($item->date));
        
        if ( is_numeric($item->totalsuspendedsolids_tss) ) {
            $tss[]=doubleval($item->totalsuspendedsolids_tss);
        }
        else
        {
            $tss[]='';
        }
        if ( !is_numeric($item->totalsuspendedsolids_tss) ) {
            $tss_std[]='';
        }
        elseif ( is_numeric($item->StandardId->totalsuspendedsolids_tss) ) {
            $tss_std[]=doubleval($item->StandardId->totalsuspendedsolids_tss);
        }
        else
        {
            $tss_std[]='';
        }


        if ( is_numeric($item->ph) ) {
            $ph[]=doubleval($item->ph);
        }
        else
        {
            $ph[]='';
        }
        if ( !is_numeric($item->ph) ) {
            $ph_std[]='';
        }
        elseif ( is_numeric($item->StandardId->ph) ) {
            $ph_std[]=doubleval($item->StandardId->ph);
        }
        else
        {
            $ph_std[]='';
        }
    }
 
        return view('dashboard.WasteWater.Master.index', [
            'tittle' => 'Waste Water',
            'breadcrumb' => 'Waste Water',
            'tanggal'=>$tanggal,
            'tss'=>$tss,
            'tss_std'=>$tss_std,
            'ph'=>$ph,
            'ph_std'=>$ph_std,
            'code_units'=>Wastewaterpointid::all(),
            'QualityStd' => Wastewaterstandard::all(),
            'Wastewater' => Wastewater::with('user')->orderBy('date','desc')->filter(request(['fromDate','search']))->paginate(30)->withQueryString()
        ]);
    }


    public function ExportWastewater()
    {

        return Excel::download(new ExportWastewater, ' Waste Water.csv');
    }
    public function ImportWastewater(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportWastewater;

        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/wastewater')->with('success', 'Data has been Imported!');
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
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        return view('dashboard.WasteWater.Master.create', [
            'tittle' => 'Waste Water',
            'breadcrumb' => 'Waste Water',
            'Wastewater' => Wastewater::where('user_id', auth()->user()->id)->filter(request(['fromDate','search']))->paginate(30)->withQueryString(),

            'QualityStd' => Wastewaterstandard::where('user_id', auth()->user()->id)->paginate(10)->withQueryString(),
            'code_units'=>Wastewaterpointid::all(),
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
            'point_id' => 'required',
            'standard_id' => 'required',
            'date' => 'required',
            "conductivity"  => 'required',
            "totaldissolvedsolids_tds"  => 'required',
            "totalsuspendedsolids_tss"  => 'required',
            "turbidity"  => 'required',
            "hardness"  => 'required',
            "alkalinity_ascaco3"  => 'required',
            "alkalinitycarbonate"  => 'required',
            "alkalinitybicarbonate"  => 'required',
            "temperature"  => 'required',
            "salinity"  => 'required',
            "dissolvedoxygen_do"  => 'required',
            "ph"  => 'required',
            "alkalinitytotal"  => 'required',
            "chloride_cl"  => 'required',
            "fluoride_f"  => 'required',
            "sulphate_so4"  => 'required',
            "sulphite_h2s"  => 'required',
            "freechlorine_cl2"  => 'required',
            "freecyanide_fcn"  => 'required',
            "totalcyanide_cntot"  => 'required',
            "wadcyanide_cnwad"  => 'required',
            "ammonia_nh4"  => 'required',
            "ammonium_n_nh3"  => 'required',
            "nitrate_no3"  => 'required',
            "nitrite_no2"  => 'required',
            "phosphate_po4"  => 'required',
            "totalphosphate_ppo4"  => 'required',
            "aluminium_al"  => 'required',
            "antimony_sb"  => 'required',
            "arsenic_as"  => 'required',
            "barium_ba"  => 'required',
            "cadmium_cd"  => 'required',
            "calcium_ca"  => 'required',
            "chromium_cr"  => 'required',
            "chromiumhexavalent_cr6"  => 'required',
            "cobalt_co"  => 'required',
            "copper_cu"  => 'required',
            "iron_fe"  => 'required',
            "lead_pb"  => 'required',
            "magnesium_mg"  => 'required',
            "manganese_mn"  => 'required',
            "mercury_hg"  => 'required',
            "nickel_ni"  => 'required',
            "selenium_se"  => 'required',
            "silver_ag"  => 'required',
            "sodium_na"  => 'required',
            "tin_sn"  => 'required',
            "zinc_zn"  => 'required',
            "aluminium_tal"  => 'required',
            "arsenic_tas"  => 'required',
            "cadmium_tcd"  => 'required',
            "chromiumhexavalent_tcr6"  => 'required',
            "chromium_tcr"  => 'required',
            "cobalt_tco"  => 'required',
            "copper_tco"  => 'required',
            "lead_tpb"  => 'required',
            "selenium_tse"  => 'required',
            "mercury_thg"  => 'required',
            "nickel_tni"  => 'required',
            "zinc_tzn"  => 'required',
            "bod"  => 'required',
            "cod"  => 'required',
            "oilandgrease"  => 'required',
            "totalphenols"  => 'required',
            "surfactant_mbas"  => 'required',
            "totalpcb"  => 'required',
            "aox"  => 'required',
            "pcdfs"  => 'required',
            "pcdds"  => 'required',
            "fecalcoliform"  => 'required',
            "ecoli"  => 'required',
            "totalcoliformbacteria"  => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
        Wastewater::create($validatedData);
        
        return redirect('/wastewater/create')->with('success', 'New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wastewater  $wastewater
     * @return \Illuminate\Http\Response
     */
    public function show(Wastewater $wastewater)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wastewater  $wastewater
     * @return \Illuminate\Http\Response
     */
    public function edit(Wastewater $wastewater)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        return view('dashboard.WasteWater.Master.edit', [
            'tittle' => 'Waste Water',
            'breadcrumb' => 'Waste Water',
            'QualityStd' => Wastewaterstandard::where('user_id', auth()->user()->id)->filter(request(['fromDate','search']))->paginate(10)->withQueryString(),

            'code_units'=>Wastewaterpointid::all(),
            'Wastewater' => $wastewater
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wastewater  $wastewater
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wastewater $wastewater)
    {
        $rules = [
            'point_id' => 'required',
            'standard_id' => 'required',
            'date' => 'required',
            "conductivity"  => 'required',
            "totaldissolvedsolids_tds"  => 'required',
            "totalsuspendedsolids_tss"  => 'required',
            "turbidity"  => 'required',
            "hardness"  => 'required',
            "alkalinity_ascaco3"  => 'required',
            "alkalinitycarbonate"  => 'required',
            "alkalinitybicarbonate"  => 'required',
            "temperature"  => 'required',
            "salinity"  => 'required',
            "dissolvedoxygen_do"  => 'required',
            "ph"  => 'required',
            "alkalinitytotal"  => 'required',
            "chloride_cl"  => 'required',
            "fluoride_f"  => 'required',
            "sulphate_so4"  => 'required',
            "sulphite_h2s"  => 'required',
            "freechlorine_cl2"  => 'required',
            "freecyanide_fcn"  => 'required',
            "totalcyanide_cntot"  => 'required',
            "wadcyanide_cnwad"  => 'required',
            "ammonia_nh4"  => 'required',
            "ammonium_n_nh3"  => 'required',
            "nitrate_no3"  => 'required',
            "nitrite_no2"  => 'required',
            "phosphate_po4"  => 'required',
            "totalphosphate_ppo4"  => 'required',
            "aluminium_al"  => 'required',
            "antimony_sb"  => 'required',
            "arsenic_as"  => 'required',
            "barium_ba"  => 'required',
            "cadmium_cd"  => 'required',
            "calcium_ca"  => 'required',
            "chromium_cr"  => 'required',
            "chromiumhexavalent_cr6"  => 'required',
            "cobalt_co"  => 'required',
            "copper_cu"  => 'required',
            "iron_fe"  => 'required',
            "lead_pb"  => 'required',
            "magnesium_mg"  => 'required',
            "manganese_mn"  => 'required',
            "mercury_hg"  => 'required',
            "nickel_ni"  => 'required',
            "selenium_se"  => 'required',
            "silver_ag"  => 'required',
            "sodium_na"  => 'required',
            "tin_sn"  => 'required',
            "zinc_zn"  => 'required',
            "aluminium_tal"  => 'required',
            "arsenic_tas"  => 'required',
            "cadmium_tcd"  => 'required',
            "chromiumhexavalent_tcr6"  => 'required',
            "chromium_tcr"  => 'required',
            "cobalt_tco"  => 'required',
            "copper_tco"  => 'required',
            "lead_tpb"  => 'required',
            "selenium_tse"  => 'required',
            "mercury_thg"  => 'required',
            "nickel_tni"  => 'required',
            "zinc_tzn"  => 'required',
            "bod"  => 'required',
            "cod"  => 'required',
            "oilandgrease"  => 'required',
            "totalphenols"  => 'required',
            "surfactant_mbas"  => 'required',
            "totalpcb"  => 'required',
            "aox"  => 'required',
            "pcdfs"  => 'required',
            "pcdds"  => 'required',
            "fecalcoliform"  => 'required',
            "ecoli"  => 'required',
            "totalcoliformbacteria"  => 'required',
        ];
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
        Wastewater::where('id', $wastewater->id)
            ->update($validatedData);
        return redirect('/wastewater')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wastewater  $wastewater
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wastewater $wastewater)
    {
        Wastewater::destroy($wastewater->id);
        return redirect('/wastewater')->with('success', 'Data has been deleted!');
    }
}
