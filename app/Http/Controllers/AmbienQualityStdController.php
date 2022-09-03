<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AmbienQualityStd;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportAmbienStandard;
use App\Imports\ImporttAmbienStandard;

class AmbienQualityStdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.AirQuality.Ambien.QualityStandard.index', [
            'tittle'=>'Quality Standard',
            'breadcrumb'=>'Quality Standard',
            'QualityStandard'=>AmbienQualityStd::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate','search']))->paginate(10)->withQueryString()
        ]);
    }

    public function ExportAmbienStandard()
    {

        return Excel::download(new ExportAmbienStandard, 'Ambine Quality Standard.csv');
    }
    public function ImporttAmbienStandard(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImporttAmbienStandard;

        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/airquality/ambien/standard')->with('success', 'Data has been Imported!');
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
        return view('dashboard.AirQuality.Ambien.QualityStandard.create', [
            'tittle'=>'Quality Standard',
            'breadcrumb'=>'Quality Standard',
            'QualityStandard'=>AmbienQualityStd::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate','search']))->paginate(10)->withQueryString()
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
            'sulphur_dioxide_so2' => 'required|max:255',
            'nitrogen_dioxide_no2' => 'required|max:255',
            'carbon_monoxide' => 'required|max:255',
            'ozone' => 'required|max:255',
            'total_suspended_particulate_24_hours' => 'required|max:255',
            'particulate_matter_10' => 'required|max:255',
            'particulate_matter_2_5' => 'required|max:255',
            'temperature_ambient' => 'required|max:255',
            'humidity' => 'required|max:255',
            'wind_speed' => 'required|max:255',
            'wind_direction' => 'required|max:255',
            'weather' => 'required|max:255',
            'barometric_pressure' => 'required|max:255',
            'lead_pb' => 'required|max:255',
            'hydrocarbon' => 'required|max:255',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        AmbienQualityStd::create($validatedData);
        return redirect('/airquality/ambien/standard/create')->with('success', 'New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AmbienQualityStd  $standard
     * @return \Illuminate\Http\Response
     */
    public function show(AmbienQualityStd $standard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AmbienQualityStd  $standard
     * @return \Illuminate\Http\Response
     */
    public function edit(AmbienQualityStd $standard)
    {
        return view('dashboard.AirQuality.Ambien.QualityStandard.edit', [
            'tittle' => 'Quality Standard',
            'breadcrumb' => 'Quality Standard',
            'QualityStandard' => $standard
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AmbienQualityStd  $standard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AmbienQualityStd $standard)
    {
        $rules = [
            'nama' => 'required|max:255',
            'sulphur_dioxide_so2' => 'required|max:255',
            'nitrogen_dioxide_no2' => 'required|max:255',
            'carbon_monoxide' => 'required|max:255',
            'ozone' => 'required|max:255',
            'total_suspended_particulate_24_hours' => 'required|max:255',
            'particulate_matter_10' => 'required|max:255',
            'particulate_matter_2_5' => 'required|max:255',
            'temperature_ambient' => 'required|max:255',
            'humidity' => 'required|max:255',
            'wind_speed' => 'required|max:255',
            'wind_direction' => 'required|max:255',
            'weather' => 'required|max:255',
            'barometric_pressure' => 'required|max:255',
            'lead_pb' => 'required|max:255',
            'hydrocarbon' => 'required|max:255',
        ];



        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        AmbienQualityStd::where('id', $standard->id)
            ->update($validatedData);
        return redirect('/airquality/ambien/standard')->with('success', ' Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AmbienQualityStd  $standard
     * @return \Illuminate\Http\Response
     */
    public function destroy(AmbienQualityStd $standard)
    {
        AmbienQualityStd::destroy($standard->id);
        return redirect('/airquality/ambien/standard')->with('success', ' Data has been updated!');
    }
}
