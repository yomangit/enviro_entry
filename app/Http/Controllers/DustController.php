<?php

namespace App\Http\Controllers;

use App\Models\Dust;
use App\Exports\DustExport;
use App\Imports\DustImport;
use App\Models\Codesampledg;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
class DustController extends Controller
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
        $grafik = Dust::with('user')->filter(request(['fromDate','search','search1','search2']))->orderBy('date_out','desc')->paginate($table)->withQueryString();
        $date=[];
        $nama=[];
        $insoluble1=[];$soluble1=[];
        $insoluble=[];$soluble=[];$total=[];
        $i=0;$s=0;
        foreach ($grafik as $grafiks) {
            $nama[] = $grafiks->CodeDust->nama;
           
            $date[]= date('M-Y', strtotime($grafiks->date_out));
            if (!is_numeric($grafiks->m4) && !is_numeric($grafiks->m3)) {
               $total[] = $insoluble1[]='';
            }
            elseif (!is_numeric($grafiks->m6) && !is_numeric($grafiks->m5)) {
                $soluble1[]='';
            $total[]= $insoluble1[]=$insoluble[]= (round((doubleval($grafiks->m4) - doubleval($grafiks->m3))*1000000*4*30/(3.14*150*150*((strtotime($grafiks->date_out) - strtotime($grafiks->date_in))/86400)),2));

            }
            elseif (is_numeric($grafiks->m4) &&  is_numeric($grafiks->m3) &&  is_numeric($grafiks->m6) && is_numeric($grafiks->m5)) {
           $i=round((doubleval($grafiks->m4) - doubleval($grafiks->m3))/(3.14*0.005625*((strtotime($grafiks->date_out) - strtotime($grafiks->date_in))/86400)),2);
           $s=round(((doubleval($grafiks->m6) - doubleval($grafiks->m5))* doubleval($grafiks->total_vlm_water) )/(3.14*0.005625*((strtotime($grafiks->date_out) - strtotime($grafiks->date_in))/86400)*$grafiks->volume_filtrat),2);   
            $total[] = round(($i + $s),2);
            }
          
        }
        
        return view('dashboard.DustGauge.DustMaster.index',[
            "tittle"=>"Dust Gauge",
            'code_units'=>Codesampledg::all(),
            'breadcrumb'=>'Dust Gauge',
            'tanggal'=>$date,
            'value'=>$total,
            'point'=>$nama,
            'Dust'=>Dust::with('user')->filter(request(['fromDate','search','search1','search2']))->orderBy('date_out','desc')->paginate($table)->withQueryString()
        ]);
    }
    public function ExportDust()
    {
        return Excel::download(new DustExport,'dusts.csv');
    }
    public function ImportDust(Request $request)
    { 
        $file=$request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase',$nameFile);
        Excel::import(new DustImport, public_path('/EnviroDatabase/'.$nameFile));
        return redirect('/airquality/dustgauge/dust')->with('success','New data dust has been Imported!');
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
        return view('dashboard.DustGauge.DustMaster.create',[
            "tittle"=>"Dust Gauge",
            'code_units'=>Codesampledg::all(),
            'Codes'=>Dust::with('user')->filter(request(['fromDate']))->get()//with diguanakan untuk mengatasi N+1 problem

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
            'codedust_id'=>'required',
            'date_in'=> 'required',
            'date_out'=>'required',
            //'m4'=>'required',
            //'m3'=>'required',
            //'m6'=>'required',
            //'m5'=>'required',
            'no_insect'=>'required',
            'vb_dirt'=>'required',
            'vb_algae'=>'required',
            'area_observation'=>'required',
            'observer'=>'required|max:255',
            'volume_filtrat'=>'required',
            'total_vlm_water'=>'required',
            'remarks'=>'required'
        ]);
		if(empty($request->m3) && empty($request->m4) && empty($request->m5) && empty($request->m6))
		{
	  $validatedData['m3']='-';
	  $validatedData['m4']='-';
	  $validatedData['m5']='-';
	  $validatedData['m6']='-';
		}
		else{
			$validatedData['m3']=$request->m3;
			$validatedData['m4']=$request->m4;
			$validatedData['m5']=$request->m5;
			$validatedData['m6']=$request->m6;
		}
        $validatedData['date_in']= date('Y-m-d',strtotime(request('date_in')));
        $validatedData['date_out']= date('Y-m-d',strtotime(request('date_out')));
        $validatedData['user_id']=auth()->user()->id;
        Dust::create($validatedData);
        return redirect('/airquality/dustgauge/dust/create')->with('success','New Data Dust Gauge has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dust  $dust
     * @return \Illuminate\Http\Response
     */
    public function show(Dust $dust)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dust  $dust
     * @return \Illuminate\Http\Response
     */
    public function edit(Dust $dust)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        return view('dashboard.DustGauge.DustMaster.edit',[
            "tittle"=>"Dust Gauge",
            'code_units'=>Codesampledg::all(),
            'breadcrumb'=>'Dust Gauge"',
            'Codes'=>$dust
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dust  $dust
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dust $dust)
    {
        $rules = [
            'codedust_id'=>'required',
            'm4'=>'required',
            'm3'=>'required',
            'm6'=>'required',
            'm5'=>'required',
            'no_insect'=>'required',
            'vb_dirt'=>'required',
            'vb_algae'=>'required',
            'area_observation'=>'required',
            'observer'=>'required|max:255',
            'volume_filtrat'=>'required',
            'total_vlm_water'=>'required',
            'remarks'=>'required',
            'hard_copy.*'=>'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf,docx|max:1024'
        ];
    
     
    
        $validatedData=$request->validate($rules);
        if ($request->file('hard_copy')) {
            if ($request->oldHard_copy) {
                Storage::delete($request->oldHard_copy);
            }
            $validatedData['hard_copy']=$request->file('hard_copy')->store('dust-images');
        }
        $validatedData['date_in']= date('Y-m-d',strtotime(request('date_in')));
        $validatedData['date_out']= date('Y-m-d',strtotime(request('date_out')));
        $validatedData['user_id']=auth()->user()->id;
        Dust::where('id',$dust->id)
        ->update($validatedData);
        return redirect('/airquality/dustgauge/dust')->with('success',' Data Dust has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dust  $dust
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dust $dust)
    {
        Dust::destroy($dust->id);
        return redirect('/airquality/dustgauge/dust')->with('success','Data Dust has been deleted!');
    }
}
