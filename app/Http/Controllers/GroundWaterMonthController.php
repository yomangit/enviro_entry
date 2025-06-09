<?php

namespace App\Http\Controllers;

use App\Models\Codesamplegw;
use Illuminate\Http\Request;
use App\Models\GroundWaterMonth;
use App\Models\GroundWaterMonthStandard;

class GroundWaterMonthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.GroundWater.Month.index',[
            "tittle"=>"Ground Water table Standard",
            'breadcrumb'=>'Ground Water table Standard',
            'code_units'=>Codesamplegw::all(),
            'quality_units'=>GroundWaterMonthStandard::all(),
            'GroundwaterMonthly'=>GroundWaterMonth::where('user_id',auth()->user()->id)->latest()->filter(request(['fromDate','search']))->paginate(30)->withQueryString()
            
         ]);
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
        return view('dashboard.GroundWater.Month.create',[
            "tittle"=>"Ground Water table Standard",
            'breadcrumb'=>'Ground Water table Standard',
            'code_units'=>Codesamplegw::all(),
            'quality_units'=>GroundWaterMonthStandard::all(),
            'GroundwaterMonthly'=>GroundWaterMonth::where('user_id',auth()->user()->id)->latest()->filter(request(['fromDate','search']))->paginate(30)->withQueryString()
            
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
     * @param  \App\Models\GroundWaterMonth  $monthly
     * @return \Illuminate\Http\Response
     */
    public function show(GroundWaterMonth $monthly)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroundWaterMonth  $monthly
     * @return \Illuminate\Http\Response
     */
    public function edit(GroundWaterMonth $monthly)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GroundWaterMonth  $monthly
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroundWaterMonth $monthly)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroundWaterMonth  $monthly
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroundWaterMonth $monthly)
    {
        //
    }
}
