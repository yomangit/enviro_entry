<?php

namespace App\Http\Controllers;

use App\Exports\CodeHydroExport;
use App\Imports\CodeHydroImport;
use Illuminate\Http\Request;
use App\Models\CodeHydrometric;
use Maatwebsite\Excel\Facades\Excel;

class HydroCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.Hydrometric.WaterLevel.CodeSample.index',[
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'Codes' => CodeHydrometric::with('user')->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString() 
        ]);
    }
    public function ExportCodeHydro()
    {

        return Excel::download(new CodeHydroExport, 'Point ID Hydrometric.csv');
    }
    public function ImportCodeHydro(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new CodeHydroImport;

        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/hydrometric/wlvp/point')->with('success', 'Point ID has been Imported!');
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
        return view('dashboard.Hydrometric.WaterLevel.CodeSample.create',[
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'Codes' => CodeHydrometric::where('user_id', auth()->user()->id)->filter(request(['fromDate']))->get() 

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
            'nama' => 'required|max:255|unique:code_hydrometrics',
            'lokasi' => 'required|max:255'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        CodeHydrometric::create($validatedData);
        return redirect('/hydrometric/wlvp/point/create')->with('success', 'New Point ID has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CodeHydrometric  $point
     * @return \Illuminate\Http\Response
     */
    public function show(CodeHydrometric $point)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CodeHydrometric  $point
     * @return \Illuminate\Http\Response
     */
    public function edit(CodeHydrometric $point)
    {
        return view('dashboard.Hydrometric.WaterLevel.CodeSample.edit',[
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'Codes' => $point
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CodeHydrometric  $point
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CodeHydrometric $point)
    {
        $rules = [
            'nama' => 'required|max:255',
            'lokasi' => 'required|max:255',
        ];
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        CodeHydrometric::where('id', $point->id)
            ->update($validatedData);
        return redirect('/hydrometric/wlvp/point')->with('success', 'Point ID has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CodeHydrometric  $point
     * @return \Illuminate\Http\Response
     */
    public function destroy(CodeHydrometric $point)
    {
        CodeHydrometric::destroy($point->id);
        return redirect('/hydrometric/wlvp/point')->with('success', 'Point ID has been deleted!');
    }
}
