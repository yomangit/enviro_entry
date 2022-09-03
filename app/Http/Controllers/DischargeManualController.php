<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DischargeManual;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportDischargeManual;
use App\Imports\ImportDischargeManual;
use App\Models\DischargeManualPointid;
use App\Models\DischargeManualQualitystandard;

class DischargeManualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grafiks = DischargeManual::where('user_id',auth()->user()->id)->filter(request(['fromDate', 'search']))->get();
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
            $nama[] = $grafik->PointId->nama;
            $lokasi[] = $grafik->PointId->lokasi;
            // $doStandard[]=$grafik->standard->do;
            $tanggal[] = date('d-M-Y', strtotime($grafik->date));
            if (is_numeric($grafik->standard->ph_max)) {
                $phMax[] = doubleval($grafik->standard->ph_max);
            } else {
                $phMax[] = '';
            }
            if (is_numeric($grafik->standard->ph_min)) {
                $phMin[] = doubleval($grafik->standard->ph_min);
            } else {
                $phMin[] = '';
            }
            if (is_numeric($grafik->standard->conductivity)) {
                $conductivityStandard[] = doubleval($grafik->standard->conductivity);
            } else {
                $conductivityStandard[] = '';
            }
            if ($grafik->standard->tss) {
                $tssStandard[] = doubleval($grafik->standard->tss);
            } else {
                $tssStandard[] = '';
            }
            if (is_numeric($grafik->standard->do)) {
                $doStandard[] = doubleval($grafik->standard->do);
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

        return view('dashboard.Hydrometric.DischargeManual.index',[
            'code_units' => DischargeManualPointid::all(),
            'standard' => DischargeManualQualitystandard::all(),
            'tittle'=>'Discharge Manual',
            'breadcrumb' => 'Discharge Manual',
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
            'Hydrometric' => DischargeManual::where('user_id',auth()->user()->id)->filter(request(['fromDate', 'search']))->paginate(30)->withQueryString()
        ]);
    }
    public function ExportDischargeManual()
    {
        return Excel::download(new ExportDischargeManual(), 'Discharge Manual.csv');
    }
    public function ImportDischargeManual(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        try{
            Excel::import(new ImportDischargeManual(), public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/hydrometric/dischargemanual')->with('success', 'New Data has been Imported!');
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
        return view('dashboard.Hydrometric.DischargeManual.create',[
            'code_units' => DischargeManualPointid::all(),
            'tittle'=>'Discharge Manual',
            'breadcrumb' => 'Discharge Manual',
            'Hydrometric' => DischargeManual::where('user_id', auth()->user()->id)
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
        $validatedData['standard_id'] = '1';
        DischargeManual::create($validatedData);
        return redirect('/hydrometric/dischargemanual/create')->with('success', 'New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DischargeManual  $dischargemanual
     * @return \Illuminate\Http\Response
     */
    public function show(DischargeManual $dischargemanual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DischargeManual  $dischargemanual
     * @return \Illuminate\Http\Response
     */
    public function edit(DischargeManual $dischargemanual)
    {
        return view('dashboard.Hydrometric.DischargeManual.edit',[
            'tittle'=>'Discharge Manual',
            'breadcrumb' => 'Discharge Manual',
            'code_units' => DischargeManualPointid::all(),
            'Hydrometric' => $dischargemanual
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DischargeManual  $dischargemanual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DischargeManual $dischargemanual)
    {
        $rules = [
            'start_time' => 'required|max:255',
            'stop_time' => 'required|max:255',
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
        ];
        $validatedData = $request->validate($rules);
        $validatedData['date'] = date('Y-m-d', strtotime(request('date')));
        $validatedData['user_id'] = auth()->user()->id;
        DischargeManual::where('id', $dischargemanual->id)
            ->update($validatedData);
        return redirect('/hydrometric/dischargemanual')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DischargeManual  $dischargemanual
     * @return \Illuminate\Http\Response
     */
    public function destroy(DischargeManual $dischargemanual)
    {
        DischargeManual::destroy($dischargemanual->id);
        return redirect('/hydrometric/dischargemanual')->with('success', 'Data has been deleted!');
    }
}
