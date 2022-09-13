<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmissionStandard;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportQualityStandard2;
use App\Imports\ImportQualityStandard2;

class EmissionStandardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.AirQuality.Emission.QualityStandard2.index2', [
            'tittle' => 'Quality Standard',
            'breadcrumb' => 'Quality Standard',
            'QualityStandard' => EmissionStandard::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString(),
        ]);
    }
    public function ExportQualityStandard2()
    {

        return Excel::download(new ExportQualityStandard2, 'Emission Quality Standard 2.csv');
    }
    public function ImportQualityStandard2(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportQualityStandard2;

        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/airquality/emission/standard2')->with('success', 'Data has been Imported!');
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
        return view('dashboard.AirQuality.Emission.QualityStandard2.create2', [
            'tittle' => 'Quality Standard',
            'breadcrumb' => 'Quality Standard',
            'QualityStandard' => EmissionStandard::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString()
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
            'equipment' => 'required',
            'fuel_type' => 'required',
            'capacity' => 'required',
            'ambient_temperature' => 'required',
            'stack_temperature' => 'required',
            'meter_temperature' => 'required',
            'moisture_content' => 'required',
            'actual_volume_sample' => 'required',
            'standard_volume_sample' => 'required',
            'actual_oxygen_o2' => 'required',
            'velocity_linear' => 'required',
            'dry_molecular_weight' => 'required',
            'actual_stack_flowrate' => 'required',
            'percent_of_isokinetic' => 'required',
            'ammonia_nh3' => 'required',
            'chlorine_cl2' => 'required',
            'hydrogen_chloride_hcl' => 'required',
            'hydrogen_fluoride_hf' => 'required',
            'nitrogen_oxide_nox_as_nitrogen_dioxide_no2' => 'required',
            'opacity' => 'required',
            'total_particulate_isokinetic' => 'required',
            'sulfur_dioxide_so2' => 'required',
            'hydrogen_sulphide_h2s' => 'required',
            'mercury_hg' => 'required',
            'arsenic_as' => 'required',
            'antimony_sb' => 'required',
            'cadmium_cd' => 'required',
            'zinc_zn' => 'required',
            'lead_pb' => 'required'

        ]);

        $validatedData['user_id'] = auth()->user()->id;
        EmissionStandard::create($validatedData);
        return redirect('/airquality/emission/standard2/create')->with('success', 'New Data has been added!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmissionStandard  $standard2
     * @return \Illuminate\Http\Response
     */
    public function show(EmissionStandard $standard2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmissionStandard  $standard2
     * @return \Illuminate\Http\Response
     */
    public function edit(EmissionStandard $standard2)
    {
        return view('dashboard.AirQuality.Emission.QualityStandard2.edit2', [
            'tittle' => 'Quality Standard',
            'breadcrumb' => 'Quality Standard',
            'QualityStandard' => $standard2
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmissionStandard  $standard2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmissionStandard $standard2)
    {
        $rules = [
            'nama' => 'required',
            'equipment' => 'required',
            'fuel_type' => 'required',
            'capacity' => 'required',
            'ambient_temperature' => 'required',
            'stack_temperature' => 'required',
            'meter_temperature' => 'required',
            'moisture_content' => 'required',
            'actual_volume_sample' => 'required',
            'standard_volume_sample' => 'required',
            'actual_oxygen_o2' => 'required',
            'velocity_linear' => 'required',
            'dry_molecular_weight' => 'required',
            'actual_stack_flowrate' => 'required',
            'percent_of_isokinetic' => 'required',
            'ammonia_nh3' => 'required',
            'chlorine_cl2' => 'required',
            'hydrogen_chloride_hcl' => 'required',
            'hydrogen_fluoride_hf' => 'required',
            'nitrogen_oxide_nox_as_nitrogen_dioxide_no2' => 'required',
            'opacity' => 'required',
            'total_particulate_isokinetic' => 'required',
            'sulfur_dioxide_so2' => 'required',
            'hydrogen_sulphide_h2s' => 'required',
            'mercury_hg' => 'required',
            'arsenic_as' => 'required',
            'antimony_sb' => 'required',
            'cadmium_cd' => 'required',
            'zinc_zn' => 'required',
            'lead_pb' => 'required'
        ];
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        EmissionStandard::where('id', $standard2->id)
            ->update($validatedData);
        return redirect('/airquality/emission/standard2')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmissionStandard  $standard2
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmissionStandard $standard2)
    {
        EmissionStandard::destroy($standard2->id);
        return redirect('/airquality/emission/standard2')->with('success', 'Data has been deleted!');
    }
}
