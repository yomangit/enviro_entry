<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PointIdMarine;
use App\Models\MarineSurfacewater;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\QualityStandardMarine;
use App\Exports\ExportMarineSurfacewater;
use App\Imports\ImportMarineSurfacewater;

class MarinesurfacewaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {    

        $firstDayofPreviousMonth = doubleval(strtotime(request('fromDate')));
        $lastDayofPreviousMonth = doubleval(strtotime(request('toDate')));
        if (empty($firstDayofPreviousMonth)) {
            $table = 30;
        } else
            $table = ($lastDayofPreviousMonth - $firstDayofPreviousMonth) / 86400;

            $keyword = $request->input('search1');
            $search = $request->input('search');
        
 
             $grafiks = MarineSurfacewater::with('user')->orderBy('date','desc')->filter(request(['fromDate', 'search','search1','search2']))->paginate($table)->withQueryString();
           
     

        
        $tanggal = [];
        $suhu = [];
        $conductivity = [];
        $salinity_in_situ = [];
        $tds = [];
        $nama = [];
        $lokasi = [];
        $tss = [];
        $temperature_water = [];
        $ph = [];
        $turbidity = [];
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
            if (is_numeric($grafik->salinity_in_situ)) {
                $salinity_in_situ[] =  doubleval($grafik->salinity_in_situ); # code...

            } else {
                $salinity_in_situ[] = '';
            }
            if (is_numeric($grafik->turbidity)) {
                $turbidity[] =  doubleval($grafik->turbidity); # code...

            } else {
                $turbidity[] = '';
            }
            if (is_numeric($grafik->temperature_water)) {
                $temperature_water[] =  doubleval($grafik->temperature_water); # code...

            } else {
                $temperature_water[] = '';
            }

      
        }

             $main = MarineSurfacewater::with('user')->orderBy('date','desc')->filter(request(['fromDate', 'search','search1','search2']))->paginate($table)->withQueryString();
           

        return view('dashboard.SurfaceWater.Marine.index',[
            'date' => $tanggal,
            'suhu' => $suhu,
            'conductivity' => $conductivity,
            'tds' => $tds,
            'tss' => $tss,
            'salinity_in_situ' => $salinity_in_situ,
            'ph' => $ph,
            'point' => $nama,
            'turbidity' => $turbidity,
            'temperature_water' => $temperature_water,
            'doStandard' => $doStandard,
            'tssStandard' => $tssStandard,
            'tdsStandard' => $tdsStandard,
            'cdvStd' => $conductivityStandard,
            'phMin' => $phMin,
            'phMax' => $phMax,
            'tittle'=>'Marine',
            'breadcrumb'=>'Marine',
            'code_units'=>PointIdMarine::all(),
            'MarineSurfacewater'=>$main,
            'QualityStandard'=>QualityStandardMarine::all()
        ]);
       
       
    }
  
    public function ExportMarineSurfacewater()
    {

         return Excel::download(new ExportMarineSurfacewater, 'Marine Surfacewater.csv');
    }
    public function ImportMarineSurfacewater(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportMarineSurfacewater;
        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/surfacewater/marinesurfacewater')->with('success', 'Data has been Imported!');
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
  
        return view('dashboard.SurfaceWater.Marine.create',[
            'tittle'=>'Marine',
            'code_units'=>PointIdMarine::all(),
            'breadcrumb'=>'Marine',
            'MarineSurfacewater'=>MarineSurfacewater::where('user_id',auth()->user()->id)->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString()
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
        $validatedData=$request->validate([
            'point_id'=>'required',
            'clarity'=>'required',
            'temperature_water'=>'required',
            'garbage'=>'required',
            'oil_layer'=>'required',
            'odour'=>'required',
            'colour'=>'required',
            'turbidity'=>'required',
            'total_suspended_solids'=>'required',
            'salinity_in_situ'=>'required',
            'total_dissolved_solids'=>'required',
            'conductivity_insitu'=>'required',
            'ph'=>'required',
            'sulphide'=>'required',
            'ammonia_n_nh3'=>'required',
            'nitrate_n_no3'=>'required',
            'total_phosphate_p_po4'=>'required',
            'cyanide_total'=>'required',
            'total_coliform'=>'required',
            'chromium_hexavalent_total_cr_vi'=>'required',
            'arsenic_hydrid_dissolved_as'=>'required',
            'boron_dissolved_b'=>'required',
            'cadmium_dissolved_cd'=>'required',
            'copper_dissolved_cu'=>'required',
            'lead_dissolved_pb'=>'required',
            'nickel_dissolved_ni'=>'required',
            'zinc_dissolved_zn'=>'required',
            'mercury_dissolved_hg'=>'required',
            'biologycal_oxygen_demand'=>'required',
            'dissolved_oxygen'=>'required',
            'oil_grease'=>'required',
            'surfactant'=>'required',
            'total_phenol'=>'required',
            'hydrocarbon'=>'required',
            'tributyl_tin'=>'required',
            'total_poly_chlor_biphenyl'=>'required',
            'poly_aromatic_hydrocarbon'=>'required',
            'total_pesticides_as_organo_chlorine_pesticides'=>'required',
            'benzene_hexa_chloride'=>'required',
            'endrin'=>'required',
            'dichloro_diphenyl_trichloroethane'=>'required',
            'total_petroleum_hydrocarbons'=>'required',
            'date'=>'required'
        ]);
        $validatedData['user_id']=auth()->user()->id;
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
        MarineSurfacewater::create($validatedData);
        return redirect('/surfacewater/marinesurfacewater/create')->with('success','New Data  has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MarineSurfacewater  $marinesurfacewater
     * @return \Illuminate\Http\Response
     */
    public function show(MarineSurfacewater $marinesurfacewater)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MarineSurfacewater  $marinesurfacewater
     * @return \Illuminate\Http\Response
     */
    public function edit(MarineSurfacewater $marinesurfacewater)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        return view('dashboard.SurfaceWater.Marine.edit',[
            'tittle'=>'Marine',
            'breadcrumb'=>'Marine',
            'code_units'=>PointIdMarine::all(),
            'MarineSurfacewater'=>$marinesurfacewater

            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MarineSurfacewater  $marinesurfacewater
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MarineSurfacewater $marinesurfacewater)
    {
        $rules = [
            'point_id'=>'required',
            'clarity'=>'required',
            'temperature_water'=>'required',
            'garbage'=>'required',
            'oil_layer'=>'required',
            'odour'=>'required',
            'colour'=>'required',
            'turbidity'=>'required',
            'total_suspended_solids'=>'required',
            'salinity_in_situ'=>'required',
            'total_dissolved_solids'=>'required',
            'conductivity_insitu'=>'required',
            'ph'=>'required',
            'sulphide'=>'required',
            'ammonia_n_nh3'=>'required',
            'nitrate_n_no3'=>'required',
            'total_phosphate_p_po4'=>'required',
            'cyanide_total'=>'required',
            'total_coliform'=>'required',
            'chromium_hexavalent_total_cr_vi'=>'required',
            'arsenic_hydrid_dissolved_as'=>'required',
            'boron_dissolved_b'=>'required',
            'cadmium_dissolved_cd'=>'required',
            'copper_dissolved_cu'=>'required',
            'lead_dissolved_pb'=>'required',
            'nickel_dissolved_ni'=>'required',
            'zinc_dissolved_zn'=>'required',
            'mercury_dissolved_hg'=>'required',
            'biologycal_oxygen_demand'=>'required',
            'dissolved_oxygen'=>'required',
            'oil_grease'=>'required',
            'surfactant'=>'required',
            'total_phenol'=>'required',
            'hydrocarbon'=>'required',
            'tributyl_tin'=>'required',
            'total_poly_chlor_biphenyl'=>'required',
            'poly_aromatic_hydrocarbon'=>'required',
            'total_pesticides_as_organo_chlorine_pesticides'=>'required',
            'benzene_hexa_chloride'=>'required',
            'endrin'=>'required',
            'dichloro_diphenyl_trichloroethane'=>'required',
            'total_petroleum_hydrocarbons'=>'required',
            'date'=>'required'
        ];



        $validatedData = $request->validate($rules);
        $validatedData['user_id']=auth()->user()->id;
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
        MarineSurfacewater::where('id', $marinesurfacewater->id)
            ->update($validatedData);
        return redirect('/surfacewater/marinesurfacewater')->with('success', ' Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MarineSurfacewater  $marinesurfacewater
     * @return \Illuminate\Http\Response
     */
    public function destroy(MarineSurfacewater $marinesurfacewater)
    {
        MarineSurfacewater::destroy($marinesurfacewater->id);
        return redirect('/surfacewater/marinesurfacewater')->with('success','Data has been deleted!');
    }
}
