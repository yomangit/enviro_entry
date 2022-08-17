<?php

namespace App\Http\Controllers;

use App\Models\Biota;
use App\Models\Marine;
use Illuminate\Http\Request;
use App\Exports\MarineExport;
use App\Imports\MarineImport;
use App\Models\LocationBiota;
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
       
        $grafiks= Marine::where('user_id',auth()->user()->id)->filter(request(['fromDate','search']))->latest()->filter(request(['fromDate', 'search','location']))->paginate(10)->withQueryString();
        $taxa_richness=[];
        $species_density=[];
        $diversity_index=[];
        $evenness_value=[];
        $dominance_index=[];
        $date=[];
       foreach ($grafiks as $grafik ) {
        if ($grafik->taxa_richness==='-') {
            $taxa_richness[]='';
        }
        elseif ($grafik->taxa_richness!='-') {
            $taxa_richness[]=doubleval($grafik->taxa_richness);
        }
        if ($grafik->species_density==='-') {
            $species_density[]='';    
        }
        elseif ($grafik->species_density!='-') {
            $species_density[]= doubleval($grafik->species_density);  

        }
        if ($grafik->diversity_index==='-') {
            $diversity_index[]='';
        }
        elseif ($grafik->diversity_index!='-') {
            $diversity_index[]=doubleval($grafik->diversity_index);

        }
        if ($grafik->evenness_value==='-') {
            $evenness_value[]='';
        }
        elseif ($grafik->evenness_value!='-') {
            $evenness_value[]= doubleval($grafik->evenness_value);

        }
        if ($grafik->dominance_index==='-') {
            $dominance_index[]='';
        }
        elseif ($grafik->dominance_index!='-') {
            $dominance_index[]=doubleval($grafik->dominance_index);

        }
       }
        return view('dashboard.BiotaMonitoring.Marine.index', [
            "tittle" => "Marine",
            'Biotum'=>Biota::all(),
            'LocationBiota'=>LocationBiota::all(),
            'breadcrumb' => 'Marine Monitoring',
            'date'=>$date,
            'taxa_richness'=> $taxa_richness,
            'species_density'=> $species_density,
            'diversity_index'=>$diversity_index,
            'evenness_value'=>$evenness_value,
            'dominance_index'=>$dominance_index,
            'Marine' => Marine::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate', 'search','location']))->paginate(10)->withQueryString() //with diguanakan untuk mengatasi N+1 problem
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
            'breadcrumb' => 'Add Marine Monitoring',
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
            'breadcrumb' => 'Edit Marine Monitoring',
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
