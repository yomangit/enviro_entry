<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PointIdDrinkwater;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\QualityStandardMarine;
use App\Exports\ExportQualityStandardMarine;
use App\Imports\ImportQualityStandardMarine;

class QualityStandardMarineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.SurfaceWater.Marine.QualityStandard.index',[
            'tittle'=>'Quality Standard',
            'code_units'=>PointIdDrinkwater::all(),
            'breadcrumb'=>'Quality Standard',
            'QualityStd'=>QualityStandardMarine::where('user_id',auth()->user()->id)->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString(),
            // 'QualityStandard'=>QualityStdDrinkWater::where('user_id',auth()->user()->id)->paginate(10)->withQueryString()
        ]);
    }
    public function ExportQualityStandardMarine()
    {

        return Excel::download(new ExportQualityStandardMarine, 'Quality Standard Marine.csv');
    }
    public function ImportQualityStandardMarine(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportQualityStandardMarine;
        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/surfacewater/marinesurfacewater/quality')->with('success', 'Data has been Imported!');
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
        return view('dashboard.SurfaceWater.Marine.QualityStandard.create',[
            'tittle'=>'Quality Standard',
            'code_units'=>PointIdDrinkwater::all(),
            'breadcrumb'=>'Quality Standard',
            'QualityStd'=>QualityStandardMarine::where('user_id',auth()->user()->id)->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString(),
            // 'QualityStandard'=>QualityStdDrinkWater::where('user_id',auth()->user()->id)->paginate(10)->withQueryString()
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

            'nama'=>'required',
            'clarity'=>'required',
            'temperature_water'=>'required',
            'garbage'=>'required',
            'oil_ayer'=>'required',
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
            'total_petroleum_hydrocarbons'=>'required'
        ]);
        $validatedData['user_id']=auth()->user()->id;
        QualityStandardMarine::create($validatedData);
        return redirect('/surfacewater/marinesurfacewater/quality/create')->with('success','New Data  has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QualityStandardMarine  $quality
     * @return \Illuminate\Http\Response
     */
    public function show(QualityStandardMarine $quality)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QualityStandardMarine  $quality
     * @return \Illuminate\Http\Response
     */
    public function edit(QualityStandardMarine $quality)
    {
        return view('dashboard.SurfaceWater.Marine.QualityStandard.edit',[
            'tittle'=>'Quality Standard',
            'breadcrumb'=>'Quality Standard',
            'code_units'=>PointIdDrinkwater::all(),
            'QualityStandardMarine'=>$quality

            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QualityStandardMarine  $quality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QualityStandardMarine $quality)
    {
        $rules = [
            'nama'=>'required',
            'clarity'=>'required',
            'temperature_water'=>'required',
            'garbage'=>'required',
            'oil_ayer'=>'required',
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
            'total_petroleum_hydrocarbons'=>'required'
        ];



        $validatedData = $request->validate($rules);
        $validatedData['user_id']=auth()->user()->id;
        QualityStandardMarine::where('id', $quality->id)
            ->update($validatedData);
        return redirect('/surfacewater/marinesurfacewater/quality')->with('success', ' Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QualityStandardMarine  $quality
     * @return \Illuminate\Http\Response
     */
    public function destroy(QualityStandardMarine $quality)
    {
        QualityStandardMarine::destroy($quality->id);
        return redirect('/surfacewater/marinesurfacewater/quality')->with('success','Data has been deleted!');
    }
}
