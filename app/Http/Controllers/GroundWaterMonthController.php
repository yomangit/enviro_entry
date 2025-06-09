<?php

namespace App\Http\Controllers;

use App\Models\Codesamplegw;
use Illuminate\Http\Request;
use App\Exports\exportMonthlyGW;
use App\Imports\ImportMonthlyGW;
use App\Models\GroundWaterMonth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\GroundWaterMonthStandard;

class GroundWaterMonthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        return view('dashboard.GroundWater.Month.index',[
            "tittle"=>"Ground Water Monthly",
            'breadcrumb'=>'Ground Water Monthly',
            'code_units'=>Codesamplegw::all(),
            'MonthStandard'=>GroundWaterMonthStandard::all(),
            'GroundwaterMonthly'=>GroundWaterMonth::with('user')->latest()->filter(request(['fromDate','search']))->paginate(30)->withQueryString()
=======

        $firstDayofPreviousMonth = doubleval(strtotime(request('fromDate')));
        $lastDayofPreviousMonth = doubleval(strtotime(request('toDate')));
        if (empty($firstDayofPreviousMonth)) {
            $table = 30;
        } else
            $table = ($lastDayofPreviousMonth - $firstDayofPreviousMonth) / 86400;
        $grafiks = GroundWaterMonth::with('user')->orderBy('date','desc')->filter(request(['fromDate', 'search','search1','search2']))->paginate($table)->withQueryString();
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
            $tanggal[] = date('d-M-Y', strtotime($grafik->date));

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
            if (is_numeric($grafik->do)) {
                $do[] =  doubleval($grafik->do); # code...

            } else {
                $do[] = '';
            }




            if (!is_numeric($grafik->ph)) {
                $phMax[] = '';
                $phMin[] = '';
            } 
            elseif (is_numeric($grafik->ph)) 
            {
                $phMax[] = 9;
                $phMin[] = 6;
            } 


            if (!is_numeric($grafik->conductivity)) {
                $conductivityStandard[] = '';
            } 
            if (is_numeric($grafik->conductivity)) {
                $conductivityStandard[] = doubleval($grafik->standard->conductivity);
            } else {
                $conductivityStandard[] = '';
            }

          
            if (!is_numeric($grafik->total_dissolved_solids_tds)) {

                $tdsStandard[] = '';
            } 
            if ($grafik->total_dissolved_solids_tds) {
                $tdsStandard[] = doubleval($grafik->standard->total_dissolved_solids_tds);
            } else {
                $tdsStandard[] = '';
            }

            if (is_numeric($grafik->standard->total_suspended_solids_tss)) {
                $tssStandard[] = doubleval($grafik->standard->total_suspended_solids_tss);
            } else {
                $tssStandard[] = '';
            }
            if (is_numeric($grafik->do)) {
                $doStandard[] = doubleval($grafik->standard->total_suspended_solids_tss);
            } else if (!is_numeric($grafik->standard->total_suspended_solids_tss)) {
                $doStandard[] = '';
            }
        }

        return view('dashboard.GroundWater.Month.index',[
            "tittle"=>"Ground Water Monthly",
            'breadcrumb'=>'Ground Water Monthly',
            'date' => $tanggal,
            'suhu' => $suhu,
            'conductivity' => $conductivity,
            'tds' => $tds,
            'tss' => $tss,
            'ph' => $ph,
            'point'=> $nama,
            'do' => $do,
            'doStandard' => $doStandard,
            'tssStandard' => $tssStandard,
            'tdsStandard' => $tdsStandard,
            'cdvStd' => $conductivityStandard,
            'phMin' => $phMin,
            'phMax' => $phMax,
            'code_units'=>Codesamplegw::all(),
            'MonthStandard'=>GroundWaterMonthStandard::all(),
            'GroundwaterMonthly'=>GroundWaterMonth::with('user')->orderBy('date','desc')->filter(request(['fromDate', 'search','search1','search2']))->paginate($table)->withQueryString()
>>>>>>> d0a6326defbeba8c21bdbfff3da64407ba3b31e3
            
         ]);
    }

<<<<<<< HEAD
    public function ExportMonthGroundwater()
    {

        return Excel::download(new exportMonthlyGW, 'Gw Monthly .csv');
    }
=======
    // public function ExportMonthGroundwater()
    // {

    //     return Excel::download(new exportMonthlyGW, 'Gw Monthly .csv');
    // }
>>>>>>> d0a6326defbeba8c21bdbfff3da64407ba3b31e3
    public function ImportMonthGroundwater(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportMonthlyGW;

        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/groundwater/monthly')->with('success', 'Groundwater Monthly has been Imported!');
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
        return view('dashboard.GroundWater.Month.create',[
            "tittle"=>"Ground Water Monthly",
            'breadcrumb'=>'Ground Water Monthly',
            'code_units'=>Codesamplegw::all(),
            'quality_units'=>GroundWaterMonthStandard::all(),
            'GroundwaterMonthly'=>GroundWaterMonth::where('user_id',auth()->user()->id)->latest()->filter(request(['fromDate','search']))->paginate(30)->withQueryString()
            
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
            "point_id"=>'required',
            "standard_id"=>'required',
            "date"=>'required',
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
       
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
        $validatedData['user_id']=auth()->user()->id;
        GroundWaterMonth::create($validatedData);
        return redirect('/groundwater/monthly/create')->with('success','New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroundWaterMonth  $monthly
     * @return \Illuminate\Http\Response
     */
    public function show(GroundWaterMonth $monthly)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroundWaterMonth  $monthly
     * @return \Illuminate\Http\Response
     */
    public function edit(GroundWaterMonth $monthly)
    {
        return view('dashboard.GroundWater.Month.edit',[
            "tittle"=>"Ground Water Monthly",
            'breadcrumb'=>'Ground Water Monthly',
            'code_units'=>Codesamplegw::all(),
            'quality_units'=>GroundWaterMonthStandard::all(),
            'GroundwaterMonthly'=>$monthly
            
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GroundWaterMonth  $monthly
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroundWaterMonth $monthly)
    {
        $rules = [
            "point_id"=>'required',
            "standard_id"=>'required',
            "date"=>'required',
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
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
        $validatedData['user_id'] = auth()->user()->id;
        GroundWaterMonth::where('id', $monthly->id)
            ->update($validatedData);
        return redirect('/groundwater/monthly')->with('success', ' Data  has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroundWaterMonth  $monthly
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroundWaterMonth $monthly)
    {
        GroundWaterMonth::destroy($monthly->id);
        return redirect('/groundwater/monthly')->with('success','Data has been deleted!');
    }
}
