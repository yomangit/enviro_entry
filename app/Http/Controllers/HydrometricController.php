<?php

namespace App\Http\Controllers;

use App\Models\Hydrometric;
use App\Exports\HydroExport;
use App\Imports\HydroImport;
use Illuminate\Http\Request;
use App\Models\CodeHydrometric;
use App\Models\Wastewaterstandard;
use Maatwebsite\Excel\Facades\Excel;

class HydrometricController extends Controller
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
        $grafiks = Hydrometric::with('user')
            ->filter(request(['fromDate', 'search']))->paginate($table)->withQueryString();
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
        $tdsStandard = [];
        $conductivityStandard = [];
        $phMin = [];
        $phMax = [];
        $doStandard = [];

        foreach ($grafiks as $grafik) {
            $nama[] = $grafik->CodeSample->nama;
            $lokasi[] = $grafik->CodeSample->lokasi;
            // $doStandard[]=$grafik->standard->do;
            $tanggal[] = date('d-M-Y', strtotime($grafik->date));
            
            if (!is_numeric($grafik->ph)) {
                $phMax[] = '';
                $phMin[] = '';
            } 
            elseif (is_numeric($grafik->standard->ph_max) && $grafik->standard->ph_min) 
            {
                $phMax[] = doubleval($grafik->standard->ph_max);
                $phMin[] = doubleval($grafik->standard->ph_min);
            } 
            if (is_numeric($grafik->standard->conductivity)) {
                $conductivityStandard[] = doubleval($grafik->standard->conductivity);
            } else {
                $conductivityStandard[] = '';
            }
            if ($grafik->standard->totalsuspendedsolids_tss) {
                $tssStandard[] = doubleval($grafik->standard->totalsuspendedsolids_tss);
            } else {
                $tdsStandard[] = '';
            }
            if ($grafik->standard->totaldissolvedsolids_tds) {
                $tdsStandard[] = doubleval($grafik->standard->totaldissolvedsolids_tds);
            } else {
                $tssStandard[] = '';
            }
            if (is_numeric($grafik->standard->dissolvedoxygen_do)) {
                $doStandard[] = doubleval($grafik->standard->dissolvedoxygen_do);
            } else {
                $doStandard[] = '';
            }
            if (is_numeric($grafik->temperatur)) {
                $suhu[] = doubleval($grafik->temperatur);
            } else {

                $suhu[] = '';
            }
            if (is_numeric($grafik->conductivity)) {
                $conductivity[] =  doubleval($grafik->conductivity);
            } else {

                $conductivity[] = '';
            }
            if (is_numeric($grafik->tds)) {

                $tds[] =  doubleval($grafik->tds);
            } else {
                $tds[] = '';
            }
            if (is_numeric($grafik->tss)) {
                $tss[] =  doubleval($grafik->tss);
            } else {
                $tss[] = '';
            }
            if (is_numeric($grafik->ph)) {
                $ph[] =  doubleval($grafik->ph); # code...

            } else {
                $ph[] = '';
            }
            if (is_numeric($grafik->do)) {
                $do[] =  doubleval($grafik->do); # code...

            } else {
                $do[] = '';
            }
        }

        return view('dashboard.Hydrometric.WaterLevel.Master.index', [
            'code_units' => CodeHydrometric::all(),
            'standard' => Wastewaterstandard::all(),
            'tittle' => 'Water Level & Volume Pond',
            'breadcrumb' => 'Water Level & Volume Pond',
            'date' => $tanggal,
            'suhu' => $suhu,
            'conductivity' => $conductivity,
            'tds' => $tds,
            'tss' => $tss,
            'ph' => $ph,
            'do' => $do,
            'doStandard' => $doStandard,
            'tssStandard' => $tssStandard,
            'tdsStandard' => $tdsStandard,
            'cdvStd' => $conductivityStandard,
            'phMin' => $phMin,
            'phMax' => $phMax,
            'Hydrometric' => Hydrometric::with('user')->orderBy('date','desc')->filter(request(['fromDate', 'search']))->paginate(30)->withQueryString()
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
        try {
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
            'QualityStandard' => Wastewaterstandard::all(),
            'tittle' => 'Water Level & Volume Pond',
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
            'standard_id' => 'required',
            'cyanide' => 'required',
            'level' => 'required',
            'point_id' => 'required',
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
            'QualityStandard' => Wastewaterstandard::all(),
            'tittle' => 'Water Level & Volume Pond',
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
            'point_id' => 'required',
            'standard_id' => 'required',
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
