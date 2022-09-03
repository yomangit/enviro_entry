<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wastewaterpointid;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportWasteWaterPointId;
use App\Imports\ImportWasteWaterPointId;

class WastewaterPointiDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.WasteWater.PointId.index', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'Codes' => Wastewaterpointid::where('user_id', auth()->user()->id)->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString()
        ]);
    }

    public function ExportWasteWaterPointId()
    {

        return Excel::download(new ExportWasteWaterPointId, 'Point ID Waste Water.csv');
    }
    public function ImportWasteWaterPointId(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportWasteWaterPointId;

        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/wastewater/wastewaterpointid')->with('success', 'Point ID has been Imported!');
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
        return view('dashboard.WasteWater.PointId.create', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'Codes' => Wastewaterpointid::where('user_id', auth()->user()->id)->get()
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
            'nama' => 'required|max:255|unique:soilqualitypointids',
            'lokasi' => 'required|max:255'
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        Wastewaterpointid::create($validatedData);
        return redirect('/wastewater/wastewaterpointid/create')->with('success', 'New Point ID has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wastewaterpointid  $wastewaterpointid
     * @return \Illuminate\Http\Response
     */
    public function show(Wastewaterpointid $wastewaterpointid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wastewaterpointid  $wastewaterpointid
     * @return \Illuminate\Http\Response
     */
    public function edit(Wastewaterpointid $wastewaterpointid)
    {
        return view('dashboard.WasteWater.PointId.edit', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'PointID' => $wastewaterpointid
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wastewaterpointid  $wastewaterpointid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wastewaterpointid $wastewaterpointid)
    {
        $rules = [
            'nama' => 'required|max:255',
            'lokasi' => 'required|max:255',
        ];
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        Wastewaterpointid::where('id', $wastewaterpointid->id)
            ->update($validatedData);
        return redirect('/wastewater/wastewaterpointid')->with('success', 'Point ID has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wastewaterpointid  $wastewaterpointid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wastewaterpointid $wastewaterpointid)
    {
        Wastewaterpointid::destroy($wastewaterpointid->id);
        return redirect('/wastewater/wastewaterpointid')->with('success', 'Point ID has been deleted!');
    }
}
