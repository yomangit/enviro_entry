<?php

namespace App\Http\Controllers;

use App\Exports\ExportSoil;
use App\Imports\ImportSoil;
use App\Models\Soilquality;
use Illuminate\Http\Request;
use App\Models\Soilqualitypointid;
use App\Models\Soilqualitystandard;
use Maatwebsite\Excel\Facades\Excel;

class SoilQualityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.SoilQuality.Master.index', [
            'tittle'=>'Soil Quality',
            'code_units'=>Soilqualitypointid::all(),
            'breadcrumb'=>'Soil Quality',
            'Soil'=>Soilquality::where('user_id',auth()->user()->id)->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString(),
            'QualityStandard'=>Soilqualitystandard::where('user_id',auth()->user()->id)->paginate(10)->withQueryString()
        ]);
    }
    public function ExportSoil()
    {
        return Excel::download(new ExportSoil(), 'Soil Quality.csv');
    }
    public function ImportSoil(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        try{
            Excel::import(new ImportSoil(), public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/soilquality')->with('success', 'New Data has been Imported!');
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
        return view('dashboard.SoilQuality.Master.create', [
            'tittle' => 'Soil Quality',
            'breadcrumb' => 'Soil Quality',
            'code_units'=>Soilqualitypointid::all(),
            'Soil' => Soilquality::where('user_id', auth()->user()->id)->get()
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
            "ph" => "required",
            "ph_h2o" => "required",
            "total_organic_carbon" => "required",
            "total_nitrogen" => "required",
            "cn" => "required",
            "calsium" => "required",
            "magnesium" => "required",
            "pottasium" => "required",
            "sodium" => "required",
            "jumlah" => "required",
            "p2o5_hcl_25" => "required",
            "k2o_hcl_25" => "required",
            "p2o5_olsen" => "required",
            "kapasitas_tukar_kation" => "required",
            "kb_kejenuhan_basa" => "required",
            "al_tukar" => "required",
            "h_tukar" => "required",
            "pasir" => "required",
            "debu" => "required",
            "lempung" => "required",
            "moisture_content" => "required",
            "bulk_density" => "required",
            "ruang_pori_total" => "required",
            "pd" => "required",
            "sangat_cepat" => "required",
            "cepat" => "required",
            "lambat" => "required",
            "air_tersedia" => "required",
            "permeabilitas" => "required",
            "pf_1" => "required",
            "pf_2" => "required",
            "pf_2_54" => "required",
            "pf_4_2" => "required",
            "laboratorium" => "required",
            'date'=>'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
        Soilquality::create($validatedData);
        return redirect('/soilquality/create')->with('success', 'New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soilquality  $soilquality
     * @return \Illuminate\Http\Response
     */
    public function show(Soilquality $soilquality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soilquality  $soilquality
     * @return \Illuminate\Http\Response
     */
    public function edit(Soilquality $soilquality)
    {
        return view('dashboard.SoilQuality.Master.edit', [
            'tittle' => 'Soil Quality',
            'breadcrumb' => 'Soil Quality',
            'code_units'=>Soilqualitypointid::all(),
            'Soil' => $soilquality
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Soilquality  $soilquality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Soilquality $soilquality)
    {
        $rules = [
            'point_id' => 'required',
            "ph" => "required",
            "ph_h2o" => "required",
            "total_organic_carbon" => "required",
            "total_nitrogen" => "required",
            "cn" => "required",
            "calsium" => "required",
            "magnesium" => "required",
            "pottasium" => "required",
            "sodium" => "required",
            "jumlah" => "required",
            "p2o5_hcl_25" => "required",
            "k2o_hcl_25" => "required",
            "p2o5_olsen" => "required",
            "kapasitas_tukar_kation" => "required",
            "kb_kejenuhan_basa" => "required",
            "al_tukar" => "required",
            "h_tukar" => "required",
            "pasir" => "required",
            "debu" => "required",
            "lempung" => "required",
            "moisture_content" => "required",
            "bulk_density" => "required",
            "ruang_pori_total" => "required",
            "pd" => "required",
            "sangat_cepat" => "required",
            "cepat" => "required",
            "lambat" => "required",
            "air_tersedia" => "required",
            "permeabilitas" => "required",
            "pf_1" => "required",
            "pf_2" => "required",
            "pf_2_54" => "required",
            "pf_4_2" => "required",
            "laboratorium" => "required",
            'date'=>'required'
        ];



        $validatedData = $request->validate($rules);
        $validatedData['user_id']=auth()->user()->id;
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
        Soilquality::where('id', $soilquality->id)
            ->update($validatedData);
        return redirect('/soilquality')->with('success', ' Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soilquality  $soilquality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soilquality $soilquality)
    {
        Soilquality::destroy($soilquality->id);
        return redirect('/soilquality')->with('success','Data has been deleted!');
    }
}
