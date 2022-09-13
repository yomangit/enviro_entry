<?php

namespace App\Http\Controllers;

use App\Models\lokasi;
use Illuminate\Http\Request;
use App\Exports\LocationExport;
use App\Imports\LocationImport;
use Maatwebsite\Excel\Facades\Excel;

class LocationNoiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.NoiseMeter.Location.index',[
            "tittle"=>"Code Location",
            'breadcrumb'=>'Code Location  ',
            'Codes'=>Lokasi::where('user_id',auth()->user()->id)->filter(request(['fromDate','search']))->paginate(10)->withQueryString()//with diguanakan untuk mengatasi N+1 problem

         ]);
    }
    public function ExportLocationNoise()
    {
        return Excel::download(new LocationExport,'lokasis.csv');
    }
    public function ImportLocationNoise(Request $request)
    { 
        $file=$request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase',$nameFile);
        
       
        try {
            Excel::import(new LocationImport, public_path('/EnviroDatabase/'.$nameFile));
            return redirect('/airquality/noisemeter/noise/locationnoise')->with('success','New data noise has been Imported!');
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
        return view('dashboard.NoiseMeter.Location.create',[
            "tittle"=>"Code Location",
            'breadcrumb'=>'Code Location  ',
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
        return redirect('/airquality/noisemeter/noise/locationnoise/create')->with('success','New code Location noise meter has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lokasi  $locationnoise
     * @return \Illuminate\Http\Response
     */
    public function show(lokasi $locationnoise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lokasi  $locationnoise
     * @return \Illuminate\Http\Response
     */
    public function edit(lokasi $locationnoise)
    {
        return view('dashboard.NoiseMeter.Location.edit',[
            "tittle" => "Code Location",
            'breadcrumb' => 'Code Location ',
            'Codes' => $locationnoise
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lokasi  $locationnoise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lokasi $locationnoise)
    {
        $rules = [
            'nama' => 'required|max:255',
        ];



        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        Lokasi::where('id', $locationnoise->id)
            ->update($validatedData);
        return redirect('/airquality/noisemeter/noise/locationnoise')->with('success', ' code Location noise meter has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lokasi  $locationnoise
     * @return \Illuminate\Http\Response
     */
    public function destroy(lokasi $locationnoise)
    {
        Lokasi::destroy($locationnoise->id);
        return redirect('/airquality/noisemeter/noise/locationnoise')->with('success',' code location noise meter has been deleted!');
    }
}
