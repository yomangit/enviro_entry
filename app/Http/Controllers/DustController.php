<?php

namespace App\Http\Controllers;

use App\Models\Codesampledg;
use App\Models\Dust;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DustController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('dashboard.DustGauge.DustMaster.index',[
            "tittle"=>"Dust Gauge",
            'code_units'=>Codesampledg::all(),
            'breadcrumb'=>'Dust Gauge',
            'Dust'=>Dust::where('user_id',auth()->user()->id)->latest()->filter(request(['fromDate','search']))->paginate(10)->withQueryString()]);
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
        return view('dashboard.DustGauge.DustMaster.create',[
            "tittle"=>"Dust Gauge",
            'code_units'=>Codesampledg::all(),
            'Codes'=>Dust::with('user')->filter(request(['fromDate']))->get()//with diguanakan untuk mengatasi N+1 problem

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
            'codedust_id'=>'required',
            'date_in'=> 'required',
            'date_out'=>'required',
            'm4'=>'required',
            'm3'=>'required',
            'm6'=>'required',
            'm5'=>'required',
            'no_insect'=>'required',
            'vb_dirt'=>'required',
            'vb_algae'=>'required',
            'area_observation'=>'required',
            'observer'=>'required|max:255',
            'volume_filtrat'=>'required',
            'total_vlm_water'=>'required',
            'remarks'=>'required'
        ]);
      
        $validatedData['date_in']= date('Y-m-d',strtotime(request('date_in')));
        $validatedData['date_out']= date('Y-m-d',strtotime(request('date_out')));
        $validatedData['user_id']=auth()->user()->id;
        Dust::create($validatedData);
        return redirect('/dashboard/dustgauge/dust/create')->with('success','New Data Dust Gauge has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dust  $dust
     * @return \Illuminate\Http\Response
     */
    public function show(Dust $dust)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dust  $dust
     * @return \Illuminate\Http\Response
     */
    public function edit(Dust $dust)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        return view('dashboard.DustGauge.DustMaster.edit',[
            "tittle"=>"Dust Gauge",
            'code_units'=>Codesampledg::all(),
            'breadcrumb'=>'Dust Gauge"',
            'Codes'=>$dust
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dust  $dust
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dust $dust)
    {
        $rules = [
            'codedust_id'=>'required',
            'm4'=>'required',
            'm3'=>'required',
            'm6'=>'required',
            'm5'=>'required',
            'no_insect'=>'required',
            'vb_dirt'=>'required',
            'vb_algae'=>'required',
            'area_observation'=>'required',
            'observer'=>'required|max:255',
            'volume_filtrat'=>'required',
            'total_vlm_water'=>'required',
            'remarks'=>'required',
            'hard_copy.*'=>'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf,docx|max:1024'
        ];
    
     
    
        $validatedData=$request->validate($rules);
        if ($request->file('hard_copy')) {
            if ($request->oldHard_copy) {
                Storage::delete($request->oldHard_copy);
            }
            $validatedData['hard_copy']=$request->file('hard_copy')->store('dust-images');
        }
        $validatedData['date_in']= date('Y-m-d',strtotime(request('date_in')));
        $validatedData['date_out']= date('Y-m-d',strtotime(request('date_out')));
        $validatedData['user_id']=auth()->user()->id;
        Dust::where('id',$dust->id)
        ->update($validatedData);
        return redirect('/dashboard/dustgauge/dust')->with('success',' Data Dust has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dust  $dust
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dust $dust)
    {
        Dust::destroy($dust->id);
        return redirect('/dashboard/dustgauge/dust')->with('success','Data Dust has been deleted!');
    }
}
