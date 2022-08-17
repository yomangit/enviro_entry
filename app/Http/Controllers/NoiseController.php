<?php

namespace App\Http\Controllers;

use App\Models\Noise;
use App\Models\Lokasi;
use App\Models\Codesamplenm;
use Illuminate\Http\Request;
use App\Exports\ExportDataNoise;
use App\Imports\ImportDataNoise;
use App\Models\ResumeBulananNoise;
use Maatwebsite\Excel\Facades\Excel;

class NoiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Lokasi $lokasiResume)
    {
        return view('dashboard.NoiseMeter.NoiseMaster.index', [
            "tittle" => "Noise Meter",
            'code_sample'=>Codesamplenm::all(),
            'code_location'=>Lokasi::all(),
            'breadcrumb' => 'Noise Meter',
            'lokasiResume'=>$lokasiResume,
            'ResumeBulanan' => ResumeBulananNoise::where('user_id', auth()->user()->id)->get(),
            'Codes'=>Noise::where('user_id',auth()->user()->id)->filter(request(['fromDate','search','location']))->paginate(7)->withQueryString()//with diguanakan untuk mengatasi N+1 problem
            

        ]);
    }
    public function ExportDataNoise()
    {
        return Excel::download(new ExportDataNoise,'noises.xlsx');
    }
    public function ImportDataNoise(Request $request)
    { 
        $file=$request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase',$nameFile);
        Excel::import(new ImportDataNoise, public_path('/EnviroDatabase/'.$nameFile));
        return redirect('/airquality/noisemeter/noise')->with('success','New data noise has been Imported!');
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
        return view('dashboard.NoiseMeter.NoiseMaster.create', [
            "tittle" => "Noise Meter",
            'code_sample'=>Codesamplenm::all(),
            'code_location'=>Lokasi::all(),
            'breadcrumb' => 'Noise Meter',

            'Codes' => Noise::where('user_id', auth()->user()->id)->get() //with diguanakan untuk mengatasi N+1 problem

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
            'codesample_id'=>'required',
            'location_id'=>'required',
         
            'A1'=> 'required','A2'=>'required','A3'=>'required','A4'=>'required','A5'=>'required','A6'=>'required','A7'=>'required','A8'=>'required','A9'=>'required','A10'=>'required','A11'=>'required','A12'=>'required',
            'B1'=>'required','B2'=>'required','B3'=>'required','B4'=>'required','B5'=>'required','B6'=>'required','B7'=>'required','B8'=>'required','B9'=>'required','B10'=>'required','B11'=>'required','B12'=>'required',
            'C1'=>'required','C2'=>'required','C3'=>'required','C4'=>'required','C5'=>'required','C6'=>'required','C7'=>'required','C8'=>'required','C9'=>'required','C10'=>'required','C11'=>'required','C12'=>'required',
            'D1'=>'required','D2'=>'required','D3'=>'required','D4'=>'required','D5'=>'required','D6'=>'required','D7'=>'required','D8'=>'required','D9'=>'required','D10'=>'required','D11'=>'required','D12'=>'required',
            'E1'=>'required','E2'=>'required','E3'=>'required','E4'=>'required','E5'=>'required','E6'=>'required','E7'=>'required','E8'=>'required','E9'=>'required','E10'=>'required','E11'=>'required','E12'=>'required',
            'F1'=>'required','F2'=>'required','F3'=>'required','F4'=>'required','F5'=>'required','F6'=>'required','F7'=>'required','F8'=>'required','F9'=>'required','F10'=>'required','F11'=>'required','F12'=>'required',
            'G1'=>'required','G2'=>'required','G3'=>'required','G4'=>'required','G5'=>'required','G6'=>'required','G7'=>'required','G8'=>'required','G9'=>'required','G10'=>'required','G11'=>'required','G12'=>'required',
            'H1'=>'required','H2'=>'required','H3'=>'required','H4'=>'required','H5'=>'required','H6'=>'required','H7'=>'required','H8'=>'required','H9'=>'required','H10'=>'required','H11'=>'required','H12'=>'required',
            'I1'=>'required','I2'=>'required','I3'=>'required','I4'=>'required','I5'=>'required','I6'=>'required','I7'=>'required','I8'=>'required','I9'=>'required','I10'=>'required','I11'=>'required','I12'=>'required',
            'J1'=>'required','J2'=>'required','J3'=>'required','J4'=>'required','J5'=>'required','J6'=>'required','J7'=>'required','J8'=>'required','J9'=>'required','J10'=>'required','J11'=>'required','J12'=>'required',
        ]);
    
        $validatedData['date'] = date('Y-m-d', strtotime(request('date')));

        $validatedData['user_id']=auth()->user()->id;
        Noise::create($validatedData);
        return redirect('/airquality/noisemeter/noise/create')->with('success','New data Noise has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noise  $noise
     * @return \Illuminate\Http\Response
     */
    public function show(Noise $noise)
    {
        return view('dashboard.NoiseMeter.NoiseMaster.show', [
            "tittle" => "Noise Meter",
            'breadcrumb' => 'Noise Meter',
            'Master' => $noise
         
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noise  $noise
     * @return \Illuminate\Http\Response
     */
    public function edit(Noise $noise)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        return view('dashboard.NoiseMeter.NoiseMaster.edit', [
            "tittle" => "Noise Meter",
            'code_sample'=>Codesamplenm::all(),
            'code_location'=>Lokasi::all(),
            'breadcrumb' => 'Noise Meter',
            'Master' => $noise
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noise  $noise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noise $noise)
    {
        $rules = [
            'location_id'=>'required',
            'A1'=> 'required','A2'=>'required','A3'=>'required','A4'=>'required','A5'=>'required','A6'=>'required','A7'=>'required','A8'=>'required','A9'=>'required','A10'=>'required','A11'=>'required','A12'=>'required',
            'B1'=>'required','B2'=>'required','B3'=>'required','B4'=>'required','B5'=>'required','B6'=>'required','B7'=>'required','B8'=>'required','B9'=>'required','B10'=>'required','B11'=>'required','B12'=>'required',
            'C1'=>'required','C2'=>'required','C3'=>'required','C4'=>'required','C5'=>'required','C6'=>'required','C7'=>'required','C8'=>'required','C9'=>'required','C10'=>'required','C11'=>'required','C12'=>'required',
            'D1'=>'required','D2'=>'required','D3'=>'required','D4'=>'required','D5'=>'required','D6'=>'required','D7'=>'required','D8'=>'required','D9'=>'required','D10'=>'required','D11'=>'required','D12'=>'required',
            'E1'=>'required','E2'=>'required','E3'=>'required','E4'=>'required','E5'=>'required','E6'=>'required','E7'=>'required','E8'=>'required','E9'=>'required','E10'=>'required','E11'=>'required','E12'=>'required',
            'F1'=>'required','F2'=>'required','F3'=>'required','F4'=>'required','F5'=>'required','F6'=>'required','F7'=>'required','F8'=>'required','F9'=>'required','F10'=>'required','F11'=>'required','F12'=>'required',
            'G1'=>'required','G2'=>'required','G3'=>'required','G4'=>'required','G5'=>'required','G6'=>'required','G7'=>'required','G8'=>'required','G9'=>'required','G10'=>'required','G11'=>'required','G12'=>'required',
            'H1'=>'required','H2'=>'required','H3'=>'required','H4'=>'required','H5'=>'required','H6'=>'required','H7'=>'required','H8'=>'required','H9'=>'required','H10'=>'required','H11'=>'required','H12'=>'required',
            'I1'=>'required','I2'=>'required','I3'=>'required','I4'=>'required','I5'=>'required','I6'=>'required','I7'=>'required','I8'=>'required','I9'=>'required','I10'=>'required','I11'=>'required','I12'=>'required',
            'J1'=>'required','J2'=>'required','J3'=>'required','J4'=>'required','J5'=>'required','J6'=>'required','J7'=>'required','J8'=>'required','J9'=>'required','J10'=>'required','J11'=>'required','J12'=>'required',
       
        ];
    
     
        $validatedData=$request->validate($rules);
        $validatedData['date'] = date('Y-m-d', strtotime(request('date')));
        $validatedData['user_id']=auth()->user()->id;
        Noise::where('id',$noise->id)
        ->update($validatedData);
        return redirect('/airquality/noisemeter/noise')->with('success',' Data noise has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noise  $noise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noise $noise)
    {
        Noise::destroy($noise->id);
        return redirect('/airquality/noisemeter/noise')->with('success', ' Data noise has been deleted!');
    }
}
