<?php

namespace App\Http\Controllers;

use App\Models\ResumeBulananNoise;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Averages;

class ResumeBulananNoiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avg_l1= ResumeBulananNoise::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString()->avg('l1');
        $avg_l2= ResumeBulananNoise::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString()->avg('l2');
        $avg_l3= ResumeBulananNoise::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString()->avg('l3');
        $avg_l4= ResumeBulananNoise::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString()->avg('l4');
        $avg_l5= ResumeBulananNoise::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString()->avg('l5');
        $avg_l6= ResumeBulananNoise::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString()->avg('l6');
        $avg_l7= ResumeBulananNoise::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString()->avg('l7');
        $avg_ls= ResumeBulananNoise::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString()->avg('ls');
        $avg_lm= ResumeBulananNoise::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString()->avg('lm');
        $avg_lsm= ResumeBulananNoise::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString()->avg('lsm');
        $Resume=ResumeBulananNoise::where('user_id', auth()->user()->id)->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString();
        $l1=[];
        $l2=[];
        $l3=[];
        $l4=[];
        $l5=[];
        $l6=[];
        $l7=[];
        $ls=[];
        $lm=[];
        $lsm=[];
        $date=[];
        $location=[];
      
        foreach ($Resume as $item ) {
            $date[]=date('M-Y', strtotime( $item->date));
            $l1[]=doubleVal($item->l1);
            $l2[]=doubleval($item->l2);
            $l3[]=doubleval($item->l3);
            $l4[]=doubleval($item->l4);
            $l5[]=doubleval($item->l5);
            $l6[]=doubleval($item->l6);
            $l7[]=doubleval($item->l7);
            $ls[]=doubleval($item->ls);
            $lm[]=doubleval($item->lm);
            $lsm[]=doubleval($item->lsm );
            $location[]=$item->location;
        }

        return view('dashboard.NoiseMeter.ResumeBulanan.index', [
            "tittle" => "Noise Monthly Resume",
            'breadcrumb' => 'Noise Monthly Resume',
            'l1'=>$l1,
            'l2'=>$l2,
            'l3'=>$l3,
            'l4'=>$l4,
            'l5'=>$l5,
            'l6'=>$l6,
            'l7'=>$l7,
            'ls'=>$ls,
            'lm'=>$lm,
            'lsm'=>$lsm,
            'date'=>$date,
            'location'=>$location,
            'avg_l1'=>doubleval($avg_l1),
            'avg_l2'=>doubleval($avg_l2),
            'avg_l3'=>doubleval($avg_l3),
            'avg_l4'=>doubleval($avg_l4),
            'avg_l5'=>doubleval($avg_l5),
            'avg_l6'=>doubleval($avg_l6),
            'avg_l7'=>doubleval($avg_l7),
            'avg_ls'=>doubleval($avg_ls),
            'avg_lm'=>doubleval($avg_lm),
            'avg_lsm'=>doubleval($avg_lsm),
            'code_location'=>Lokasi::all(),
            'ResumeBulanan' => ResumeBulananNoise::where('user_id', auth()->user()->id)->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString() //with diguanakan untuk mengatasi N+1 problem
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           
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
            'locationResume'=>'required',
            'l1'=>'required',
            'l2'=>'required',
            'l3'=>'required',
            'l4'=>'required',
            'l5'=>'required',
            'l6'=>'required',
            'l7'=>'required',
            'ls'=>'required',
            'lm'=>'required',
            'lsm'=>'required',
        ]);
        $validatedData['date'] = date('Y-m-d', strtotime(request('date')));
        $validatedData['user_id']=auth()->user()->id;
        ResumeBulananNoise::create($validatedData);
        return redirect('/dashboard/dustgauge/resumebulanan')->with('success','New data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResumeBulananNoise  $resumebulanan
     * @return \Illuminate\Http\Response
     */
    public function show(ResumeBulananNoise $resumebulanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResumeBulananNoise  $resumebulanan
     * @return \Illuminate\Http\Response
     */
    public function edit(ResumeBulananNoise $resumebulanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResumeBulananNoise  $resumebulanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResumeBulananNoise $resumebulanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResumeBulananNoise  $resumebulanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResumeBulananNoise $resumebulanan)
    {
        ResumeBulananNoise::destroy($resumebulanan->id);
        return redirect('/dashboard/dustgauge/resumebulanan')->with('success','Noise Monthly Resume has been deleted!');
    }
}
