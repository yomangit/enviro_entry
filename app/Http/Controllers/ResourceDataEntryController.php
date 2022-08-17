<?php

namespace App\Http\Controllers;

use App\Models\Dataentry;
use App\Models\Codesample;
use Illuminate\Http\Request;
use App\Imports\DataImport;
use App\Exports\DataExport;
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
        $grafiks = Dataentry::with('user')
            ->filter(request(['fromDate', 'search']))->get();
        $tanggal = [];
        $suhu = [];
        $conductivity = [];
        $tds = [];
        $nama = [];
        $lokasi = [];
        $tss = [];
        $ph = [];
        $suhu1 = [];
        $conductivity1 = [];
        $tds1 = [];
        $tss1 = [];
        $ph1 = [];
        foreach ($grafiks as $grafik) {
            $nama[] = $grafik->CodeSample->nama;
            $lokasi[] = $grafik->CodeSample->lokasi;
            $tanggal[] = date('d-m-Y', strtotime($grafik->date));
            if ($suhu1[] = $grafik->temperatur === '-') {
                //   $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
                $suhu[] = '';
            } elseif ($suhu1[] = $grafik->temperatur != '-') {
                //  $tanggal[] = date('d-m-Y', strtotime($grafik->date));
                $suhu[] = $suhu1[] = doubleval($grafik->temperatur);
            }
            if ($conductivity1[] = $grafik->conductivity === '-') {
                // $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
                $conductivity[] = '';
            } elseif ($conductivity1[] = $grafik->conductivity != '-') {
                // $tanggal[] = date('d-m-Y', strtotime($grafik->date));
                $conductivity[] = $conductivity1[] = doubleval($grafik->conductivity);
            }
            if ($tds1[] = $grafik->tds === '-') {
                $tds[] = '';
                // $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
            } elseif ($tds1[] = $grafik->tds !='-') {
                $tds[] = $tds1[] = doubleval($grafik->tds);
                // $tanggal[] = date('d-m-Y', strtotime($grafik->date));
            }
            if ($tss1[] = $grafik->tss === '-' ) {
                //  $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
                $tss[] = '';
            } elseif ($tss1[] = $grafik->tss !='-') {
                $tss[] = $tss1[] = doubleval($grafik->tss);
                // $tanggal[] = date('d-m-Y', strtotime($grafik->date));
                # code...
            }
            if ($ph1[] = $grafik->ph === '-') {
                // $tanggal[]=date('d-m-Y', strtotime( $grafik->date));
                $ph[] = '';
            } elseif ($ph1[] = $grafik->ph !='-') {
                $ph[] = $ph1[] = doubleval($grafik->ph); # code...
                // $tanggal[] = date('d-m-Y', strtotime($grafik->date));
            }

            // $tanggal[] = date('d-m-Y', strtotime($grafik->date));
        }

        return view('dashboard.SurfaceWater.Master.index', [
            'code_units' => Codesample::all(),
            'tittle' => 'Surface Water',
            'breadcrumb' => 'Surface Water',
            'date' => $tanggal,
            'suhu' => $suhu,
            'conductivity' => $conductivity,
            'tds' => $tds,
            'tss' => $tss,
            'ph' => $ph,
            'Input' => Dataentry::where('user_id',auth()->user()->id)
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
        try{
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
        $validatedData['standard_id'] = '1';
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
        $validatedData['standard_id'] = '1';
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
