<?php

namespace App\Http\Controllers;

use App\Models\Emission;
use Illuminate\Http\Request;
use App\Exports\ExportEmission;
use App\Imports\ImportEmission;
use App\Models\EmissionPointId;
use App\Models\EmissionStandard2;
use Maatwebsite\Excel\Facades\Excel;

class EmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.AirQuality.Emission.Master.index', [
            'tittle' => 'Emission',
            'breadcrumb' => 'Emission',
            'code_units'=>EmissionPointId::all(),
            'QualityStandard'=>EmissionStandard2::all(),
            'Emission' => Emission::with('user')->orderBy('date','desc')->filter(request(['fromDate', 'search']))->paginate(30)->withQueryString()
        ]);
    }
    public function ExportEmission()
    {

        return Excel::download(new ExportEmission, 'Emission.csv');
    }
    public function ImportEmission(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportEmission;

        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/airquality/emission')->with('success', 'Data has been Imported!');
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
        return view('dashboard.AirQuality.Emission.Master.create', [
            'tittle' => 'Emission',
            'breadcrumb' => 'Emission',
            'code_units'=>EmissionPointId::all(),
            'Emission' => Emission::where('user_id', auth()->user()->id)->get()
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
            'point_id'=>'required',
            'date'=>'required',
            'engine'=>'required',
            'fuel_type'=>'required',
            'capacity'=>'required',
            'ambient_temperature'=>'required',
            'stack_temperature'=>'required',
            'meter_temperature'=>'required',
            'moisture_content'=>'required',
            'actual_volume_sample'=>'required',
            'standard_volume_sample'=>'required',
            'actual_oxygen_o2'=>'required',
            'velocity_linear'=>'required',
            'dry_molecular_weight'=>'required',
            'actual_stack_flowrate'=>'required',
            'percent_of_isokinetic'=>'required',
            'total_particulate_isokinetic_actual'=>'required',
            'sulfur_dioxide_so2_actual'=>'required',
            'nitrogen_oxide_nox_as_nitrogen_dioxide_no2_actual'=>'required',
            'nitrogen_oxide_nox_actual'=>'required',
            'carbon_monoxide_co_actual'=>'required',
            'carbon_dioxide_co'=>'required',
            'opacity'=>'required',
            'total_particulate_isokinetic'=>'required',
            'sulfur_dioxide_so2'=>'required',
            'nitrogen_oxide_nox_as_nitrogen_dioxide_no2'=>'required',
            'nitrogen_oxide_nox'=>'required',
            'carbon_monoxide_co'=>'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
        Emission::create($validatedData);
        return redirect('/airquality/emission/create')->with('success', 'New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emission  $emission
     * @return \Illuminate\Http\Response
     */
    public function show(Emission $emission)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emission  $emission
     * @return \Illuminate\Http\Response
     */
    public function edit(Emission $emission)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        return view('dashboard.AirQuality.Emission.Master.edit', [
            'tittle' => 'Emission',
            'breadcrumb' => 'Emission',
            'code_units'=>EmissionPointId::all(),
            'Emission' => $emission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emission  $emission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emission $emission)
    {
        $rules = [
            'point_id'=>'required',
            'date'=>'required',
            'engine'=>'required',
            'fuel_type'=>'required',
            'capacity'=>'required',
            'ambient_temperature'=>'required',
            'stack_temperature'=>'required',
            'meter_temperature'=>'required',
            'moisture_content'=>'required',
            'actual_volume_sample'=>'required',
            'standard_volume_sample'=>'required',
            'actual_oxygen_o2'=>'required',
            'velocity_linear'=>'required',
            'dry_molecular_weight'=>'required',
            'actual_stack_flowrate'=>'required',
            'percent_of_isokinetic'=>'required',
            'total_particulate_isokinetic_actual'=>'required',
            'sulfur_dioxide_so2_actual'=>'required',
            'nitrogen_oxide_nox_as_nitrogen_dioxide_no2_actual'=>'required',
            'nitrogen_oxide_nox_actual'=>'required',
            'carbon_monoxide_co_actual'=>'required',
            'carbon_dioxide_co'=>'required',
            'opacity'=>'required',
            'total_particulate_isokinetic'=>'required',
            'sulfur_dioxide_so2'=>'required',
            'nitrogen_oxide_nox_as_nitrogen_dioxide_no2'=>'required',
            'nitrogen_oxide_nox'=>'required',
            'carbon_monoxide_co'=>'required',
        ];
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
        Emission::where('id', $emission->id)
            ->update($validatedData);
        return redirect('/airquality/emission')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emission  $emission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emission $emission)
    {
        Emission::destroy($emission->id);
        return redirect('/airquality/emission')->with('success', 'Data has been deleted!');

    }
}
