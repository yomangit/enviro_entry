<?php

namespace App\Http\Controllers;

use App\Exports\ExportWL;
use App\Imports\ImportWL;
use Illuminate\Http\Request;
use App\Models\QualityStandard;
use Maatwebsite\Excel\Facades\Excel;

class QualityStandardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.Hydrometric.WaterLevel.QualityStandard.index', [
            'tittle' => 'Quality Standard',
            'breadcrumb' => 'Quality Standard',
            'QualityStandard' => QualityStandard::with('user')->latest()->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString()

        ]);
    }
    public function ExportWL()
    {

        return Excel::download(new ExportWL, 'Water Level Quality Standard.csv');
    }
    public function ImportWL(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportWL;
        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/hydrometric/dischargemanual/standard')->with('success', 'Data has been Imported!');
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
        return view('dashboard.Hydrometric.WaterLevel.QualityStandard.create', [
            'tittle' => 'Quality Standard',
            'breadcrumb' => 'Quality Standard',
            'QualityStandard' => QualityStandard::all()

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
            'tss' => 'required|max:255',
            'ph_max' => 'required|max:255',
            'ph_min' => 'required|max:255',
            'redox' => 'required|max:255',
            'do' => 'required|max:255',
            'tds' => 'required|max:255',
            'conductivity' => 'required|max:255',
            'temperatur' => 'required|max:255',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        QualityStandard::create($validatedData);
        return redirect('/hydrometric/wlvp/qualitystandard/create')->with('success', 'New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QualityStandard  $qualitystandard
     * @return \Illuminate\Http\Response
     */
    public function show(QualityStandard $qualitystandard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QualityStandard  $qualitystandard
     * @return \Illuminate\Http\Response
     */
    public function edit(QualityStandard $qualitystandard)
    {
        return view('dashboard.Hydrometric.WaterLevel.QualityStandard.edit', [
            'tittle' => 'Quality Standard',
            'breadcrumb' => 'Quality Standard',
            'QualityStandard' => $qualitystandard
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QualityStandard  $qualitystandard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QualityStandard $qualitystandard)
    {
        $rules = [
            'tss' => 'required|max:255',
            'ph_max' => 'required|max:255',
            'ph_min' => 'required|max:255',
            'redox' => 'required|max:255',
            'do' => 'required|max:255',
            'tds' => 'required|max:255',
            'conductivity' => 'required|max:255',
            'temperatur' => 'required|max:255',
        ];



        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        QualityStandard::where('id', $qualitystandard->id)
            ->update($validatedData);
        return redirect('/hydrometric/wlvp/qualitystandard')->with('success', ' Point ID Blasting has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QualityStandard  $qualitystandard
     * @return \Illuminate\Http\Response
     */
    public function destroy(QualityStandard $qualitystandard)
    {
        QualityStandard::destroy($qualitystandard->id);
        return redirect('/hydrometric/wlvp/qualitystandard')->with('success', ' Data has been updated!');
    }
}
