<?php

namespace App\Http\Controllers;

use App\Models\Codesamplenm;
use Illuminate\Http\Request;

class CodeSampleNMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.NoiseMeter.CodeSampleNM.index',[
            "tittle"=>"Code Sample: Noise Meter",
            'breadcrumb'=>'Code Sample Noise Meter ',
      'Codes'=>Codesamplenm::where('user_id',auth()->user()->id)->filter(request(['fromDate','search']))->paginate(10)->withQueryString()//with diguanakan untuk mengatasi N+1 problem

         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.NoiseMeter.CodeSampleNM.create',[
            "tittle"=>"Code Sample: Noise Meter",
            'breadcrumb'=>'Code Sample: Noise Meter ',
            'Codes'=>Codesamplenm::where('user_id',auth()->user()->id)->filter(request(['fromDate']))->get()//with diguanakan untuk mengatasi N+1 problem

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
         
        ]);
     
        $validatedData['user_id']=auth()->user()->id;
        Codesamplenm::create($validatedData);
        return redirect('/dashboard/dustgauge/noisemeter/noise/codesamplenm/create')->with('success','New code sample noise meter has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Codesamplenm  $codesamplenm
     * @return \Illuminate\Http\Response
     */
    public function show(Codesamplenm $codesamplenm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Codesamplenm  $codesamplenm
     * @return \Illuminate\Http\Response
     */
    public function edit(Codesamplenm $codesamplenm)
    {
        return view('dashboard.NoiseMeter.CodeSampleNM.edit', [
            "tittle" => "Code Sample: Noise Meter",
            'breadcrumb' => 'Code Sample Noise Meter',
            'Codes' => $codesamplenm
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Codesamplenm  $codesamplenm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Codesamplenm $codesamplenm)
    {
        $rules = [
            'nama' => 'required|max:255',
        ];



        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        Codesamplenm::where('id', $codesamplenm->id)
            ->update($validatedData);
        return redirect('/dashboard/dustgauge/noisemeter/noise/codesamplenm')->with('success', ' code sample noise meter has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Codesamplenm  $codesamplenm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Codesamplenm $codesamplenm)
    {
        Codesamplenm::destroy($codesamplenm->id);
        return redirect('/dashboard/dustgauge/noisemeter/noise/codesamplenm')->with('success',' code sample noise meter has been deleted!');
    }
}
