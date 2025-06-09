<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmissionPointId;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportEmissionPointId;
use App\Imports\ImportEmissionPointId;

class EmissionPointIdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.AirQuality.Emission.PointId.index', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'Codes' => EmissionPointId::with('user')->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString()
        ]);
    }
    public function ExportEmissionPointId()
    {

        return Excel::download(new ExportEmissionPointId, 'Point ID Discharge Manual.csv');
    }
    public function ImportEmissionPointId(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportEmissionPointId;

        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/airquality/emission/pointid')->with('success', 'Point ID has been Imported!');
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
        return view('dashboard.AirQuality.Emission.PointId.create', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'Codes' => EmissionPointId::where('user_id', auth()->user()->id)->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString()
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
            'nama' => 'required|max:255|unique:emission_point_ids',
            'lokasi' => 'required|max:255'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        EmissionPointId::create($validatedData);
        return redirect('/airquality/emission/pointid/create')->with('success', 'New Point ID has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmissionPointId  $pointid
     * @return \Illuminate\Http\Response
     */
    public function show(EmissionPointId $pointid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmissionPointId  $pointid
     * @return \Illuminate\Http\Response
     */
    public function edit(EmissionPointId $pointid)
    {
        return view('dashboard.AirQuality.Emission.PointId.edit', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'PointID' => $pointid
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmissionPointId  $pointid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmissionPointId $pointid)
    {
        $rules = [
            'nama' => 'required|max:255',
            'lokasi' => 'required|max:255',
        ];
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        EmissionPointId::where('id', $pointid->id)
            ->update($validatedData);
        return redirect('/airquality/emission/pointid')->with('success', 'Point ID has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmissionPointId  $pointid
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmissionPointId $pointid)
    {
        EmissionPointId::destroy($pointid->id);
        return redirect('/airquality/emission/pointid')->with('success', 'Point ID has been deleted!');
    }
}
