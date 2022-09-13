<?php

namespace App\Http\Controllers;

use App\Exports\BlastingExport;
use App\Imports\BlastingImport;
use App\Models\Blasting;
use Illuminate\Http\Request;
use App\Models\PointIdBlasting;
use App\Models\StandardBlasting;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\PrettyPrinter\Standard;

class BlastingController extends Controller
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
        $grafiks = Blasting::with('user')->filter(request(['fromDate', 'search']))->paginate($table)->withQueryString();
        $tanggal = [];
        $peak_std = [];
        $noise_std = [];
        $noise = [];
        $peak = [];
        foreach ($grafiks as $grafik) {


            $tanggal[] = date('d-M-Y', strtotime($grafik->date));

            if (!is_numeric($grafik->peak_vektor)) {
                $peak_std[] = '';
            }
            elseif (is_numeric($grafik->StandardID->ppv)) {
                $peak_std[] = doubleval($grafik->StandardID->ppv);
            } else {

                $peak_std[] = '';
            }
            if (is_numeric($grafik->peak_vektor)) {
                $peak[] = doubleval($grafik->peak_vektor);
            } else {
                $peak[] = '';
            }



            if (is_numeric($grafik->noise_level)) {
                $noise[] = doubleval($grafik->noise_level);
            } else {
                $noise[] = '';
            }
            if (!is_numeric($grafik->noise_level)) {
                $noise_std[] = '';
            }
            elseif (is_numeric($grafik->StandardID->noise_level)) {
                $noise_std[] = doubleval($grafik->StandardID->noise_level);
            } else {
                $noise_std[] = '';
            }
            
          
        }


        return view('dashboard.Blasting.Master.index', [
            "tittle" => " Blasting",
            'breadcrumb' => ' Blasting',
            'Point_ID' => PointIdBlasting::all(),
            'noise'=>$noise,
            'noise_std'=>$noise_std,
            'peak' => $peak,
            'peak_std' => $peak_std,
            'date' => $tanggal,
            'Standard_id' => StandardBlasting::all(),
            'Blasting' => Blasting::with('user')->filter(request(['fromDate', 'search']))->orderBy('date','desc')->paginate(30)->withQueryString() //with diguanakan untuk mengatasi N+1 problem

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
        return redirect('/blasting')->with('success', 'New Data Blasting has been Imported!');
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
        return view('dashboard.Blasting.Master.create', [
            "tittle" => " Blasting",
            'breadcrumb' => ' Blasting',
            'Point_ID' => PointIdBlasting::all(),
            'TableStandard' => StandardBlasting::all(),
            'breadcrumb' => ' Blasting',
            'Blasting' => Blasting::where('user_id', auth()->user()->id)->get() //with diguanakan untuk mengatasi N+1 problem

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
            'point_id' => 'required',
            'standard_id' => 'required',
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
            'remarks' => 'required',
        ]);

        $validatedData['date'] = date('Y-m-d', strtotime(request('date')));
        $validatedData['user_id'] = auth()->user()->id;
        Blasting::create($validatedData);
        return redirect('/blasting/create')->with('success', 'New Data Blasting has been added!');
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
        return view('dashboard.Blasting.Master.edit', [
            "tittle" => " Blasting",
            'breadcrumb' => ' Blasting',
            'Point_ID' => PointIdBlasting::all(),
            'TableStandard' => StandardBlasting::all(),
            'breadcrumb' => ' Blasting',
            'Blasting' => $blasting

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
            'point_id' => 'required',
            'standard_id' => 'required',
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
            'remarks' => 'required',
            'sampler' => 'required',
        ];



        $validatedData = $request->validate($rules);

        $validatedData['date'] = date('Y-m-d', strtotime(request('date')));
        $validatedData['user_id'] = auth()->user()->id;
        Blasting::where('id', $blasting->id)
            ->update($validatedData);
        return redirect('/blasting')->with('success', ' Data Entry has been updated!');
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
        return redirect('/blasting')->with('success', 'Data Blasting has been deleted!');
    }
}
