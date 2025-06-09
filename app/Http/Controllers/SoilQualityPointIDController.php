<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soilqualitypointid;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportSoilQualityPointId;
use App\Imports\ImportSoilQualityPointId;

class SoilQualityPointIDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.SoilQuality.PointId.index', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'Codes' => Soilqualitypointid::with('user')->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.SoilQuality.PointId.create', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'Codes' => Soilqualitypointid::where('user_id', auth()->user()->id)->get()
        ]);
    }
    public function ExportSoilQualityPointId()
    {

        return Excel::download(new ExportSoilQualityPointId, 'Point ID Discharge Manual.csv');
    }
    public function ImportSoilQualityPointId(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportSoilQualityPointId;

        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/soilquality/soilqualitypointid')->with('success', 'Point ID has been Imported!');
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
            'nama' => 'required|max:255|unique:soilqualitypointids',
            'lokasi' => 'required|max:255'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        Soilqualitypointid::create($validatedData);
        return redirect('/soilquality/soilqualitypointid/create')->with('success', 'New Point ID has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soilqualitypointid  $soilqualitypointid
     * @return \Illuminate\Http\Response
     */
    public function show(Soilqualitypointid $soilqualitypointid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soilqualitypointid  $soilqualitypointid
     * @return \Illuminate\Http\Response
     */
    public function edit(Soilqualitypointid $soilqualitypointid)
    {
        return view('dashboard.SoilQuality.PointId.edit', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'PointID' => $soilqualitypointid
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Soilqualitypointid  $soilqualitypointid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Soilqualitypointid $soilqualitypointid)
    {
        $rules = [
            'nama' => 'required|max:255',
            'lokasi' => 'required|max:255',
        ];
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        Soilqualitypointid::where('id', $soilqualitypointid->id)
            ->update($validatedData);
        return redirect('/soilquality/soilqualitypointid')->with('success', 'Point ID has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soilqualitypointid  $soilqualitypointid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soilqualitypointid $soilqualitypointid)
    {
        Soilqualitypointid::destroy($soilqualitypointid->id);
        return redirect('/soilquality/soilqualitypointid')->with('success', 'Point ID has been deleted!');
    }
}
