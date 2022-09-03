<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\DischargeManualPointid;
use App\Exports\ExportDischargeManualPointId;
use App\Imports\ImportDischargeManualPointId;

class DischargeManualPointidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.Hydrometric.DischargeManual.PointId.index',[
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'Codes' => DischargeManualPointid::where('user_id', auth()->user()->id)->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString() 
        ]);
    }
    public function ExportDischargeManualPointId()
    {

        return Excel::download(new ExportDischargeManualPointId, 'Point ID Discharge Manual.csv');
    }
    public function ImportDischargeManualPointId(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportDischargeManualPointId;

        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/hydrometric/dischargemanual/pointid')->with('success', 'Point ID has been Imported!');
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
        return view('dashboard.Hydrometric.DischargeManual.PointId.create',[
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'Codes' => DischargeManualPointid::where('user_id', auth()->user()->id)->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString() 
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
            'nama' => 'required|max:255|unique:discharge_manual_pointids',
            'lokasi' => 'required|max:255'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        DischargeManualPointid::create($validatedData);
        return redirect('/hydrometric/dischargemanual/pointid/create')->with('success', 'New Point ID has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DischargeManualPointid  $pointid
     * @return \Illuminate\Http\Response
     */
    public function show(DischargeManualPointid $pointid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DischargeManualPointid  $pointid
     * @return \Illuminate\Http\Response
     */
    public function edit(DischargeManualPointid $pointid)
    {
        return view('dashboard.Hydrometric.DischargeManual.PointId.edit',[
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'PointID' => $pointid
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DischargeManualPointid  $pointid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DischargeManualPointid $pointid)
    {
        $rules = [
            'nama' => 'required|max:255',
            'lokasi' => 'required|max:255',
        ];
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        DischargeManualPointid::where('id', $pointid->id)
            ->update($validatedData);
        return redirect('/hydrometric/dischargemanual/pointid')->with('success', 'Point ID has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DischargeManualPointid  $pointid
     * @return \Illuminate\Http\Response
     */
    public function destroy(DischargeManualPointid $pointid)
    {
        DischargeManualPointid::destroy($pointid->id);
        return redirect('/hydrometric/dischargemanual/pointid')->with('success', 'Point ID has been deleted!');
    }
}
