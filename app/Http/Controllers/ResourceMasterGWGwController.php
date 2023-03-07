<?php

namespace App\Http\Controllers;

use App\Exports\GroundWaterExport;
use App\Models\Codesamplegw;
use App\Models\Mastergw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\GroundWaterImport;
use App\Models\GroundWaterStandard;
use App\Models\GroundWaterMonthStandard;

class ResourceMasterGWGwController extends Controller
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
        $grafiks = Mastergw::with('user')->orderBy('date','desc')->filter(request(['fromDate', 'search','search1','search2']))->paginate($table)->withQueryString();
        $tanggal = [];
        $suhu = [];
        $ph = [];
        $nama = [];
        $suhu1 = [];
        $ph1 = [];
        foreach ($grafiks as $grafik) 
        {
            $nama[] = $grafik->GWCodeSample->nama;
            $tanggal[] = date('d-M-Y', strtotime($grafik->date));
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

        return view('dashboard.GroundWater.Mastergw.index',[
            'code_units'=>Codesamplegw::all(),
            'table_standard'=>GroundWaterStandard::all(),
            "tittle"=>"Ground Water MSM",
            'breadcrumb'=>'Ground Water MSM',
            'date' => $tanggal,
            'suhu' => $suhu,
            'point' => $nama,
            'ph' => $ph,
            'Master'=>Mastergw::with('user')->orderBy('date','desc')->filter(request(['fromDate', 'search','search1','search2']))->paginate($table)->withQueryString()//with diguanakan untuk mengatasi N+1 problem
            
         ]);
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
        return view('dashboard.GroundWater.Mastergw.create',[
            "tittle"=>"Ground Water MSM",
            'table_standard'=>GroundWaterMonthStandard::all(),
            'code_units'=>Codesamplegw::all(),
            'Codes'=>Mastergw::where('user_id',auth()->user()->id)->filter(request(['fromDate']))->get()//with diguanakan untuk mengatasi N+1 problem
         ]);
    }

    public function MasterExportGWExcel()
    {
        return Excel::download(new GroundWaterExport,'mastergws.xlsx');
    }
    public function MasterImportGWExcel( Mastergw $mastergw, Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        try{
            Excel::import(new GroundWaterImport(), public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/groundwater/mastergw')->with('fail','New Data Ground Water MSM has been Imported!');
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
            'gwcodesample_id'=>'required',
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
            'remarks'=>'required'
        ]);
   
        $validatedData['date']= date('Y-m-d',strtotime(request('date')));
        $validatedData['user_id']=auth()->user()->id;
        $validatedData['gwtablestandard_id']='1';
        Mastergw::create($validatedData);
        return redirect('/groundwater/mastergw/create')->with('success','New Data Ground Water MSM has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mastergw  $mastergw
     * @return \Illuminate\Http\Response
     */
    public function show(Mastergw $mastergw)
    {
      
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mastergw  $mastergw
     * @return \Illuminate\Http\Response
     */
    public function edit(Mastergw $mastergw)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        return view('dashboard.GroundWater.Mastergw.edit',[
            'table_standard'=>GroundWaterStandard::all(),
            'code_units'=>Codesamplegw::all(),
            "tittle"=>"GROUND WATER",
            'breadcrumb'=>'Ground Water MSM',
            'Master'=>$mastergw
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mastergw  $mastergw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mastergw $mastergw)
    {$rules = [
            'gwcodesample_id'=>'required',
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
            'remarks'=>'required'

    ];

 
    $validatedData['date']= date('Y-m-d',strtotime(request('date')));
    $validatedData=$request->validate($rules);
    $validatedData['user_id']=auth()->user()->id;
    $validatedData['gwtablestandard_id']='1';
    Mastergw::where('id',$mastergw->id)
    ->update($validatedData);
    return redirect('/groundwater/mastergw')->with('success',' Data Ground Water MSM has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mastergw  $mastergw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mastergw $mastergw)
    {
        Mastergw::destroy($mastergw->id);
        return redirect('/groundwater/mastergw')->with('success','Data Ground Water MSM has been deleted!');
    }
}
