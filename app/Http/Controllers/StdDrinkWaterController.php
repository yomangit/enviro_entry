<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QualityStdDrinkWater;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportQualityStdDrinkWater;
use App\Imports\ImportQualityStdDrinkWater;

class StdDrinkWaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.SurfaceWater.DrinkWater.QualityStandard.index',[
            'tittle'=>'Quality Standard',
            'breadcrumb'=>'Quality Standard',
            'QualityStd'=>QualityStdDrinkWater::with('user')->filter(['fromDate','search'])->paginate(10)->withQueryString()
        ]);
    }

    public function ExportdrinkwaterStd()
    {

        return Excel::download(new ExportQualityStdDrinkWater, 'Drink Water.csv');
    }
    public function ImportdrinkwaterStd(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportQualityStdDrinkWater;
        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/surfacewater/drinkwater/quantity')->with('success', 'Data has been Imported!');
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
        return view('dashboard.SurfaceWater.DrinkWater.QualityStandard.create',[
            'tittle'=>'Quality Standard',
            'breadcrumb'=>'Quality Standard',
            'QualityStd'=>QualityStdDrinkWater::where('user_id',auth()->user()->id)->filter(request(['fromDate', 'search']))->get()
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
            'nama'=>'required',
            'conductivity'=>'required',
            'tds'=>'required',
            'tss'=>'required',
            'turbidity'=>'required',
            'hardness'=>'required',
            'color'=>'required',
            'odor'=>'required',
            'taste'=>'required',
            'ph'=>'required',
            'chloride'=>'required',
            'fluoride'=>'required',
            'residual_chlorine'=>'required',
            'sulphate'=>'required',
            'sulphite'=>'required',
            'free_cyanide'=>'required',
            'total_cyanide'=>'required',
            'wad_cyanide'=>'required',
            'ammonia_nh4'=>'required',
            'ammonia_nnh3'=>'required',
            'nitrate_no3'=>'required',
            'nitrate_no2'=>'required',
            'phosphate_po4'=>'required',
            'aluminium_al'=>'required',
            'arsenic_as'=>'required',
            'barium_ba'=>'required',
            'cadmium_cd'=>'required',
            'chromium_cr'=>'required',
            'chromium_hexavalent'=>'required',
            'cobalt_co'=>'required',
            'copper_cu'=>'required',
            'iron_fe'=>'required',
            'lead_pb'=>'required',
            'manganese_mn'=>'required',
            'mercury_hg'=>'required',
            'nickel_ni'=>'required',
            'selenium_se'=>'required',
            'silver_ag'=>'required',
            'zinc_zn'=>'required',
            'fecal_coliform'=>'required',
            'c_coli'=>'required',
            'total_coliform_bacteria'=>'required',
			'permanganate_number_as_kmno4'=>'required',
			'surfactant'=>'required',
			'benzene'=>'required',
			'total_pesticides_as_organo_chlorine_pesticides'=>'required'
        ]);
        $validatedData['user_id']=auth()->user()->id;
        QualityStdDrinkWater::create($validatedData);
        return redirect('/surfacewater/drinkwater/quantity/create')->with('success','New Data  has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QualityStdDrinkWater  $quantity
     * @return \Illuminate\Http\Response
     */
    public function show(QualityStdDrinkWater $quantity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QualityStdDrinkWater  $quantity
     * @return \Illuminate\Http\Response
     */
    public function edit(QualityStdDrinkWater $quantity)
    {
        return view('dashboard.SurfaceWater.DrinkWater.QualityStandard.edit',[
            'tittle'=>'Quality Standard',
            'breadcrumb'=>'Quality Standard',
            'QualityStd'=>$quantity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QualityStdDrinkWater  $quantity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QualityStdDrinkWater $quantity)
    {
        $validatedData = $request->validate([
            'conductivity'=>'required',
            'nama'=>'required',
            'tds'=>'required',
            'tss'=>'required',
            'turbidity'=>'required',
            'hardness'=>'required',
            'color'=>'required',
            'odor'=>'required',
            'taste'=>'required',
            'ph'=>'required',
            'chloride'=>'required',
            'fluoride'=>'required',
            'residual_chlorine'=>'required',
            'sulphate'=>'required',
            'sulphite'=>'required',
            'free_cyanide'=>'required',
            'total_cyanide'=>'required',
            'wad_cyanide'=>'required',
            'ammonia_nh4'=>'required',
            'ammonia_nnh3'=>'required',
            'nitrate_no3'=>'required',
            'nitrate_no2'=>'required',
            'phosphate_po4'=>'required',
            'aluminium_al'=>'required',
            'arsenic_as'=>'required',
            'barium_ba'=>'required',
            'cadmium_cd'=>'required',
            'chromium_cr'=>'required',
            'chromium_hexavalent'=>'required',
            'cobalt_co'=>'required',
            'copper_cu'=>'required',
            'iron_fe'=>'required',
            'lead_pb'=>'required',
            'manganese_mn'=>'required',
            'mercury_hg'=>'required',
            'nickel_ni'=>'required',
            'selenium_se'=>'required',
            'silver_ag'=>'required',
            'zinc_zn'=>'required',
            'fecal_coliform'=>'required',
            'c_coli'=>'required',
            'total_coliform_bacteria'=>'required',
			'permanganate_number_as_kmno4'=>'required',
			'surfactant'=>'required',
			'benzene'=>'required',
			'total_pesticides_as_organo_chlorine_pesticides'=>'required',
        ]);
        $validatedData['user_id']=auth()->user()->id;
        QualityStdDrinkWater::where('id', $quantity->id)
            ->update($validatedData);
        return redirect('/surfacewater/drinkwater/quantity')->with('success','Data  has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QualityStdDrinkWater  $quantity
     * @return \Illuminate\Http\Response
     */
    public function destroy(QualityStdDrinkWater $quantity)
    {
        QualityStdDrinkWater::destroy($quantity->id);
        return redirect('/surfacewater/drinkwater/quantity')->with('success','Data has been deleted!');
    }
}
