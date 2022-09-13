<?php

namespace App\Http\Controllers;

use App\Models\Dataentry;
use App\Models\Codesample;
use App\Exports\DataExport;
use App\Imports\DataImport;
use Illuminate\Http\Request;
use App\Models\Wastewaterstandard;
use App\Http\Controllers\Controller;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class ResourceDataEntryController extends Controller
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
        if (empty($firstDayofPreviousMonth)) {
            $table = 30;
        } else
            $table = ($lastDayofPreviousMonth - $firstDayofPreviousMonth) / 86400;
        $grafiks = Dataentry::with('user')
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
            $nama[] = $grafik->PointId->nama;
            $lokasi[] = $grafik->PointId->lokasi;
            // $doStandard[]=$grafik->standard->do;
            $tanggal[] = date('d-M-Y', strtotime($grafik->date));

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




            if (!is_numeric($grafik->ph)) {
                $phMax[] = '';
                $phMin[] = '';
            } 
            elseif (is_numeric($grafik->standard->ph_max) && $grafik->standard->ph_min) 
            {
                $phMax[] = doubleval($grafik->standard->ph_max);
                $phMin[] = doubleval($grafik->standard->ph_min);
            } 


            if (!is_numeric($grafik->conductivity)) {
                $conductivityStandard[] = '';
            } elseif (is_numeric($grafik->standard->conductivity)) {
                $conductivityStandard[] = doubleval($grafik->standard->conductivity);
            } else {
                $conductivityStandard[] = '';
            }
            if (!is_numeric($grafik->tss)) {
                $tssStandard[] = '';
            } elseif ($grafik->standard->totalsuspendedsolids_tss) {
                $tssStandard[] = doubleval($grafik->standard->totalsuspendedsolids_tss);
            } else {
                $tssStandard[] = '';
            }
            if (!is_numeric($grafik->tds)) {

                $tdsStandard[] = '';
            } elseif ($grafik->standard->totaldissolvedsolids_tds) {
                $tdsStandard[] = doubleval($grafik->standard->totaldissolvedsolids_tds);
            } else {
                $tdsStandard[] = '';
            }
            if (is_numeric($grafik->standard->dissolvedoxygen_do)) {
                $doStandard[] = doubleval($grafik->standard->dissolvedoxygen_do);
            } else {
                $doStandard[] = '';
            }
        }

        return view('dashboard.SurfaceWater.Master.index', [
            'code_units' => Codesample::all(),
            'QualityStandard' => Wastewaterstandard::all(),
            'tittle' => 'Surface Water',
            'breadcrumb' => 'Surface Water',
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
            'Input' => Dataentry::with('user')->orderBy('date', 'desc')
                ->filter(request(['fromDate', 'search']))
                ->paginate(30)
                ->withQueryString(), //with diguanakan untuk mengatasi N+1 problem
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
        return view('dashboard.SurfaceWater.Master.create', [
            'code_units' => Codesample::all(),
            'QualityStandard' => Wastewaterstandard::all(),
            'tittle' => 'Surface Water',
            'breadcrumb' => 'Surface Water',
            'Input' => Dataentry::where('user_id', auth()->user()->id)
                ->latest()
                ->get(), //with diguanakan untuk mengatasi N+1 problem
        ]);
    }

    public function dataexport()
    {
        return Excel::download(new DataExport(), 'dataentries.xlsx');
    }
    public function dataimportexcel(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        try {
            Excel::import(new DataImport(), public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/surfacewater/qualityperiode')->with('success', 'New Data Entry has been Imported!');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $e->failures();
            return back()->withFailures($e->failures());
        }
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
            'codesample_id' => 'required',
            'standard_id' => 'required',
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
        if ($request->file('hard_copy')) {
            $validatedData['hard_copy'] = $request->file('hard_copy')->store('data-images');
        }
        $validatedData['date'] = date('Y-m-d', strtotime(request('date')));
        $validatedData['user_id'] = auth()->user()->id;
        Dataentry::create($validatedData);
        return redirect('/surfacewater/qualityperiode')->with('success', 'New Data Entry has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dataentry  $qualityperiode
     * @return \Illuminate\Http\Response
     */
    public function show(Dataentry $qualityperiode)
    {
        return view('dashboard.Index.Entrydata.show', [
            'tittle' => 'Surface Water',
            'breadcrumb' => 'Surface Water',
            'Input' => $qualityperiode,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dataentry  $qualityperiode
     * @return \Illuminate\Http\Response
     */
    public function edit(Dataentry $qualityperiode)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        return view('dashboard.SurfaceWater.Master.edit', [
            'code_units' => Codesample::all(),
            'QualityStandard' => Wastewaterstandard::all(),
            'tittle' => 'Surface Water',
            'breadcrumb' => 'Surface Water',
            'Input' => $qualityperiode,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dataentry  $qualityperiode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dataentry $qualityperiode)
    {
        $rules = [
            'codesample_id' => 'required',
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
        if ($request->file('hard_copy')) {
            if ($request->oldHard_copy) {
                Storage::delete($request->oldHard_copy);
            }
            $validatedData['hard_copy'] = $request->file('hard_copy')->store('data-images');
        }
        $validatedData['date'] = date('Y-m-d', strtotime(request('date')));
        $validatedData['user_id'] = auth()->user()->id;
        Dataentry::where('id', $qualityperiode->id)->update($validatedData);
        return redirect('/surfacewater/qualityperiode')->with('success', ' Data Entry has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dataentry  $qualityperiode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dataentry $qualityperiode)
    {

        Dataentry::destroy($qualityperiode->id);
        return redirect('/surfacewater/qualityperiode')->with('success', ' Data Entry has been deleted!');
    }
}
