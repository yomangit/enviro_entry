<?php

namespace App\Http\Controllers;

use App\Models\Biota;
use App\Models\Marine;
use Illuminate\Http\Request;
use App\Exports\MarineExport;
use App\Imports\MarineImport;
use App\Models\LocationBiota;
use Hamcrest\Type\IsNumeric;
use Maatwebsite\Excel\Facades\Excel;

class MarineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firstDayofPreviousMonth = doubleval(strtotime(request('fromDate')));
        $lastDayofPreviousMonth = doubleval(strtotime(request('toDate')));
        if ( empty($firstDayofPreviousMonth) ) {
            $table=30;
        }
        else
        $table = ($lastDayofPreviousMonth-$firstDayofPreviousMonth)/86400;
        $grafiks= Marine::with('user')->orderBy('date','desc')->latest()->filter(request(['fromDate', 'search','location','location1','location2']))->paginate($table)->withQueryString();
        $taxa_richness=[];
        $species_density=[];
        $diversity_index=[];
        $evenness_value=[];
        $dominance_index=[];
        $nama=[];
        $date=[];
       foreach ($grafiks as $grafik ) {
        $nama[]=$grafik->locationBiota->nama;
        $date[]=date('d-M-Y',strtotime($grafik->date));
        if (is_numeric($grafik->taxa_richness)) {
            $taxa_richness[]=doubleval($grafik->taxa_richness);
        }
        else{
            $taxa_richness[]='';

        }
        if (is_numeric($grafik->species_density)) {
            $species_density[]= doubleval($grafik->species_density);  
           
        }
        else{
            $species_density[]='';    
        }
        if (is_numeric($grafik->diversity_index)) {
            $diversity_index[]=doubleval($grafik->diversity_index);
        }
        else{
            $diversity_index[]='';
        }
        if (is_numeric($grafik->evenness_value)) {
            $evenness_value[]= doubleval($grafik->evenness_value);
            
        }
        else{
            $evenness_value[]='';
        }
        if (is_numeric($grafik->dominance_index)) {
            $dominance_index[]=doubleval($grafik->dominance_index);
            
        }
        else{
            $dominance_index[]='';
        }
       }
        return view('dashboard.BiotaMonitoring.Marine.index', [
            "tittle" => "Marine",
            'Biotum'=>Biota::all(),
            'LocationBiota'=>LocationBiota::all(),
            'breadcrumb' => 'Marine Monitoring',
            'date'=>$date,
            'point'=>$nama,
            'taxa_richness'=> $taxa_richness,
            'species_density'=> $species_density,
            'diversity_index'=>$diversity_index,
            'evenness_value'=>$evenness_value,
            'dominance_index'=>$dominance_index,
            'Marine' => Marine::with('user')->orderBy('date','desc')->filter(request(['fromDate', 'search','location','location1','location2']))->paginate(30)->withQueryString() //with diguanakan untuk mengatasi N+1 problem
        ]);
    }
    public function ExportMarine()
    {
        return Excel::download(new MarineExport,'marines.xlsx');
    }
    public function ImportMarine(Request $request)
    { 
        $file=$request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase',$nameFile);
        try {
        Excel::import(new MarineImport, public_path('/EnviroDatabase/'.$nameFile));
        return redirect('/monitoring/marine')->with('success','New biota marine has been Imported!');
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
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        return view('dashboard.BiotaMonitoring.Marine.create', [
            "tittle" => "Marine",
            'LocationBiota'=>LocationBiota::all(),
            'Biotum'=>Biota::all(),
            'breadcrumb' => 'Marine Monitoring',
            'Marine' => Marine::where('user_id', auth()->user()->id)->get() //with diguanakan untuk mengatasi N+1 problem
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
            'biota_id'=>'required',
            'location_id'=>'required',
            'taxa_richness'=>'required',
            'species_density'=>'required',
            'diversity_index'=>'required',
            'evenness_value'=>'required',
            'dominance_index'=>'required',
            'biota_id'=>'required',
        ]);
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
       
        $validatedData['user_id']=auth()->user()->id;
        Marine::create($validatedData);
        return redirect('/monitoring/marine/create')->with('success','New Data Biota Marine has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marine  $marine
     * @return \Illuminate\Http\Response
     */
    public function show(Marine $marine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marine  $marine
     * @return \Illuminate\Http\Response
     */
    public function edit(Marine $marine)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        return view('dashboard.BiotaMonitoring.Marine.edit', [
            "tittle" => "Marine",
            'LocationBiota'=>LocationBiota::all(),
            'Biotum'=>Biota::all(),
            'breadcrumb' => 'Marine Monitoring',
            'Marine' => $marine
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marine  $marine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marine $marine)
    {
        $rules = [
            'biota_id'=>'required',
            'location_id'=>'required',
            'taxa_richness'=>'required',
            'species_density'=>'required',
            'diversity_index'=>'required',
            'evenness_value'=>'required',
            'dominance_index'=>'required',
            'biota_id'=>'required',
        ];

        $validatedData = $request->validate($rules);
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
        $validatedData['user_id'] = auth()->user()->id;
        Marine::where('id', $marine->id)
            ->update($validatedData);
        return redirect('/monitoring/marine')->with('success', ' Data biota Marine has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marine  $marine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marine $marine)
    {
        Marine::destroy($marine->id);
        return redirect('/monitoring/marine')->with('success','Data biota Marine has been deleted!');
    }
}
