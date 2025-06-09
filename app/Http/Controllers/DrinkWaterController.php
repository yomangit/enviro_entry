<?php

namespace App\Http\Controllers;

use App\Models\DrinkWater;
use Illuminate\Http\Request;
use App\Exports\ExportDrinkWater;
use App\Imports\ImportDrinkWater;
use App\Models\PointIdDrinkwater;
use App\Models\QualityStdDrinkWater;
use Maatwebsite\Excel\Facades\Excel;

class DrinkWaterController extends Controller
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
        $grafiks = DrinkWater::with('user')->orderBy('date','desc')->filter(request(['fromDate', 'search','search1','search2']))->paginate($table)->withQueryString();
        $tanggal = [];
        $suhu = [];
        $conductivity = [];
        $tds = [];
        $nama = [];
        $lokasi = [];
        $tss = [];
        $do = [];
        $ph = [];
        $turbidity = [];
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
            if (is_numeric($grafik->turbidity)) {
                $turbidity[] =  doubleval($grafik->turbidity); # code...

            } else {
                $turbidity[] = '';
            }
            if (is_numeric($grafik->do)) {
                $do[] =  doubleval($grafik->do); # code...

            } else {
                $do[] = '';
            }




           


           
        }
        

        return view('dashboard.SurfaceWater.DrinkWater.index', [
            'tittle' => 'Drink Water',
            'code_units' => PointIdDrinkwater::all(),
            'date' => $tanggal,
            'suhu' => $suhu,
            'conductivity' => $conductivity,
            'tds' => $tds,
            'tss' => $tss,
            'point' => $nama,
            'ph' => $ph,
            'turbidity' => $turbidity,
            'do' => $do,
            'doStandard' => $doStandard,
            'tssStandard' => $tssStandard,
            'tdsStandard' => $tdsStandard,
            'cdvStd' => $conductivityStandard,
            'phMin' => $phMin,
            'phMax' => $phMax,
            'breadcrumb' => 'Drink Water',
            'DrinkWater' =>  DrinkWater::with('user')->orderBy('date','desc')->filter(request(['fromDate', 'search','search1','search2']))->paginate($table)->withQueryString(),
            'QualityStandard' => QualityStdDrinkWater::all()
        ]);
    }
    public function Exportdrinkwater()
    {

        return Excel::download(new ExportDrinkWater, 'Drink Water.csv');
    }
    public function Importdrinkwater(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportDrinkWater;
        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/surfacewater/drinkwater')->with('success', 'Data has been Imported!');
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
        return view('dashboard.SurfaceWater.DrinkWater.create', [
            'tittle' => 'Drink Water',
            'breadcrumb' => 'Drink Water',
            'code_units' => PointIdDrinkwater::all(),
            'DrinkWater' => DrinkWater::where('user_id', auth()->user()->id)->filter(['fromDate', 'search'])->get()


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
            'conductivity' => 'required',
            'point_id' => 'required',
            'date' => 'required',
            'tds' => 'required',
            'tss' => 'required',
            'turbidity' => 'required',
            'hardness' => 'required',
            'color' => 'required',
            'odor' => 'required',
            'taste' => 'required',
            'ph' => 'required',
            'chloride' => 'required',
            'fluoride' => 'required',
            'residual_chlorine' => 'required',
            'sulphate' => 'required',
            'sulphite' => 'required',
            'free_cyanide' => 'required',
            'total_cyanide' => 'required',
            'wad_cyanide' => 'required',
            'ammonia_nh4' => 'required',
            'ammonia_nnh3' => 'required',
            'nitrate_no3' => 'required',
            'nitrate_no2' => 'required',
            'phosphate_po4' => 'required',
            'aluminium_al' => 'required',
            'arsenic_as' => 'required',
            'barium_ba' => 'required',
            'cadmium_cd' => 'required',
            'chromium_cr' => 'required',
            'chromium_hexavalent' => 'required',
            'cobalt_co' => 'required',
            'copper_cu' => 'required',
            'iron_fe' => 'required',
            'lead_pb' => 'required',
            'manganese_mn' => 'required',
            'mercury_hg' => 'required',
            'nickel_ni' => 'required',
            'selenium_se' => 'required',
            'silver_ag' => 'required',
            'zinc_zn' => 'required',
            'fecal_coliform' => 'required',
            'c_coli' => 'required',
            'total_coliform_bacteria' => 'required'
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['date'] = date('Y-m-d', strtotime(request('date')));
        DrinkWater::create($validatedData);
        return redirect('/surfacewater/drinkwater/create')->with('success', 'New Data  has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DrinkWater  $drinkwater
     * @return \Illuminate\Http\Response
     */
    public function show(DrinkWater $drinkwater)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DrinkWater  $drinkwater
     * @return \Illuminate\Http\Response
     */
    public function edit(DrinkWater $drinkwater)
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }
        return view('dashboard.SurfaceWater.DrinkWater.edit', [
            'tittle' => 'Drink Water',
            'breadcrumb' => 'Drink Water',
            'code_units' => PointIdDrinkwater::all(),
            'DrinkWater' => $drinkwater


        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DrinkWater  $drinkwater
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DrinkWater $drinkwater)
    {
        $rules = [
            'point_id' => 'required',
            'point_id' => 'required',
            'conductivity' => 'required',
            'tds' => 'required',
            'tss' => 'required',
            'turbidity' => 'required',
            'hardness' => 'required',
            'color' => 'required',
            'odor' => 'required',
            'taste' => 'required',
            'ph' => 'required',
            'chloride' => 'required',
            'fluoride' => 'required',
            'residual_chlorine' => 'required',
            'sulphate' => 'required',
            'sulphite' => 'required',
            'free_cyanide' => 'required',
            'total_cyanide' => 'required',
            'wad_cyanide' => 'required',
            'ammonia_nh4' => 'required',
            'ammonia_nnh3' => 'required',
            'nitrate_no3' => 'required',
            'nitrate_no2' => 'required',
            'phosphate_po4' => 'required',
            'aluminium_al' => 'required',
            'arsenic_as' => 'required',
            'barium_ba' => 'required',
            'cadmium_cd' => 'required',
            'chromium_cr' => 'required',
            'chromium_hexavalent' => 'required',
            'cobalt_co' => 'required',
            'copper_cu' => 'required',
            'iron_fe' => 'required',
            'lead_pb' => 'required',
            'manganese_mn' => 'required',
            'mercury_hg' => 'required',
            'nickel_ni' => 'required',
            'selenium_se' => 'required',
            'silver_ag' => 'required',
            'zinc_zn' => 'required',
            'fecal_coliform' => 'required',
            'c_coli' => 'required',
            'total_coliform_bacteria' => 'required'
        ];



        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['date'] = date('Y-m-d', strtotime(request('date')));
        DrinkWater::where('id', $drinkwater->id)
            ->update($validatedData);
        return redirect('/surfacewater/drinkwater')->with('success', ' Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DrinkWater  $drinkwater
     * @return \Illuminate\Http\Response
     */
    public function destroy(DrinkWater $drinkwater)
    {
        DrinkWater::destroy($drinkwater->id);
        return redirect('/surfacewater/drinkwater')->with('success', 'Data has been deleted!');
    }
}
