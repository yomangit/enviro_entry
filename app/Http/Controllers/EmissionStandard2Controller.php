<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmissionStandard2;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportQualityStandard;
use App\Imports\ImportQualityStandard;

class EmissionStandard2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.AirQuality.Emission.QualityStandard.index', [
            'tittle' => 'Quality Standard',
            'breadcrumb' => 'Quality Standard',
            'QualityStandard' => EmissionStandard2::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString()
        ]);
    }

    public function ExportQualityStandard()
    {

        return Excel::download(new ExportQualityStandard, 'Emission Quality Standard.csv');
    }
    public function ImportQualityStandard(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportQualityStandard;

        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/airquality/emission/standard')->with('success', 'Data has been Imported!');
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
        return view('dashboard.AirQuality.Emission.QualityStandard.create', [
            'tittle' => 'Quality Standard',
            'breadcrumb' => 'Quality Standard',
            'QualityStandard' => EmissionStandard2::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString()
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
            'nama'=>'required',
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
     
        EmissionStandard2::create($validatedData);
        return redirect('/airquality/emission/standard/create')->with('success', 'New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmissionStandard2  $standard
     * @return \Illuminate\Http\Response
     */
    public function show(EmissionStandard2 $standard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmissionStandard2  $standard
     * @return \Illuminate\Http\Response
     */
    public function edit(EmissionStandard2 $standard)
    {
        
        return view('dashboard.AirQuality.Emission.QualityStandard.edit', [
            'tittle' => 'Quality Standard',
            'breadcrumb' => 'Quality Standard',
            'QualityStandard' => $standard
        ]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmissionStandard2  $standard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmissionStandard2 $standard)
    {
        $rules = [
            'nama'=>'required',
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
        EmissionStandard2::where('id', $standard->id)->update($validatedData);
        return redirect('/airquality/emission/standard')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmissionStandard2  $standard
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmissionStandard2 $standard)
    {
        EmissionStandard2::destroy($standard->id);
        return redirect('/airquality/emission/standard')->with('success', 'sData has been deleted!');
    }
}
