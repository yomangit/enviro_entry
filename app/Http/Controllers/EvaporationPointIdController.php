<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaporationpointid;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportEvaporationPoinId;
use App\Imports\ImportEvaporationPoinId;

class EvaporationPointIdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.Weather.Evaporation.PointId.index', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'Codes' => Evaporationpointid::where('user_id', auth()->user()->id)->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString()
        ]);
    }
    public function ExportEvaporationPoinId()
    {

        return Excel::download(new ExportEvaporationPoinId, 'Point ID Rainfall.csv');
    }
    public function ImportEvaporationPoinId(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportEvaporationPoinId;

        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/weather/evaporation/evaporationpointid')->with('success', 'Point ID has been Imported!');
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
        return view('dashboard.Weather.Evaporation.PointId.create', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'Codes' => Evaporationpointid::where('user_id', auth()->user()->id)->get()
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
            'nama' => 'required|max:255|unique:evaporationpointids',
            'lokasi' => 'required|max:255'
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        Evaporationpointid::create($validatedData);
        return redirect('/weather/evaporation/evaporationpointid/create')->with('success', 'New Point ID has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evaporationpointid  $evaporationpointid
     * @return \Illuminate\Http\Response
     */
    public function show(Evaporationpointid $evaporationpointid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evaporationpointid  $evaporationpointid
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaporationpointid $evaporationpointid)
    {
        return view('dashboard.Weather.Evaporation.PointId.edit', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'PointID' => $evaporationpointid
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evaporationpointid  $evaporationpointid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evaporationpointid $evaporationpointid)
    {
        $rules = [
            'nama' => 'required|max:255',
            'lokasi' => 'required|max:255',
        ];
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        Evaporationpointid::where('id', $evaporationpointid->id)
            ->update($validatedData);
        return redirect('/weather/evaporation/evaporationpointid')->with('success', 'Point ID has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evaporationpointid  $evaporationpointid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaporationpointid $evaporationpointid)
    {
        Evaporationpointid::destroy($evaporationpointid->id);
        return redirect('/weather/evaporation/evaporationpointid')->with('success', 'Point ID has been deleted!');
    }
}
