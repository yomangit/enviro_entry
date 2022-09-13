<?php

namespace App\Http\Controllers;

use App\Exports\MasterTTNExport;
use App\Imports\MasterTTNImport;
use App\Models\Codesamplettn;
use App\Models\Masterttn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ResourceMasterTTNController extends Controller
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
        $grafiks = Masterttn::with('user')
            ->filter(request(['fromDate', 'search']))
            ->paginate($table)
            ->withQueryString();
        $tanggal = [];
        $suhu = [];
        $ph = [];
        $suhu1 = [];
        $ph1 = [];
        foreach ($grafiks as $grafik) 
        {
            $tanggal[] = date('d-m-Y', strtotime($grafik->date));
            if ($suhu1[] = $grafik->temperatur === '-') {
                //   $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
                $suhu[] = '';
            } elseif ($suhu1[] = $grafik->temperatur != '-') {
                //  $tanggal[] = date('d-m-Y', strtotime($grafik->date));
                $suhu[] = $suhu1[] = doubleval($grafik->temperatur);
            }
            if ($ph1[] = $grafik->ph === '-') {
                // $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
                $ph[] = '';
            } elseif ($ph1[] = $grafik->ph !='-') {
               $ph[]=$ph1[] = doubleval($grafik->ph); # code...
                // $tanggal[] = date('d-m-Y', strtotime($grafik->date));
            }

            // $tanggal[] = date('d-m-Y', strtotime($grafik->date));
        }
     
        return view('dashboard.GroundWater.MasterTTN.index',[
            'code_units'=>Codesamplettn::all(),
            "tittle"=>"Groundwell Community",
            'breadcrumb'=>'Groundwell Community',
            'date' => $tanggal,
            'suhu' => $suhu,
            'ph' => $ph,
            'Master'=>Masterttn::with('user')->orderBy('date','desc')->filter(request(['fromDate','search']))->paginate(10)->withQueryString()//with diguanakan untuk mengatasi N+1 problem
            
         ]);
    }
    public function MasterExportTTNExcel()
    {
        return Excel::download(new MasterTTNExport,'masterttns.xlsx');
    }
    public function MasterImportTTNExcel(Request $request)
    { 
        $file=$request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase',$nameFile);
        Excel::import(new MasterTTNImport, public_path('/EnviroDatabase/'.$nameFile));
        return redirect('/groundwater/masterttn')->with('success','New Data Ground Water MSM has been Imported!');
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
        return view('dashboard.GroundWater.MasterTTN.create',[
            'breadcrumb'=>'Groundwell Community',
            "tittle"=>"Groundwell Community",
            'code_units'=>Codesamplettn::all(),
            'Codes'=>Masterttn::where('user_id',auth()->user()->id)->filter(request(['fromDate']))->get()//with diguanakan untuk mengatasi N+1 problem
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
            'codesamplettn_id'=>'required',
            
            'start_time'=>'required|max:255',
            'stop_time'=>'required|max:255',
            'well'=>'required',
            'well_water'=>'required',
            'h'=>'required',
            'water_volume'=>'required',
            'temperatur'=>'required|max:255',
            'ph'=>'required|max:255',
            'conductivity'=>'required',
            'tds'=>'required',
            'redox'=>'required',
            'do'=>'required',
            'salinity'=>'required',
            'turbidity'=>'required',
            'water_color'=>'required',
            'odor'=>'required',
            'rain_before_sampling'=>'required',
            'rain_during_sampling'=>'required',
            'oil_layer'=>'required',
            'source_pollution'=>'required',
            'sampler'=>'required',
            'remarks'=>'required',

        ]);
        if ($request->file('hard_copy')) {
            $validatedData['hard_copy']=$request->file('hard_copy')->store('groundwaterttn-images');
        }
        $validatedData['gwtablestandard_id']='1';
        $validatedData['date'] = date('Y-m-d', strtotime(request('date')));
        $validatedData['user_id']=auth()->user()->id;
        Masterttn::create($validatedData);
        return redirect('/groundwater/masterttn/create')->with('success','New Data Ground Water TTN has been added!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Masterttn  $masterttn
     * @return \Illuminate\Http\Response
     */
    public function show(Masterttn $masterttn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Masterttn  $masterttn
     * @return \Illuminate\Http\Response
     */
    public function edit(Masterttn $masterttn)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        return view('dashboard.GroundWater.MasterTTN.edit',[
            'code_units'=>Codesamplettn::all(),
            "tittle"=>"Groundwell Community",

            'breadcrumb'=>'Groundwell Community',

            'Master'=>$masterttn
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Masterttn  $masterttn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Masterttn $masterttn)
    {
        $rules = [
            'codesamplettn_id'=>'required',
                'start_time'=>'required|max:255',
                'stop_time'=>'required|max:255',
                'well'=>'required',
                'well_water'=>'required',
                'h'=>'required',
                'water_volume'=>'required',
                'temperatur'=>'required|max:255',
                'ph'=>'required|max:255',
                'conductivity'=>'required',
                'tds'=>'required',
                'redox'=>'required',
                'do'=>'required',
                'salinity'=>'required',
                'turbidity'=>'required',
                'water_color'=>'required',
                'odor'=>'required',
                'rain_before_sampling'=>'required',
                'rain_during_sampling'=>'required',
                'oil_layer'=>'required',
                'source_pollution'=>'required',
                'sampler'=>'required',
                'remarks'=>'required',
                
        ];    
        $validatedData=$request->validate($rules);
        if ($request->file('hard_copy')) {
            if ($request->oldHard_copy) {
                Storage::delete($request->oldHard_copy);
            }
            $validatedData['hard_copy']=$request->file('hard_copy')->store('groundwaterttn-images');
        }
        $validatedData['date'] = date('Y-m-d', strtotime(request('date')));
        $validatedData['gwtablestandard_id']='1';
        $validatedData['user_id']=auth()->user()->id;
        Masterttn::where('id',$masterttn->id)
        ->update($validatedData);
        return redirect('/groundwater/masterttn')->with('success',' Data Ground Water TTN has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Masterttn  $masterttn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Masterttn $masterttn)
    {
        Masterttn::destroy($masterttn->id);
        return redirect('/groundwater/masterttn')->with('success','Data Ground Water TTN has been deleted!');
    }
    
}
