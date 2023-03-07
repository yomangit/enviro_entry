<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\GwStandardExport;
use App\Imports\GwStandardImport;
use App\Models\GroundWaterStandard;
use Maatwebsite\Excel\Facades\Excel;

class GwStandardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.GroundWater.Standard.index',[
            "tittle"=>"Ground Water table Standard",
            'breadcrumb'=>'Ground Water table Standard',
            'Master'=>GroundWaterStandard::with('user')->latest()->filter(request(['fromDate','search']))->paginate(10)->withQueryString()//with diguanakan untuk mengatasi N+1 problem
            
         ]);
    }

    public function ExportStandardGroundwater()
    {
        return Excel::download(new GwStandardExport,'standard_groundwater.csv');
    }
    public function ImportStandardGroundwater(Request $request)
    { 
        $file=$request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase',$nameFile);
        try {
        Excel::import(new GwStandardImport, public_path('/EnviroDatabase/'.$nameFile));
        return redirect('/groundwater/standard')->with('success','New table Standard has been Imported!');
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
        return view('dashboard.GroundWater.Standard.create',[
            "tittle"=>"Table Standard",
            'Codes'=>GroundWaterStandard::where('user_id',auth()->user()->id)->filter(request(['fromDate']))->get()//with diguanakan untuk mengatasi N+1 problem
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
           
            'd_pipe'=>'required',
            'tt'=>'required',
            'r'=>'required',
        ]);
        $validatedData['user_id']=auth()->user()->id;
        GroundWaterStandard::create($validatedData);
        return redirect('/groundwater/standard/create')->with('success','New Data Table Standard has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroundWaterStandard  $groundWaterStandard
     * @return \Illuminate\Http\Response
     */
    public function show(GroundWaterStandard $standard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroundWaterStandard  $groundWaterStandard
     * @return \Illuminate\Http\Response
     */
    public function edit(GroundWaterStandard $standard)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        return view('dashboard.GroundWater.Standard.edit',[
            "tittle"=>"Table Standard",
            'Codes'=>$standard
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GroundWaterStandard  $groundWaterStandard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroundWaterStandard $standard)
    {
        $rules = [
            'd_pipe'=>'required',
            'tt'=>'required',
            'r'=>'required',
        ];
    $validatedData=$request->validate($rules);
    $validatedData['user_id']=auth()->user()->id;
    GroundWaterStandard::where('id',$standard->id)
    ->update($validatedData);
    return redirect('/groundwater/standard')->with('success',' Data Table Standard has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroundWaterStandard  $groundWaterStandard
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroundWaterStandard $standard)
    {
        GroundWaterStandard::destroy($standard->id);
        return redirect('/groundwater/standard')->with('success','Data Table Standard has been deleted!');
    }
}
