<?php

namespace App\Http\Controllers;

use App\Exports\CodeSampleSWExport;
use App\Exports\CodeSampleTTNExport;
use App\Imports\CodeSampleTTNImport;

use App\Models\Codesamplettn;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Style\ConditionalFormatting\Wizard\Duplicates;

class ResourceCodeSampleTTNController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('dashboard.GroundWater.CodesampleTTN.index', [
            "tittle" => "Code Sample",
            'breadcrumb' => 'Code Sample Groundwell Community',
            'Codes' => Codesamplettn::with('user')->latest()->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString() //with diguanakan untuk mengatasi N+1 problem

        ]);
    }
    public function ExportCodeSampleTTN()
    {

        return Excel::download(new CodeSampleTTNExport, 'codesamplettns.xlsx');
    }
    public function ImportCodeSampleTTN(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        try {
            Excel::import(new CodeSampleTTNImport, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/groundwater/masterttn/codesamplettn')->with('success', 'New Data Ground Water has been Imported!');
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
        return view('dashboard.GroundWater.CodesampleTTN.create', [
            "tittle" => "Code Sample TTN",
            'breadcrumb' => 'Code Sample Groundwell Community',

            'Codes' => Codesamplettn::where('user_id', auth()->user()->id)->filter(request(['fromDate']))->get() //with diguanakan untuk mengatasi N+1 problem

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
            'nama' => 'required|max:255|unique:codesamplettns',
            'lokasi' => 'required|max:255',


        ]);

        $validatedData['user_id'] = auth()->user()->id;
        Codesamplettn::create($validatedData);
        return redirect('/groundwater/masterttn/codesamplettn/create')->with('success', 'New Code Sample TTN has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Codesamplettn  $codesamplettn
     * @return \Illuminate\Http\Response
     */
    public function show(Codesamplettn $codesamplettn)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Codesamplettn  $codesamplettn
     * @return \Illuminate\Http\Response
     */
    public function edit(Codesamplettn $codesamplettn)
    {
        return view('dashboard.GroundWater.CodesampleTTN.edit', [
            "tittle" => "Code Sample TTN",
            'breadcrumb' => 'Code Sample Groundwell Community',
            'Codes' => $codesamplettn
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Codesamplettn  $codesamplettn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Codesamplettn $codesamplettn)
    {


        $rules = [
            'nama' => 'required|max:255|unique:codesamplettns',
            'lokasi' => 'required|max:255',
        ];



        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        Codesamplettn::where('id', $codesamplettn->id)
            ->update($validatedData);
        return redirect('/groundwater/masterttn/codesamplettn')->with('success', ' Code Sample TTN has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Codesamplettn  $codesamplettn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Codesamplettn $codesamplettn)
    {
        Codesamplettn::destroy($codesamplettn->id);
        return redirect('/groundwater/masterttn/codesamplettn')->with('success', 'Code Sample TTN has been deleted!');
    }
}
