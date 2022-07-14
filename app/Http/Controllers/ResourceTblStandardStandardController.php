<?php

namespace App\Http\Controllers;

use App\Models\Tablestandard;
use Illuminate\Http\Request;

class ResourceTblStandardStandardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.GroundWater.Standard.index',[
            "tittle"=>"Code Unit",
            'breadcrumb'=>'Table Standard Ground Water',
      'Codes'=>Tablestandard::with('user')->filter(request(['fromDate','search']))->paginate(80)->withQueryString()//with diguanakan untuk mengatasi N+1 problem

         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.GroundWater.Standard.create',[
            "tittle"=>"Monthly Report",
            'Codes'=>Tablestandard::with('user')->get()//with diguanakan untuk mengatasi N+1 problem

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tablestandard  $tablestandard
     * @return \Illuminate\Http\Response
     */
    public function show(Tablestandard $tablestandard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tablestandard  $tablestandard
     * @return \Illuminate\Http\Response
     */
    public function edit(Tablestandard $tablestandard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tablestandard  $tablestandard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tablestandard $tablestandard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tablestandard  $tablestandard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tablestandard $tablestandard)
    {
        //
    }
}
