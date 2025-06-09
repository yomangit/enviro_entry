<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wastewaterstandard;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportWasteWaterStandard;
use App\Imports\ImportWasteWaterStandard;

class WastewaterStandardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.WasteWater.QualityStandard.index', [
            'tittle' => 'Quality Standard',
            'breadcrumb' => 'Quality Standard',
            'QualityStd' => Wastewaterstandard::with('user')->filter(request(['fromDate','search']))->paginate(10)->withQueryString()
        ]);
    }
    public function ExportWasteWaterStandard()
    {
        return Excel::download(new ExportWasteWaterStandard(), 'Quality Standard Waste Water.csv');
    }
    public function ImportWasteWaterStandard(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        
        try{
            Excel::import(new ImportWasteWaterStandard(), public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/wastewater/wastewaterstandard')->with('success', 'New Data has been Imported!');
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
        return view('dashboard.WasteWater.QualityStandard.create', [
            'tittle' => 'Quality Standard',
            'breadcrumb' => 'Quality Standard',
            'QualityStd' => Wastewaterstandard::where('user_id', auth()->user()->id)->filter(request(['fromDate','search']))->paginate(10)->withQueryString()
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
            'nama' => 'required',
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
            "ph_min"  => 'required',
            "ph_max"  => 'required',
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
        Wastewaterstandard::create($validatedData);
        
        return redirect('/wastewater/wastewaterstandard/create')->with('success', 'New Point ID has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wastewaterstandard  $wastewaterstandard
     * @return \Illuminate\Http\Response
     */
    public function show(Wastewaterstandard $wastewaterstandard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wastewaterstandard  $wastewaterstandard
     * @return \Illuminate\Http\Response
     */
    public function edit(Wastewaterstandard $wastewaterstandard)
    {
        return view('dashboard.WasteWater.QualityStandard.edit', [
            'tittle' => 'Quality Standard',
            'breadcrumb' => 'Quality Standard',
            'QualityStd' => $wastewaterstandard
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wastewaterstandard  $wastewaterstandard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wastewaterstandard $wastewaterstandard)
    {
        $rules = [
            'nama' => 'required',
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
            "ph_min"  => 'required',
            "ph_max"  => 'required',
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
        Wastewaterstandard::where('id', $wastewaterstandard->id)
            ->update($validatedData);
        return redirect('/wastewater/wastewaterstandard')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wastewaterstandard  $wastewaterstandard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wastewaterstandard $wastewaterstandard)
    {
        Wastewaterstandard::destroy($wastewaterstandard->id);
        return redirect('/wastewater/wastewaterstandard')->with('success', 'Data  has been deleted!');
    }
}
