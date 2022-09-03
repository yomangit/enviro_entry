<?php

namespace App\Http\Controllers;

use App\Models\Evaporation;
use Illuminate\Http\Request;
use App\Exports\ExportEvaporation;
use App\Imports\ImportEvaporation;
use App\Models\Evaporationpointid;
use Maatwebsite\Excel\Facades\Excel;

class EvaporationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.Weather.Evaporation.Master.index', [
            "tittle" => "Evaporation",
            'breadcrumb' => 'Evaporation',
            'code_units' => Evaporationpointid::all(),
            'Evaporation' => Evaporation::where('user_id', auth()->user()->id)->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.Weather.Evaporation.Master.create', [
            "tittle" => "Evaporation",
            'breadcrumb' => 'Evaporation',
            'code_units' => Evaporationpointid::all(),
            'Evaporation' => Evaporation::where('user_id', auth()->user()->id)->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString()
        ]);
    }

    public function ExportEvaporation()
    {

        return Excel::download(new ExportEvaporation, 'Point ID Rainfall.csv');
    }
    public function ImportEvaporation(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportEvaporation;

        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/weather/evaporation')->with('success', 'Data has been Imported!');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $e->failures();
            return back()->withFailures($e->failures());
        }
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
            'date'=>'required',
            'point_id' => 'required',
            "time_observation" => 'required',
            "day_rainfall" => 'required',
            "initial_water_elevation" => 'required',
            "final_water_elevation" => 'required',

        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
        Evaporation::create($validatedData);
        return redirect('/weather/evaporation/create')->with('success', 'New Point ID has been added!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evaporation  $evaporation
     * @return \Illuminate\Http\Response
     */
    public function show(Evaporation $evaporation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evaporation  $evaporation
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaporation $evaporation)
    {
        return view('dashboard.Weather.Evaporation.Master.edit', [
            "tittle" => "Evaporation",
            'breadcrumb' => 'Evaporation',
            'code_units' => Evaporationpointid::all(),
            'Evaporation' => $evaporation
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evaporation  $evaporation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evaporation $evaporation)
    {
        $rules = [
            'date'=>'required',
            'point_id' => 'required',
            "time_observation" => 'required',
            "day_rainfall" => 'required',
            "initial_water_elevation" => 'required',
            "final_water_elevation" => 'required',
        ];
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
        Evaporation::where('id', $evaporation->id)
            ->update($validatedData);
        return redirect('/weather/evaporation')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evaporation  $evaporation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaporation $evaporation)
    {
        Evaporation::destroy($evaporation->id);
        return redirect('/weather/evaporation')->with('success', 'Data has been deleted!');
    }
}
