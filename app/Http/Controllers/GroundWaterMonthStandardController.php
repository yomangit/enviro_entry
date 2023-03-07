<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\GroundWaterMonthStandard;
use App\Exports\ExportStandardGroundwater;
use App\Imports\ImportStandardGroundwater;

class GroundWaterMonthStandardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.GroundWater.Standard.index',[
            "tittle"=>"Ground Water table Standard",
            'breadcrumb'=>'Ground Water table Standard',
            'MonthStandard'=>GroundWaterMonthStandard::with('user')->latest()->filter(request(['fromDate','search']))->paginate(30)->withQueryString()//with diguanakan untuk mengatasi N+1 problem
            
         ]);
    }
    public function ExportStandardGroundwater()
    {

        return Excel::download(new ExportStandardGroundwater, 'Gw Monthly Standard.csv');
    }
    public function ImportStandardGroundwater(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportStandardGroundwater;

        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/groundwater/standard')->with('success', 'Point ID has been Imported!');
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
        return view('dashboard.GroundWater.Standard.create',[
            "tittle"=>"Table Standard",
            'MonthStandard'=>GroundWaterMonthStandard::where('user_id',auth()->user()->id)->filter(request(['fromDate']))->get()
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
            "nama"=>'required',
            "conductivity"=>'required',
            "total_dissolved_solids_tds"=>'required',
            "total_suspended_solids_tss"=>'required',
            "turbidity"=>'required',
            "hardness"=>'required',
            "alkalinity"=>'required',
            "temperature"=>'required',
            "salinity"=>'required',
            "dissolved_oxygen_do"=>'required',
            "colour"=>'required',
            "odour"=>'required',
            "taste"=>'required',
            "ph"=>'required',
            "chloride_cl"=>'required',
            "fluoride_f"=>'required',
            "residual_chlorine"=>'required',
            "sulphate_so4"=>'required',
            "sulphite_h2s"=>'required',
            "free_cyanide_fcn"=>'required',
            "total_cyanide_cn_tot"=>'required',
            "wad_cyanide_cn_wad"=>'required',
            "ammonium_nh4"=>'required',
            "ammonia_n_nh3"=>'required',
            "nitrate_no3"=>'required',
            "nitrite_no2"=>'required',
            "phosphate_po4"=>'required',
            "aluminium_al"=>'required',
            "antimony_sb"=>'required',
            "arsenic_as"=>'required',
            "barium_ba"=>'required',
            "cadmium_cd"=>'required',
            "chromium_cr"=>'required',
            "chromium_hexavalent_cr6"=>'required',
            "cobalt_co"=>'required',
            "copper_cu"=>'required',
            "iron_fe"=>'required',
            "manganese_mn"=>'required',
            "lead_pb"=>'required',
            "mercury_hg"=>'required',
            "nickel_ni"=>'required',
            "selenium_se"=>'required',
            "silver_ag"=>'required',
            "zinc_zn"=>'required',
            "aluminium_t_al"=>'required',
            "arsenic_t_as"=>'required',
            "cadmium_t_cd"=>'required',
            "chromium_hexavalent_t_cr6"=>'required',
            "chromium_t_cr"=>'required',
            "cobalt_t_co"=>'required',
            "copper_t_cu"=>'required',
            "lead_t_pb"=>'required',
            "selenium_t_se"=>'required',
            "mercury_t_hg"=>'required',
            "nickel_t_ni"=>'required',
            "zinc_t_zn"=>'required',
            "bod"=>'required',
            "cod"=>'required',
            "oil_and_grease"=>'required',
            "phenols"=>'required',
            "permanganate_number_as_kmno4"=>'required',
            "surfactant_mbas"=>'required',
            "benzene"=>'required',
            "chloroform"=>'required',
            "2_4_6_trichloropenol"=>'required',
            "2_4_d"=>'required',
            "pentachlorophenol"=>'required',
            "total_pesticides"=>'required',
            "chlordane_total_isomer"=>'required',
            "dieldrin"=>'required',
            "aldrin"=>'required',
            "fecal_coliform"=>'required',
            "e_coli"=>'required',
            "total_coliform_bacteria"=>'required',
            
        ]);
       
        $validatedData['user_id']=auth()->user()->id;
        GroundWaterMonthStandard::create($validatedData);
        return redirect('/groundwater/standard/create')->with('success','New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroundWaterMonthStandard  $standard
     * @return \Illuminate\Http\Response
     */
    public function show(GroundWaterMonthStandard $standard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroundWaterMonthStandard  $standard
     * @return \Illuminate\Http\Response
     */
    public function edit(GroundWaterMonthStandard $standard)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        return view('dashboard.GroundWater.Standard.edit',[
            "tittle"=>"Table Standard",
            'MonthStandard'=>$standard
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GroundWaterMonthStandard  $standard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroundWaterMonthStandard $standard)
    {
        $rules = [
            "nama"=>'required',
            "conductivity"=>'required',
            "total_dissolved_solids_tds"=>'required',
            "total_suspended_solids_tss"=>'required',
            "turbidity"=>'required',
            "hardness"=>'required',
            "alkalinity"=>'required',
            "temperature"=>'required',
            "salinity"=>'required',
            "dissolved_oxygen_do"=>'required',
            "colour"=>'required',
            "odour"=>'required',
            "taste"=>'required',
            "ph"=>'required',
            "chloride_cl"=>'required',
            "fluoride_f"=>'required',
            "residual_chlorine"=>'required',
            "sulphate_so4"=>'required',
            "sulphite_h2s"=>'required',
            "free_cyanide_fcn"=>'required',
            "total_cyanide_cn_tot"=>'required',
            "wad_cyanide_cn_wad"=>'required',
            "ammonium_nh4"=>'required',
            "ammonia_n_nh3"=>'required',
            "nitrate_no3"=>'required',
            "nitrite_no2"=>'required',
            "phosphate_po4"=>'required',
            "aluminium_al"=>'required',
            "antimony_sb"=>'required',
            "arsenic_as"=>'required',
            "barium_ba"=>'required',
            "cadmium_cd"=>'required',
            "chromium_cr"=>'required',
            "chromium_hexavalent_cr6"=>'required',
            "cobalt_co"=>'required',
            "copper_cu"=>'required',
            "iron_fe"=>'required',
            "manganese_mn"=>'required',
            "lead_pb"=>'required',
            "mercury_hg"=>'required',
            "nickel_ni"=>'required',
            "selenium_se"=>'required',
            "silver_ag"=>'required',
            "zinc_zn"=>'required',
            "aluminium_t_al"=>'required',
            "arsenic_t_as"=>'required',
            "cadmium_t_cd"=>'required',
            "chromium_hexavalent_t_cr6"=>'required',
            "chromium_t_cr"=>'required',
            "cobalt_t_co"=>'required',
            "copper_t_cu"=>'required',
            "lead_t_pb"=>'required',
            "selenium_t_se"=>'required',
            "mercury_t_hg"=>'required',
            "nickel_t_ni"=>'required',
            "zinc_t_zn"=>'required',
            "bod"=>'required',
            "cod"=>'required',
            "oil_and_grease"=>'required',
            "phenols"=>'required',
            "permanganate_number_as_kmno4"=>'required',
            "surfactant_mbas"=>'required',
            "benzene"=>'required',
            "chloroform"=>'required',
            "2_4_6_trichloropenol"=>'required',
            "2_4_d"=>'required',
            "pentachlorophenol"=>'required',
            "total_pesticides"=>'required',
            "chlordane_total_isomer"=>'required',
            "dieldrin"=>'required',
            "aldrin"=>'required',
            "fecal_coliform"=>'required',
            "e_coli"=>'required',
            "total_coliform_bacteria"=>'required',
        ];

        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        GroundWaterMonthStandard::where('id', $standard->id)
            ->update($validatedData);
        return redirect('/groundwater/standard')->with('success', ' Data  has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroundWaterMonthStandard  $standard
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroundWaterMonthStandard $standard)
    {
        GroundWaterMonthStandard::destroy($standard->id);
        return redirect('/groundwater/standard')->with('success','Data has been deleted!');
    }
}
