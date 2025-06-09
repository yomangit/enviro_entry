<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rainfallpointid;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportRainfallPointId;
use App\Imports\ImportRainfallPointId;

class RainfallPointIdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.Weather.Rainfall.PointId.index', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'Codes' => Rainfallpointid::with('user')->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString()
        ]);
    }
    public function ExportRainfallPointId()
    {

        return Excel::download(new ExportRainfallPointId, 'Point ID Rainfall.csv');
    }
    public function ImportRainfallPointId(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportRainfallPointId;

        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/weather/rainfall/rainfallpointid')->with('success', 'Point ID has been Imported!');
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
        return view('dashboard.Weather.Rainfall.PointId.create', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'Codes' => Rainfallpointid::where('user_id', auth()->user()->id)->get()
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
            'nama' => 'required|max:255|unique:rainfallpointids',
            'lokasi' => 'required|max:255'
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        Rainfallpointid::create($validatedData);
        return redirect('/weather/rainfall/rainfallpointid/create')->with('success', 'New Point ID has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rainfallpointid  $rainfallpointid
     * @return \Illuminate\Http\Response
     */
    public function show(Rainfallpointid $rainfallpointid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rainfallpointid  $rainfallpointid
     * @return \Illuminate\Http\Response
     */
    public function edit(Rainfallpointid $rainfallpointid)
    {
        return view('dashboard.Weather.Rainfall.PointId.edit', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'PointID' => $rainfallpointid
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rainfallpointid  $rainfallpointid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rainfallpointid $rainfallpointid)
    {
        $rules = [
            'nama' => 'required|max:255',
            'lokasi' => 'required|max:255',
        ];
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        Rainfallpointid::where('id', $rainfallpointid->id)
            ->update($validatedData);
        return redirect('/weather/rainfall/rainfallpointid')->with('success', 'Point ID has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rainfallpointid  $rainfallpointid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rainfallpointid $rainfallpointid)
    {
        Rainfallpointid::destroy($rainfallpointid->id);
        return redirect('/weather/rainfall/rainfallpointid')->with('success', 'Point ID has been deleted!');
    }
}
