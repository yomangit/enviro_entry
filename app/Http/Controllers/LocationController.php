<?php

namespace App\Http\Controllers;

use App\Exports\LocationExport;
use App\Imports\LocationImport;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.NoiseMeter.Location.index',[
            "tittle"=>"Code Location: Noise Meter",
            'breadcrumb'=>'Code Location : Noise Meter ',
            'Codes'=>Lokasi::where('user_id',auth()->user()->id)->filter(request(['fromDate','search']))->paginate(10)->withQueryString()//with diguanakan untuk mengatasi N+1 problem

         ]);
    }
    public function ExportLocation()
    {
        return Excel::download(new LocationExport,'lokasis.xlsx');
    }
    public function ImportLocation(Request $request)
    { 
        $file=$request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase',$nameFile);
        
        Excel::import(new LocationImport, public_path('/EnviroDatabase/'.$nameFile));
        return redirect('/dashboard/dustgauge/noisemeter/noise/location')->with('success','New data noise has been Imported!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.NoiseMeter.Location.create',[
            "tittle"=>"Code Location: Noise Meter",
            'breadcrumb'=>'Code Location : Noise Meter ',
            'Codes'=>Lokasi::where('user_id',auth()->user()->id)->get()//with diguanakan untuk mengatasi N+1 problem

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
            'nama'=>'required|max:255|unique:lokasis',
         
        ]);
     
        $validatedData['user_id']=auth()->user()->id;
        Lokasi::create($validatedData);
        return redirect('/dashborad/dustgauge/noisemeter/noise/location/create')->with('success','New code Location noise meter has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function show(Lokasi $lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Lokasi $location)
    {
       
        return view('dashboard.NoiseMeter.Location.edit',[
            "tittle" => "Code Sample: Noise Meter",
            'breadcrumb' => 'Code Sample Noise Meter',
            'Codes' => $location
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lokasi $location)
    {
        $rules = [
            'nama' => 'required|max:255',
            'lokasi'=>'required'
        ];



        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        Lokasi::where('id', $location->id)
            ->update($validatedData);
        return redirect('/dashborad/dustgauge/noisemeter/noise/location')->with('success', ' code Location noise meter has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lokasi $location)
    {
        
        Lokasi::destroy($location->id);
        return redirect('/dashborad/dustgauge/noisemeter/noise/location')->with('success',' code location noise meter has been deleted!');
    }
}
