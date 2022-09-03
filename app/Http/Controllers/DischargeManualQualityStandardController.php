<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportDischargeManualStandard;
use App\Imports\ImportDischargeManualStandard;
use App\Models\DischargeManualQualitystandard;

class DischargeManualQualityStandardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.Hydrometric.DischargeManual.QualityStandard.index',[
            'tittle'=>'Quality Standard',
            'breadcrumb'=>'Quality Standard',
            'QualityStandard'=>DischargeManualQualitystandard::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate','search']))->paginate(10)->withQueryString()
        ]);
    }
    public function ExportDischargeManualStandard()
    {

        return Excel::download(new ExportDischargeManualStandard, 'Discharge Manual Quality Standard.csv');
    }
    public function ImportDischargeManualStandard(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportDischargeManualStandard;
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
        return view('dashboard.Hydrometric.DischargeManual.QualityStandard.create',[
            'tittle'=>'Quality Standard',
            'breadcrumb'=>'Quality Standard',
            'QualityStandard'=>DischargeManualQualitystandard::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate','search']))->paginate(10)->withQueryString()

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
        DischargeManualQualitystandard::create($validatedData);
        return redirect('/hydrometric/dischargemanual/standard/create')->with('success', 'New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DischargeManualQualitystandard  $standard
     * @return \Illuminate\Http\Response
     */
    public function show(DischargeManualQualitystandard $standard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DischargeManualQualitystandard  $standard
     * @return \Illuminate\Http\Response
     */
    public function edit(DischargeManualQualitystandard $standard)
    {
        return view('dashboard.Hydrometric.DischargeManual.QualityStandard.edit',[
            'tittle' => 'Quality Standard',
            'breadcrumb' => 'Quality Standard',
            'QualityStandard' => $standard
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DischargeManualQualitystandard  $standard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DischargeManualQualitystandard $standard)
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
        DischargeManualQualitystandard::where('id', $standard->id)
            ->update($validatedData);
        return redirect('/hydrometric/dischargemanual/standard')->with('success', ' Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DischargeManualQualitystandard  $standard
     * @return \Illuminate\Http\Response
     */
    public function destroy(DischargeManualQualitystandard $standard)
    {
        DischargeManualQualitystandard::destroy($standard->id);
        return redirect('/hydrometric/dischargemanual/standard')->with('success', ' Data has been updated!');
    }
}
