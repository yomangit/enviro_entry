<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Rainfall;
use Illuminate\Http\Request;
use App\Exports\ExportRainfall;
use App\Imports\ImportRainfall;
use App\Models\Rainfallpointid;
use Maatwebsite\Excel\Facades\Excel;

use function PHPUnit\Framework\isEmpty;

class RainfallController extends Controller
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

        $avg_rainfall = Rainfall::with('user')->latest()->filter(request(['fromDate', 'search']))->paginate(31)->withQueryString()->sum('rainfall');
        $avg_year = Rainfall::with('user')->latest()->filter(request(['fromDate', 'search']))->get()->sum('rainfall');
        $max_rainfall = Rainfall::with('user')->latest()->filter(request(['fromDate', 'search']))->paginate(31)->withQueryString()->max('rainfall');
        $rainday = Rainfall::where('rainfall', '>', 0)->filter(request(['fromDate', 'search']))->get();
        $count = $rainday->count();
        $wetday = Rainfall::where('rainfall', '>', 5)->filter(request(['fromDate', 'search']))->get();
        $count2 = $wetday->count();
        $grafiks = Rainfall::with('user')->filter(request(['fromDate', 'search']))->paginate($table)->withQueryString();
        $tanggal = [];
        $lokasi = [];
        $rainfall = [];
        foreach ($grafiks as $grafik) {
            $tanggal[] = date('d-M-Y', strtotime($grafik->date));
            $lokasi[] = $grafik->PointId->nama;
            if ($grafik->rainfall === '-') {
                $rainfall[] = '';
            } elseif ($grafik->rainfall != '-') {
                $rainfall[] = doubleval($grafik->rainfall);
            }
        }
       
        return view('dashboard.Weather.Rainfall.index', [
            'tittle' => 'Rainfall',
            'avg_rainfall' => $avg_rainfall,
            'avg_year' => $avg_year,
            'max_rainfall' => $max_rainfall,
            'rainday' => $count,
            'wetday' => $count2,
            'tgl' => $tanggal,
            'lokasi' => $lokasi,
            'milimeter' => $rainfall,
            'code_units' => Rainfallpointid::all(),
            'breadcrumb' => 'Rainfall',
            'Rainfall' => Rainfall::with('user')->orderBy('date','desc')->filter(request(['fromDate', 'search', 'toDate']))->paginate(30)->withQueryString()
        ]);
    }
    public function ExportRainfall()
    {
        $Rainfall = Rainfall::where('user_id', auth()->user()->id)->filter(request(['fromDate', 'search', 'toDate']))->get();
        return Excel::download(new ExportRainfall($Rainfall), 'Rainfall.csv');
    }
    public function ImportRainfall(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportRainfall;
        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/weather/rainfall')->with('success', 'Data has been Imported!');
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
        return view('dashboard.Weather.Rainfall.create', [
            'tittle' => 'Rainfall',
            'code_units' => Rainfallpointid::all(),
            'breadcrumb' => 'Rainfall',
            'Rainfall' => Rainfall::where('user_id', auth()->user()->id)->get()
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
            'date' => 'required',
            'point_id' => 'required',
            'rainfall' => 'required',


        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['date'] = date('Y-m-d', strtotime(request('date')));
        Rainfall::create($validatedData);
        return redirect('/weather/rainfall/create')->with('success', 'New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rainfall  $rainfall
     * @return \Illuminate\Http\Response
     */
    public function show(Rainfall $rainfall)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rainfall  $rainfall
     * @return \Illuminate\Http\Response
     */
    public function edit(Rainfall $rainfall)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        return view('dashboard.Weather.Rainfall.edit', [
            'tittle' => 'Rainfall',
            'code_units' => Rainfallpointid::all(),
            'breadcrumb' => 'Rainfall',
            'Rainfall' => $rainfall
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rainfall  $rainfall
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rainfall $rainfall)
    {
        $rules = [
            'date' => 'required',
            'point_id' => 'required',
            'rainfall' => 'required',
        ];
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['date'] = date('Y-m-d', strtotime(request('date')));
        Rainfall::where('id', $rainfall->id)
            ->update($validatedData);
        return redirect('/weather/rainfall')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rainfall  $rainfall
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rainfall $rainfall)
    {
        Rainfall::destroy($rainfall->id);
        return redirect('/weather/rainfall')->with('success', 'Point ID has been deleted!');
    }
}
