<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PointIdBlasting;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PointIDBlastingExport;
use App\Imports\PointIDBlastingImport;

class PointIdBlastingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('dashboard.Blasting.PointID.index',[
            "tittle"=>"Point ID: Blasting",
            'breadcrumb'=>'Point ID: Blasting',
      'PointID'=>PointIdBlasting::with('user')->filter(request(['fromDate','search']))->paginate(10)->withQueryString()//with diguanakan untuk mengatasi N+1 problem

         ]);
    }
    public function ExportPointId()
    {

        return Excel::download(new PointIDBlastingExport, 'point_id_blastings.csv');
    }
    public function ImportPointId(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new PointIDBlastingImport;

        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/blasting/pointid')->with('success', 'New Code Sample Surface Water has been Imported!');
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
        return view('dashboard.Blasting.PointID.create',[
            "tittle"=>"Point ID: Blasting",
            'breadcrumb'=>'Point ID: Blasting',
      'PointID'=>PointIdBlasting::where('user_id',auth()->user()->id)->filter(request(['fromDate','search']))->get()//with diguanakan untuk mengatasi N+1 problem

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
            'nama'=>'required|max:255|unique:codesamplenms',
            'lokasi'=>'required|max:255'
         
        ]);
     
        $validatedData['user_id']=auth()->user()->id;
        PointIdBlasting::create($validatedData);
        return redirect('/blasting/pointid/create')->with('success','New Point ID Blasting has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PointIdBlasting  $pointid
     * @return \Illuminate\Http\Response
     */
    public function show(PointIdBlasting $pointid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PointIdBlasting  $pointid
     * @return \Illuminate\Http\Response
     */
    public function edit(PointIdBlasting $pointid)
    {
        return view('dashboard.Blasting.PointID.edit', [
            "tittle"=>"Point ID: Blasting",
            'breadcrumb'=>'Point ID: Blasting',
            'PointID' => $pointid
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PointIdBlasting  $pointid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PointIdBlasting $pointid)
    {
       
        $rules = [
            'nama' => 'required|max:255|unique:codesamplettns',
            'lokasi' => 'required|max:255',
        ];



        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        PointIdBlasting::where('id', $pointid->id)
            ->update($validatedData);
        return redirect('/blasting/pointid')->with('success', ' Point ID Blasting has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PointIdBlasting  $pointid
     * @return \Illuminate\Http\Response
     */
    public function destroy(PointIdBlasting $pointid)
    {
        PointIdBlasting::destroy($pointid->id);
        return redirect('/blasting/pointid')->with('success',' Point ID Blasting has been deleted!');
    }
}
