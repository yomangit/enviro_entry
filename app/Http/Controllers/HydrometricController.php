<?php

namespace App\Http\Controllers;

use App\Models\Hydrometric;
use App\Exports\HydroExport;
use App\Imports\HydroImport;
use Illuminate\Http\Request;
use App\Models\CodeHydrometric;
use App\Models\QualityStandard;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\PrettyPrinter\Standard;

class HydrometricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grafiks = Hydrometric::with('user','standard')
            ->filter(request(['fromDate', 'search']))->get();
        $tanggal = [];
        $suhu = [];
        $conductivity = [];
        $tds = [];
        $nama = [];
        $lokasi = [];
        $tss = [];
        $ph = [];
        $do = [];
        $tssStandard = [];
        $conductivityStandard = [];
        $phMin = [];
        $phMax = [];
        $doStandard = [];

        foreach ($grafiks as $grafik) {
            $nama[] = $grafik->CodeSample->nama;
            $lokasi[] = $grafik->CodeSample->lokasi;
            // $doStandard[]=$grafik->standard->do;
            $tanggal[] = date('d-m-Y', strtotime($grafik->date));
            if ($grafik->standard->ph_max === '-') {
                
                $phMax[] = '';
            } elseif ($grafik->standard->ph_max != '-') {
                
                $phMax[] = doubleval($grafik->standard->ph_max);
            }
            if ($grafik->standard->ph_min === '-') {
                
                $phMin[] = '';
            } elseif ($grafik->standard->ph_min != '-') {
                
                $phMin[] = doubleval($grafik->standard->ph_min);
            }
            if ($grafik->standard->conductivity === '-') {
                
                $conductivityStandard[] = '';
            } elseif ($grafik->standard->conductivity != '-') {
                
                $conductivityStandard[] = doubleval($grafik->standard->conductivity);
            }
            if ($grafik->standard->tss === '-') {
                
                $tssStandard[] = '';
            } elseif ($grafik->standard->tss != '-') {
                
                $tssStandard[] = doubleval($grafik->standard->tss);
            }
            if ($grafik->standard->do === '-') {
                
                $doStandard[] = '';
            } elseif ($grafik->standard->do != '-') {
                
                $doStandard[] = doubleval($grafik->standard->do);
            }
            if ($grafik->temperatur === '-') {
                
                $suhu[] = '';
            } elseif ($grafik->temperatur != '-') {
                
                $suhu[] = doubleval($grafik->temperatur);
            }
            if ( $grafik->conductivity === '-') {
                
                $conductivity[] = '';
            } elseif ( $grafik->conductivity != '-') {
               
                $conductivity[] =  doubleval($grafik->conductivity);
            }
            if ( $grafik->tds === '-') {
                $tds[] = '';
                
            } elseif ( $grafik->tds !='-') {
                $tds[] =  doubleval($grafik->tds);
               
            }
            if ( $grafik->tss === '-' ) {
                
                $tss[] = '';
            } elseif ( $grafik->tss !='-') {
                $tss[] =  doubleval($grafik->tss);
               
                # code...
            }
            if ( $grafik->ph === '-') {
                
                $ph[] = '';
            } elseif ( $grafik->ph !='-') {
                $ph[] =  doubleval($grafik->ph); # code...
               
            }
            if ( $grafik->do === '-') {
                
                $do[] = '';
            } elseif ( $grafik->do !='-') {
                $do[] =  doubleval($grafik->do); # code...
               
            }

           
        }

        return view('dashboard.Hydrometric.WaterLevel.Master.index',[
            'code_units' => CodeHydrometric::all(),
            'standard' => QualityStandard::all(),
            'tittle'=>'Hydrometric',
            'breadcrumb' => 'Water Level & Volume Pond',
            'date' => $tanggal,
            'suhu' => $suhu,
            'conductivity' => $conductivity,
            'tds' => $tds,
            'tss' => $tss,
            'ph' => $ph,
            'do' =>$do,
            'doStandard'=>$doStandard,
            'tssStandard'=>$tssStandard,
            'cdvStd'=>$conductivityStandard,
            'phMin'=>$phMin,
            'phMax'=>$phMax,
            'Hydrometric' => Hydrometric::where('user_id',auth()->user()->id)->filter(request(['fromDate', 'search']))->paginate(30)->withQueryString()
        ]);
    }
    public function ExportHydro()
    {
        return Excel::download(new HydroExport(), 'Hydrometic.csv');
    }
    public function ImportHydro(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        try{
            Excel::import(new HydroImport(), public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/hydrometric/wlvp')->with('success', 'New Data has been Imported!');
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
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        return view('dashboard.Hydrometric.WaterLevel.Master.create', [
            'code_units' => CodeHydrometric::all(),
            'tittle' => 'Hydrometric',
            'breadcrumb' => 'Water Level & Volume Pond',
            'Hydrometric' => Hydrometric::where('user_id', auth()->user()->id)
                ->latest()
                ->get(), //with diguanakan untuk mengatasi N+1 problem
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
            'start_time' => 'required|max:255',
            'stop_time' => 'required|max:255',
            'cyanide' => 'required',
            'level' => 'required',
            'codeHydrometric_id' => 'required',
            'lvl_lgr' => 'required',
            'tl_wall' => 'required',
            'tl_tsf' => 'required',
            'debit_s' => 'required',
            'debit_d' => 'required',
            'orp' => 'required|max:255',
            'tss' => 'required|max:255',
            'ph' => 'required',
            'do' => 'required',
            'conductivity' => 'required',
            'tds' => 'required',
            'temperatur' => 'required',
            'salinity' => 'required',
            'turbidity' => 'required',
            'water_condition' => 'required',
            'water_color' => 'required',
            'odor' => 'required',
            'rain' => 'required',
            'rain_during_sampling' => 'required',
            'oil_layer' => 'required',
            'source_pollution' => 'required',
            'remarks' => 'required',
            'sampler' => 'required',
        ]);
        $validatedData['date'] = date('Y-m-d', strtotime(request('date')));
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['standard_id'] = '1';
        Hydrometric::create($validatedData);
        return redirect('/hydrometric/wlvp')->with('success', 'New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hydrometric  $wlvp
     * @return \Illuminate\Http\Response
     */
    public function show(Hydrometric $wlvp)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hydrometric  $wlvp
     * @return \Illuminate\Http\Response
     */
    public function edit(Hydrometric $wlvp)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        return view('dashboard.Hydrometric.WaterLevel.Master.edit', [
            'code_units' => CodeHydrometric::all(),
            'tittle' => 'Hydrometric',
            'breadcrumb' => 'Water Level & Volume Pond',
            'Hydrometric' => $wlvp //with diguanakan untuk mengatasi N+1 problem
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hydrometric  $wlvp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hydrometric $wlvp)
    {
        $rules = [
            'codeHydrometric_id' => 'required',
            'stop_time' => 'required|max:255',
            'start_time' => 'required|max:255',
            'level' => 'required',
            'cyanide' => 'required',
            'lvl_lgr' => 'required',
            'tl_wall' => 'required',
            'tl_tsf' => 'required',
            'debit_s' => 'required',
            'debit_d' => 'required',
            'orp' => 'required|max:255',
            'tss' => 'required|max:255',
            'ph' => 'required',
            'do' => 'required',
            'conductivity' => 'required',
            'tds' => 'required',
            'temperatur' => 'required',
            'salinity' => 'required',
            'turbidity' => 'required',
            'water_condition' => 'required',
            'water_color' => 'required',
            'odor' => 'required',
            'rain' => 'required',
            'rain_during_sampling' => 'required',
            'oil_layer' => 'required',
            'source_pollution' => 'required',
            'sampler' => 'required',
            'remarks' => 'required',
        ];

        $validatedData = $request->validate($rules);
       
        $validatedData['date'] = date('Y-m-d', strtotime(request('date')));
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['standard_id'] = '1';
        Hydrometric::where('id', $wlvp->id)->update($validatedData);
        return redirect('/hydrometric/wlvp')->with('success', ' Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hydrometric  $wlvp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hydrometric $wlvp)
    {
        Hydrometric::destroy($wlvp->id);
        return redirect('/hydrometric/wlvp')->with('success', ' Data has been updated!');
    }
}
