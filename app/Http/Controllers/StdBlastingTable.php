<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StandardBlasting;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TableStandardBlastingExport;
use App\Imports\TableStandardBlastingImport;

class StdBlastingTable extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.Blasting.TblStandard.index',[
            "tittle"=>" Table Blasting",
            'breadcrumb'=>'Table Blasting',
            'TableStandard'=>StandardBlasting::where('user_id',auth()->user()->id)->filter(request(['fromDate','search']))->paginate(10)->withQueryString()

         ]);
    }
    public function ExportStandardBlasting()
    {
        return Excel::download(new TableStandardBlastingExport,'standard_blastings.csv');
    }
    public function ImportStandardBlasting(Request $request)
    { 
        $file=$request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase',$nameFile);
        try {
        Excel::import(new TableStandardBlastingImport, public_path('/EnviroDatabase/'.$nameFile));
        return redirect('/blasting/tablestandard')->with('success','New table Standard has been Imported!');
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
        return view('dashboard.Blasting.TblStandard.create',[
            "tittle"=>" Table Blasting",
            'breadcrumb'=>'Table Blasting',
            'TableStandard'=>StandardBlasting::where('user_id',auth()->user()->id)->get()

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
            'frequency'=>'required',
            'ppv'=>'required',
            'noise_level'=>'required'
         
        ]);
     
        $validatedData['user_id']=auth()->user()->id;
        StandardBlasting::create($validatedData);
        return redirect('/blasting/tablestandard/create')->with('success','New Standard value Blasting has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StandardBlasting  $standardBlasting
     * @return \Illuminate\Http\Response
     */
    public function show(StandardBlasting $standardBlasting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StandardBlasting  $standardBlasting
     * @return \Illuminate\Http\Response
     */
    public function edit(StandardBlasting $tablestandard)
    {
        return view('dashboard.Blasting.TblStandard.edit',[
            "tittle"=>" Table Blasting",
            'breadcrumb'=>'Table Blasting',
            'TableStandard'=>$tablestandard

         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StandardBlasting  $standardBlasting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StandardBlasting $tablestandard)
    {
        $rules = [
            'frequency'=>'required',
            'ppv'=>'required',
            'noise_level'=>'required'
        ];



        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        StandardBlasting::where('id', $tablestandard->id)
            ->update($validatedData);
        return redirect('/blasting/tablestandard')->with('success', ' Standard Value Blasting has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StandardBlasting  $standardBlasting
     * @return \Illuminate\Http\Response
     */
    public function destroy(StandardBlasting $tablestandard)
    {
        StandardBlasting::destroy($tablestandard->id);
        return redirect('/blasting/tablestandard')->with('success','Standard Value Blasting has been deleted!');
    }
}
