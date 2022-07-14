<?php

namespace App\Http\Controllers;

use App\Exports\BlastingExport;
use App\Imports\BlastingImport;
use App\Models\Blasting;
use Illuminate\Http\Request;
use App\Models\PointIdBlasting;
use App\Models\StandardBlasting;
use Maatwebsite\Excel\Facades\Excel;

class BlastingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     


    public function index()
    {

        $grafiks = Blasting::where('user_id', auth()->user()->id)->filter(request(['fromDate', 'search']))->paginate(20)->withQueryString();
        $tanggal = [];
        $freq = [];
        $peak = [];
        $freq1 = [];
        $peak1 = [];
        foreach ($grafiks as $grafik) {

            
             $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
            if ($freq1[] = $grafik->StandardID->ppv === 'error') {
                //   $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
                $freq[] = '';
            } elseif ($freq1[] =$grafik->StandardID->ppv != 'error') {
                //  $tanggal[] = date('d-m-Y', strtotime($grafik->date));
                $freq[] = $freq1[] = doubleval($grafik->StandardID->ppv);
            }
            if ($peak1[] = $grafik->peak_vektor === 'error') {
                // $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
                $peak[] = '';
            } elseif ($peak1[] =$grafik->peak_vektor != 'error') {
                // $tanggal[] = date('d-m-Y', strtotime($grafik->date));
                $peak[] = $peak1[] = doubleval($grafik->peak_vektor);
            }
           
        }
  

        return view('dashboard.Blasting.Master.index',[
            "tittle"=>" Blasting",
            'breadcrumb'=>' Blasting',
            'Point_ID'=>PointIdBlasting::all(),
            'freq'=>$freq,
            'peak'=>$peak,
            'date'=>$tanggal,
            'Standard_id'=>StandardBlasting::all(),
            'Blasting'=>Blasting::where('user_id',auth()->user()->id)->filter(request(['fromDate','search']))->paginate(10)->withQueryString()//with diguanakan untuk mengatasi N+1 problem

         ]);
    }
    public function ExportBlasting()
    {
        return Excel::download(new BlastingExport, 'blastings.xlsx');
    }
    public function ImportBlasting(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        Excel::import(new BlastingImport, public_path('/EnviroDatabase/' . $nameFile));
        return redirect('/dashboard/blasting')->with('success', 'New Data Blasting has been Imported!');
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
        return view('dashboard.Blasting.Master.create',[
            "tittle"=>" Blasting", 
            'breadcrumb'=>' Blasting',
            'Point_ID'=>PointIdBlasting::all(),
            'TableStandard'=>StandardBlasting::all(),
            'breadcrumb'=>' Blasting',
            'Blasting'=>Blasting::where('user_id',auth()->user()->id)->get()//with diguanakan untuk mengatasi N+1 problem

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
           
            'time' => 'required',
            'point_id'=>'required',
            'standard_id'=>'required',
            'transversal_freq' => 'required',
            'vertical_freq' => 'required',
            'longitudinal_freq' => 'required',

            'transversal_ppv' => 'required',
            'vertical_ppv' => 'required',
            'longitudinal_ppv' => 'required',

            'peak_vektor' => 'required|max:255',
            'noise_level' => 'required|max:255',
            'blast_location' => 'required',
            'weather' => 'required',
            'sampler' => 'required',
        ]);

        $validatedData['date']= date('Y-m-d',strtotime(request('date')));
        $validatedData['user_id'] = auth()->user()->id;
        Blasting::create($validatedData);
        return redirect('/dashboard/blasting/create')->with('success', 'New Data Blasting has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blasting  $blasting
     * @return \Illuminate\Http\Response
     */
    public function show(Blasting $blasting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blasting  $blasting
     * @return \Illuminate\Http\Response
     */
    public function edit(Blasting $blasting)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        return view('dashboard.Blasting.Master.edit',[
            "tittle"=>" Blasting", 
            'breadcrumb'=>' Blasting',
            'Point_ID'=>PointIdBlasting::all(),
            'TableStandard'=>StandardBlasting::all(),
            'breadcrumb'=>' Blasting',
            'Blasting'=>$blasting

         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blasting  $blasting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blasting $blasting)
    {
        $rules = [
          
            'time' => 'required',
            'point_id'=>'required',
            'standard_id'=>'required',
            'transversal_freq' => 'required',
            'vertical_freq' => 'required',
            'longitudinal_freq' => 'required',

            'transversal_ppv' => 'required',
            'vertical_ppv' => 'required',
            'longitudinal_ppv' => 'required',

            'peak_vektor' => 'required|max:255',
            'noise_level' => 'required|max:255',
            'blast_location' => 'required',
            'weather' => 'required',
            'sampler' => 'required',
        ];



        $validatedData = $request->validate($rules);
       
        $validatedData['date']= date('Y-m-d',strtotime(request('date')));
        $validatedData['user_id'] = auth()->user()->id;
        Blasting::where('id', $blasting->id)
            ->update($validatedData);
        return redirect('/dashboard/blasting')->with('success', ' Data Entry has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blasting  $blasting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blasting $blasting)
    {
        Blasting::destroy($blasting->id);
        return redirect('/dashboard/blasting')->with('success','Data Blasting has been deleted!');
    }
}
