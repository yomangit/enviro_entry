<?php

namespace App\Http\Controllers;

use App\Exports\LocationBiotaExport;
use App\Imports\LocationBiotaImport;
use App\Models\LocationBiota;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LocationBiotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.BiotaMonitoring.Location.index',[
            "tittle"=>"Code Location: Biota",
            'breadcrumb'=>'Code Location : Biota ',
            'Codes'=>LocationBiota::where('user_id',auth()->user()->id)->filter(request(['fromDate','search']))->paginate(10)->withQueryString()//with diguanakan untuk mengatasi N+1 problem

         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.BiotaMonitoring.Location.create',[
            "tittle"=>"Code Location: Biota",
            'breadcrumb'=>'Code Location : Biota ',
            'Codes'=>LocationBiota::where('user_id',auth()->user()->id)->get()

         ]);
    }
    public function ExportLocationBiota()
    {
        return Excel::download(new LocationBiotaExport,'location_biotas.xlsx');
    }
    public function ImportLocationBiota(Request $request)
    {
        $file=$request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase',$nameFile);
        try {
        Excel::import(new LocationBiotaImport, public_path('/EnviroDatabase/'.$nameFile));
        return redirect('/dashboard/monitoring/location')->with('success','New location biota has been Imported!');
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
            'nama'=>'required|max:255|unique:location_biotas'
         
        ]);
     
        $validatedData['user_id']=auth()->user()->id;
        LocationBiota::create($validatedData);
        return redirect('/dashboard/monitoring/location/create')->with('success','New code Location biota has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LocationBiota  $locationBiota
     * @return \Illuminate\Http\Response
     */
    public function show(LocationBiota $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LocationBiota  $locationBiota
     * @return \Illuminate\Http\Response
     */
    public function edit(LocationBiota $location)
    {
        return view('dashboard.BiotaMonitoring.Location.edit',[
            "tittle"=>"Code Location: Biota",
            'breadcrumb'=>'Code Location : Biota ',
            'Codes'=>$location

         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LocationBiota  $locationBiota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LocationBiota $location)
    {
        $rules = [
            'nama' => 'required|max:255|unique:location_biotas'
        ];



        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        LocationBiota::where('id', $location->id)
            ->update($validatedData);
        return redirect('/dashboard/monitoring/location')->with('success', ' code Location biota has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LocationBiota  $locationBiota
     * @return \Illuminate\Http\Response
     */
    public function destroy(LocationBiota $location)
    {
        LocationBiota::destroy($location->id);
        return redirect('/dashboard/monitoring/location')->with('success',' code location biota has been deleted!');
    }
}
