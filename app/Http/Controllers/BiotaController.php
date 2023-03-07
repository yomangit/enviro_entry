<?php

namespace App\Http\Controllers;

use App\Exports\BiotaExport;
use App\Imports\BiotaImport;
use App\Models\Biota;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BiotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.BiotaMonitoring.Biota.index', [
            "tittle" => "Biota",
            'breadcrumb' => 'Biota',
            'Codes' => Biota::with('user')->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString() //with diguanakan untuk mengatasi N+1 problem
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.BiotaMonitoring.Biota.create', [
            "tittle" => "Biota",
            'breadcrumb' => 'Biota',
            'Codes' => Biota::where('user_id', auth()->user()->id)->get() //with diguanakan untuk mengatasi N+1 problem
        ]);
    }
    public function ExportBiota()
    {
        return Excel::download(new BiotaExport,'biotas.xlsx');
    }
    public function ImportBiota(Request $request)
    { 
        $file=$request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase',$nameFile);
        try {
            Excel::import(new BiotaImport, public_path('/EnviroDatabase/'.$nameFile));
            return redirect('/monitoring/freshwater/biota')->with('success','Biota has been Imported!');
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
            'nama' => 'required|max:255|unique:biotas'

        ]);

        $validatedData['user_id'] = auth()->user()->id;
        Biota::create($validatedData);
        return redirect('/monitoring/freshwater/biota/create')->with('success', 'New Biota has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Biota  $biota
     * @return \Illuminate\Http\Response
     */
    public function show(Biota $biotum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Biota  $biota
     * @return \Illuminate\Http\Response
     */
    public function edit(Biota $biotum)
    {
        return view('dashboard.BiotaMonitoring.Biota.edit', [
            "tittle" => "Biota",
            'breadcrumb' =>'Biota',
            'Codes' => $biotum
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Biota  $biota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Biota $biotum)
    {
        $rules = [
            'nama' => 'required|max:255'
        ];



        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        Biota::where('id', $biotum->id)
            ->update($validatedData);
        return redirect('/monitoring/freshwater/biota')->with('success', 'Biota has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Biota  $biota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Biota $biotum)
    {
        Biota::destroy($biotum->id);
        return redirect('/monitoring/freshwater/biota')->with('success',' Biota has been deleted!!');
    }
}
