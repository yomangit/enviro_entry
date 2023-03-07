<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use App\Models\ResumeBulananNoise;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportResumeBulananNoise;
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

        $firstDayofPreviousMonth = doubleval(strtotime(request('fromDate')));
        $lastDayofPreviousMonth = doubleval(strtotime(request('toDate')));
        if ( empty($firstDayofPreviousMonth) ) {
            $table=30;
        }
        else
        $table = ($lastDayofPreviousMonth-$firstDayofPreviousMonth)/86400;

        $avg_l1= ResumeBulananNoise::with('user')->orderBy('date','desc')->filter(request(['fromDate','location1','location2','location','bulan']))->paginate($table)->withQueryString()->avg('l1');
        $avg_l2= ResumeBulananNoise::with('user')->orderBy('date','desc')->filter(request(['fromDate','location1','location2','location','bulan']))->paginate($table)->withQueryString()->avg('l2');
        $avg_l3= ResumeBulananNoise::with('user')->orderBy('date','desc')->filter(request(['fromDate','location1','location2','location','bulan']))->paginate($table)->withQueryString()->avg('l3');
        $avg_l4= ResumeBulananNoise::with('user')->orderBy('date','desc')->filter(request(['fromDate','location1','location2','location','bulan']))->paginate($table)->withQueryString()->avg('l4');
        $avg_l5= ResumeBulananNoise::with('user')->orderBy('date','desc')->filter(request(['fromDate','location1','location2','location','bulan']))->paginate($table)->withQueryString()->avg('l5');
        $avg_l6= ResumeBulananNoise::with('user')->orderBy('date','desc')->filter(request(['fromDate','location1','location2','location','bulan']))->paginate($table)->withQueryString()->avg('l6');
        $avg_l7= ResumeBulananNoise::with('user')->orderBy('date','desc')->filter(request(['fromDate','location1','location2','location','bulan']))->paginate($table)->withQueryString()->avg('l7');
        $avg_ls= ResumeBulananNoise::with('user')->orderBy('date','desc')->filter(request(['fromDate','location1','location2','location','bulan']))->paginate($table)->withQueryString()->avg('ls');
        $avg_lm= ResumeBulananNoise::with('user')->orderBy('date','desc')->filter(request(['fromDate','location1','location2','location','bulan']))->paginate($table)->withQueryString()->avg('lm');
        $avg_lsm= ResumeBulananNoise::with('user')->orderBy('date','desc')->filter(request(['fromDate','location1','location2','location','bulan']))->paginate($table)->withQueryString()->avg('lsm');
        $Resume=ResumeBulananNoise::with('user')->orderBy('date','desc')->filter(request(['fromDate','location1','location2','location','bulan']))->paginate($table)->withQueryString();
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
        $nama=[];
      
        foreach ($Resume as $item ) {
            $date[]=date('M-Y', strtotime( $item->date));
			$nama[] = $item->CodeLocationNM->nama;
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
            'nama'=>$nama,
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
            'ResumeBulanan' => ResumeBulananNoise::with('user')->orderBy('date','desc')->filter(request(['fromDate','location1','location2','location','bulan']))->paginate(30)->withQueryString() //with diguanakan untuk mengatasi N+1 problem
        ]);
    }

    public function ImportResumeBulananNoise(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        try {
            Excel::import(new ImportResumeBulananNoise(), public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/airquality/noisemeter/resumebulanan')->with('success', 'New Data  has been Imported!');
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
            'locationresume'=>'required',
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
        return redirect('/airquality/noisemeter/resumebulanan')->with('success','New data has been added!');
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
        return redirect('/airquality/noisemeter/resumebulanan')->with('success','Noise Monthly Resume has been deleted!');
    }
}
