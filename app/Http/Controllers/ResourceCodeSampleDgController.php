<?php

namespace App\Http\Controllers;

use App\Exports\CodeDustExport;
use App\Imports\CodeDustImport;
use App\Models\Codesampledg;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ResourceCodeSampleDgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('dashboard.DustGauge.CodeDust.index',[
            "tittle"=>"Code Sample Dust",
            'breadcrumb'=>'Code Sample Dust',
            'Codes'=>Codesampledg::with('user')->latest()->filter(request(['fromDate','search']))->paginate(10)->withQueryString()]);
    }
    public function ExportCodeSampleDG()
    {
        return Excel::download(new CodeDustExport,'codesampledgs.xlsx');
    }
    public function ImportCodeSampleDG(Request $request)
    {
        $file=$request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase',$nameFile);
       
        try {
            Excel::import(new CodeDustImport, public_path('/EnviroDatabase/'.$nameFile));
            return redirect('/airquality/dustgauge/dust/codesampledg')->with('success','New Data Ground Water has been Imported!');
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
    
        return view('dashboard.DustGauge.CodeDust.create',[
            "tittle"=>"Code Sample Dust",
            'Codes'=>Codesampledg::with('user')->filter(request(['fromDate']))->get()//with diguanakan untuk mengatasi N+1 problem

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
            'nama'=>'required|max:255|unique:codesamplegws',
            'lokasi'=>'required|max:255',
        
        
        ]);
    
        $validatedData['user_id']=auth()->user()->id;
        Codesampledg::create($validatedData);
        return redirect('/airquality/dustgauge/dust/codesampledg/create')->with('success','New  Code Sample Dust Gaugehas been added!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Codesampledg  $codesampledg
     * @return \Illuminate\Http\Response
     */
    public function show(Codesampledg $codesampledg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Codesampledg  $codesampledg
     * @return \Illuminate\Http\Response
     */
    public function edit(Codesampledg $codesampledg)
    {
        return view('dashboard.DustGauge.CodeDust.edit',[
            "tittle"=>"Code Sample Dust",
            'breadcrumb'=>'Code Sample Dust',
            'Codes'=>$codesampledg
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Codesampledg  $codesampledg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Codesampledg $codesampledg)
    {
        $rules = [
            'nama'=>'required|max:255|unique:codesamples',
            'lokasi'=>'required|max:255',
        ];

    

        $validatedData=$request->validate($rules);

        $validatedData['user_id']=auth()->user()->id;
        Codesampledg::where('id',$codesampledg->id)
        ->update($validatedData);
        return redirect('/airquality/dustgauge/masternoise/noisemeter')->with('success','  Code Sample Dust Gauge has been updated!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Codesampledg  $codesampledg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Codesampledg $codesampledg)
    {
        Codesampledg::destroy($codesampledg->id);
        return redirect('/airquality/dustgauge/masternoise/noisemeter')->with('success',' Code Sample Dust Gauge has been deleted!');

    }
}
