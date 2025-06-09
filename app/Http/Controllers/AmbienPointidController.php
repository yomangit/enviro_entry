<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AmbienPointid;
use App\Exports\ExportAmbienPointId;
use App\Imports\ImportAmbienPointId;
use Maatwebsite\Excel\Facades\Excel;

class AmbienPointidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.AirQuality.Ambien.PointId.index', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'Codes' => AmbienPointid::with('user')->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString() 
        ]);
    }
    public function ExportAmbienPointId()
    {

        return Excel::download(new ExportAmbienPointId, 'Point ID Emission.csv');
    }
    public function ImportAmbienPointId(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportAmbienPointId;

        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/airquality/ambien/pointid')->with('success', 'Point ID has been Imported!');
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
        return view('dashboard.AirQuality.Ambien.PointId.create', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'Codes' => AmbienPointid::where('user_id', auth()->user()->id)->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString() 
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
            'nama' => 'required|max:255|unique:ambien_pointids',
            'lokasi' => 'required|max:255'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        AmbienPointid::create($validatedData);
        return redirect('/airquality/ambien/pointid/create')->with('success', 'New Point ID has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AmbienPointid  $pointid
     * @return \Illuminate\Http\Response
     */
    public function show(AmbienPointid $pointid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AmbienPointid  $pointid
     * @return \Illuminate\Http\Response
     */
    public function edit(AmbienPointid $pointid)
    {
        return view('dashboard.AirQuality.Ambien.PointId.edit', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'PointID' => $pointid
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AmbienPointid  $pointid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AmbienPointid $pointid)
    {
        $rules = [
            'nama' => 'required|max:255',
            'lokasi' => 'required|max:255',
        ];
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        AmbienPointid::where('id', $pointid->id)
            ->update($validatedData);
        return redirect('/airquality/ambien/pointid')->with('success', 'Point ID has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AmbienPointid  $pointid
     * @return \Illuminate\Http\Response
     */
    public function destroy(AmbienPointid $pointid)
    {
        AmbienPointid::destroy($pointid->id);
        return redirect('/airquality/ambien/pointid')->with('success', 'Point ID has been deleted!');
    }
}
