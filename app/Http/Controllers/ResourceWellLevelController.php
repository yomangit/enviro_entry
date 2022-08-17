<?php

namespace App\Http\Controllers;

use App\Models\Mastergw;
use App\Models\welllevel;
use App\Models\Codesamplegw;
use Illuminate\Http\Request;

class ResourceWellLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('dashboard.GroundWater.GroundWellLevel.index',[
            "tittle"=>"Code Unit",
            'code_units'=>Codesamplegw::all(),
            'breadcrumb'=>'Ground Well Level',
      'Codes'=>Mastergw::with('user')->latest()->filter(request(['fromDate','search']))->paginate(10)->withQueryString()//with diguanakan untuk mengatasi N+1 problem

         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.GroundWater.GroundWellLevel.create',[
            "tittle"=>"Code Sample",
            'Codes'=>welllevel::where('user_id',auth()->user()->id)->filter(request(['fromDate']))->get()//with diguanakan untuk mengatasi N+1 problem

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
            'code_sample'=>'required',
            'mbgl'=>'required|max:255',
            'rl'=>'required'
         
        ]);
     
        $validatedData['user_id']=auth()->user()->id;
        welllevel::create($validatedData);
        return redirect('/dashboard/groundwater/level/create')->with('success','New Data Ground Well has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\welllevel  $welllevel
     * @return \Illuminate\Http\Response
     */
    public function show(welllevel $welllevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\welllevel  $welllevel
     * @return \Illuminate\Http\Response
     */
    public function edit(welllevel $welllevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\welllevel  $welllevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, welllevel $welllevel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\welllevel  $welllevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(welllevel $welllevel)
    {
        //
    }
}
