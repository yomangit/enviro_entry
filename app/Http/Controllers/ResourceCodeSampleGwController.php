<?php

namespace App\Http\Controllers;

use App\Exports\CodeSampeGWExport;
use App\Http\Controllers\Controller;
use App\Imports\CodeSampleGWImport;
use App\Models\Codesamplegw;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ResourceCodeSampleGwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.GroundWater.Codesamplegw.index',[
            "tittle"=>"Code Sample MSM",
            'breadcrumb'=>'Code Sample Ground Water MSM ',
      'Codes'=>Codesamplegw::where('user_id',auth()->user()->id)->filter(request(['fromDate','search']))->paginate(10)->withQueryString()//with diguanakan untuk mengatasi N+1 problem

         ]);
    }

    public function ExportCodeSampleGW()
    {
        return Excel::download(new CodeSampeGWExport,'codesamplegws.xlsx');
    }
    public function ImportCodeSampleGW(Request $request)
    {
        $file=$request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase',$nameFile);
        try {
            Excel::import(new CodeSampleGWImport, public_path('/EnviroDatabase/'.$nameFile));
        return redirect('/dashboard/groundwater/mastergw/codesamplegw')->with('success','New Data  has been Imported!');
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
        return view('dashboard.GroundWater.Codesamplegw.create',[
            'breadcrumb'=>'Code Sample Ground Water MSM ',
            "tittle"=>"Code Sample MSM",
            'Codes'=>Codesamplegw::where('user_id',auth()->user()->id)->filter(request(['fromDate']))->get()//with diguanakan untuk mengatasi N+1 problem

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
            'total'=>'required',
            'gl'=>'required',
            'rl'=>'required'
         
        ]);
     
        $validatedData['user_id']=auth()->user()->id;
        Codesamplegw::create($validatedData);
        return redirect('/dashboard/groundwater/mastergw/codesamplegw/create')->with('success','New Data  has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Codesamplegw  $codesamplegw
     * @return \Illuminate\Http\Response
     */
    public function show(Codesamplegw $codesamplegw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Codesamplegw  $codesamplegw
     * @return \Illuminate\Http\Response
     */
    public function edit(Codesamplegw $codesamplegw)
    {
        return view('dashboard.GroundWater.Codesamplegw.edit',[
            "tittle"=>"Code Sample MSM",

            'breadcrumb'=>'Code Sample Ground Water MSM ',

            'Codes'=>$codesamplegw
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Codesamplegw  $codesamplegw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Codesamplegw $codesamplegw)
    {
        
        $rules = [
            'nama'=>'required|max:255|unique:codesamples',
            'lokasi'=>'required|max:255',
            'total'=>'required',
            'gl'=>'required',
            'rl'=>'required'
        ];

    

        $validatedData=$request->validate($rules);
  
        $validatedData['user_id']=auth()->user()->id;
        Codesamplegw::where('id',$codesamplegw->id)
        ->update($validatedData);
        return redirect('/dashboard/groundwater/mastergw')->with('success',' Data Code Unit has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Codesamplegw  $codesamplegw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Codesamplegw $codesamplegw)
    {
        Codesamplegw::destroy($codesamplegw->id);
        return redirect('/dashboard/groundwater/mastergw/codesamplegw')->with('success','Data  has been deleted!');
    }
}