<?php

namespace App\Http\Controllers;

use App\Models\Ambien;
use Illuminate\Http\Request;
use App\Exports\ExportAmbien;
use App\Imports\ImportAmbien;
use App\Models\AmbienPointid;
use App\Models\AmbienQualityStd;
use Maatwebsite\Excel\Facades\Excel;

class AmbienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.AirQuality.Ambien.index', [
            'tittle'=>'Ambien',
            'code_units'=>AmbienPointid::all(),
            'breadcrumb'=>'Ambien',
            'Ambien'=>Ambien::where('user_id',auth()->user()->id)->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString(),
            'QualityStandard'=>AmbienQualityStd::where('user_id',auth()->user()->id)->paginate(10)->withQueryString()
        ]);
    }
    public function ExportAmbien()
    {
        return Excel::download(new ExportAmbien(), 'Ambien.csv');
    }
    public function ImportAmbien(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        try{
            Excel::import(new ImportAmbien(), public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/airquality/ambien')->with('success', 'New Data has been Imported!');
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
        return view('dashboard.AirQuality.Ambien.create', [
            'tittle'=>'Ambien',
            'code_units'=>AmbienPointid::all(),
            'breadcrumb'=>'Ambien',
            'Ambien'=>Ambien::where('user_id',auth()->user()->id)->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString()
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
            'date'=>'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
        Ambien::create($validatedData);
        return redirect('/airquality/ambien/create')->with('success', 'New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ambien  $ambien
     * @return \Illuminate\Http\Response
     */
    public function show(Ambien $ambien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ambien  $ambien
     * @return \Illuminate\Http\Response
     */
    public function edit(Ambien $ambien)
    {
        return view('dashboard.AirQuality.Ambien.edit', [
            'tittle'=>'Ambien',
            'code_units'=>AmbienPointid::all(),
            'breadcrumb'=>'Ambien',
            'Ambien'=>$ambien
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ambien  $ambien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ambien $ambien)
    {
        $rules = [
            'point_id' => 'required',
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
            'date'=>'required'
        ];



        $validatedData = $request->validate($rules);
        $validatedData['user_id']=auth()->user()->id;
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
        Ambien::where('id', $ambien->id)
            ->update($validatedData);
        return redirect('/airquality/ambien')->with('success', ' Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ambien  $ambien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ambien $ambien)
    {
        Ambien::destroy($ambien->id);
        return redirect('/airquality/ambien')->with('success','Data has been deleted!');
    }
}
