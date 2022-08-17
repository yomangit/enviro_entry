<?php

namespace App\Http\Controllers;

use App\Exports\ExportFreshwater;
use App\Imports\ImportFreshwater;
use App\Models\Biota;
use App\Models\FreshWater;
use Illuminate\Http\Request;
use App\Models\LocationBiota;
use Maatwebsite\Excel\Facades\Excel;

class FreshWaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $grafiks= FreshWater::where('user_id',auth()->user()->id)->filter(request(['fromDate','search']))->get();
        $taxa_richness=[];
        $species_density=[];
        $diversity_index=[];
        $evenness_value=[];
        $dominance_index=[];
        $date=[];
        $biotas=[];
       foreach ($grafiks as $grafik ) {
        $date[]=date('d-M-Y', strtotime( $grafik->date));

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

        $biotas[]=$grafik->biota_id;
       }
        return view('dashboard.BiotaMonitoring.Freshwater.index', [
            "tittle" => "Fresh Water",
            'Biotum'=>Biota::all(),
            'LocationBiota'=>LocationBiota::all(),
            'breadcrumb' => 'Fresh Water Monitoring',
            'date'=>$date,
            'taxa_richness'=> $taxa_richness,
            'species_density'=> $species_density,
            'diversity_index'=>$diversity_index,
            'evenness_value'=>$evenness_value,
            'dominance_index'=>$dominance_index,
            'biotas'=>$biotas,
            'Freshwaters' => FreshWater::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate', 'search','location']))->paginate(10)->withQueryString() //with diguanakan untuk mengatasi N+1 problem
        ]);
    }

    public function ExportFreshwater()
    {
        return Excel::download(new ExportFreshwater,'freshwaters.xlsx');
    }
    public function ImportFreshwater(Request $request)
    { 
        $file=$request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase',$nameFile);
        try {
        Excel::import(new ImportFreshwater, public_path('/EnviroDatabase/'.$nameFile));
        return redirect('/monitoring/freshwater/master')->with('success','New biota freshwater has been Imported!');
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
        return view('dashboard.BiotaMonitoring.Freshwater.create', [
            "tittle" => "Fresh Water",
            'LocationBiota'=>LocationBiota::all(),
            'Biotum'=>Biota::all(),
            'breadcrumb' => 'Add Fresh Water Monitoring',
            'Freshwaters' => FreshWater::where('user_id', auth()->user()->id)->get() //with diguanakan untuk mengatasi N+1 problem
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
            'date'=>'required',
            'biota_id'=>'required',
        ]);
       
        $validatedData['user_id']=auth()->user()->id;
        $validatedData['date']= date('Y-m-d',strtotime(request('date')));
        FreshWater::create($validatedData);
        return redirect('/monitoring/freshwater/master/create')->with('success','New Data Biota Freshwater has been added!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FreshWater  $master
     * @return \Illuminate\Http\Response
     */
    public function show(FreshWater $master)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FreshWater  $master
     * @return \Illuminate\Http\Response
     */
    public function edit(FreshWater $master)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        return view('dashboard.BiotaMonitoring.Freshwater.edit', [
            "tittle" => "Fresh Water",
            'LocationBiota'=>LocationBiota::all(),
            'Biotum'=>Biota::all(),
            'breadcrumb' => 'Add Fresh Water Monitoring',
            'Freshwaters' => $master
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FreshWater  $master
     * @return \Illuminate\Http\Response
     */
        public function update(Request $request, FreshWater $master)
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
        $validatedData['date']= date('Y-m-d',strtotime(request('date')));
        $validatedData['user_id'] = auth()->user()->id;
        FreshWater::where('id', $master->id)
            ->update($validatedData);
        return redirect('/monitoring/freshwater/master')->with('success', ' Data biota freshwater has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FreshWater  $master
     * @return \Illuminate\Http\Response
     */
    public function destroy(FreshWater $master)
    {
        FreshWater::destroy($master->id);
        return redirect('/monitoring/freshwater/master')->with('success','Data biota freshwater has been deleted!');
    } 
}
