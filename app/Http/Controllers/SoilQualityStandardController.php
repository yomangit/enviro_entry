<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportSoilStandard;
use App\Imports\ImportSoilStandard;
use App\Models\Soilqualitystandard;
use Maatwebsite\Excel\Facades\Excel;

class SoilQualityStandardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.SoilQuality.QualityStandard.index', [
            'tittle' => 'Quality Standard',
            'breadcrumb' => 'Quality Standard',
            'QualityStandard' => Soilqualitystandard::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString(),
        ]);
    }

    public function ExportSoilStandard()
    {

        return Excel::download(new ExportSoilStandard, 'Soil Quality Standard.csv');
    }
    public function ImportSoilStandard(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportSoilStandard;

        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/soilquality/soilqualitystandard')->with('success', 'Point ID has been Imported!');
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
        return view('dashboard.SoilQuality.QualityStandard.create', [
            'tittle' => 'Quality Standard',
            'breadcrumb' => 'Quality Standard',
            'QualityStandard' => Soilqualitystandard::where('user_id', auth()->user()->id)->get()
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
            "nama" => "required",
            "ph" => "required",
            "ph_h2o" => "required",
            "total_organic_carbon" => "required",
            "total_nitrogen" => "required",
            "cn" => "required",
            "calsium" => "required",
            "magnesium" => "required",
            "pottasium" => "required",
            "sodium" => "required",
            "jumlah" => "required",
            "p2o5_hcl_25" => "required",
            "k2o_hcl_25" => "required",
            "p2o5_olsen" => "required",
            "kapasitas_tukar_kation" => "required",
            "kb_kejenuhan_basa" => "required",
            "al_tukar" => "required",
            "h_tukar" => "required",
            "pasir" => "required",
            "debu" => "required",
            "lempung" => "required",
            "moisture_content" => "required",
            "bulk_density" => "required",
            "ruang_pori_total" => "required",
            "pd" => "required",
            "sangat_cepat" => "required",
            "cepat" => "required",
            "lambat" => "required",
            "air_tersedia" => "required",
            "permeabilitas" => "required",
            "pf_1" => "required",
            "pf_2" => "required",
            "pf_2_54" => "required",
            "pf_4_2" => "required",
            "laboratorium" => "required",
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        Soilqualitystandard::create($validatedData);
        return redirect('/soilquality/soilqualitystandard/create')->with('success', 'New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soilqualitystandard  $soilqualitystandard
     * @return \Illuminate\Http\Response
     */
    public function show(Soilqualitystandard $soilqualitystandard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soilqualitystandard  $soilqualitystandard
     * @return \Illuminate\Http\Response
     */
    public function edit(Soilqualitystandard $soilqualitystandard)
    {
        return view('dashboard.SoilQuality.QualityStandard.edit', [
            'tittle' => 'Quality Standard',
            'breadcrumb' => 'Quality Standard',
            'QualityStandard' =>  $soilqualitystandard
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Soilqualitystandard  $soilqualitystandard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Soilqualitystandard $soilqualitystandard)
    {
        $rules = [
            "nama" => "required",
            "ph" => "required",
            "ph_h2o" => "required",
            "total_organic_carbon" => "required",
            "total_nitrogen" => "required",
            "cn" => "required",
            "calsium" => "required",
            "magnesium" => "required",
            "pottasium" => "required",
            "sodium" => "required",
            "jumlah" => "required",
            "p2o5_hcl_25" => "required",
            "k2o_hcl_25" => "required",
            "p2o5_olsen" => "required",
            "kapasitas_tukar_kation" => "required",
            "kb_kejenuhan_basa" => "required",
            "al_tukar" => "required",
            "h_tukar" => "required",
            "pasir" => "required",
            "debu" => "required",
            "lempung" => "required",
            "moisture_content" => "required",
            "bulk_density" => "required",
            "ruang_pori_total" => "required",
            "pd" => "required",
            "sangat_cepat" => "required",
            "cepat" => "required",
            "lambat" => "required",
            "air_tersedia" => "required",
            "permeabilitas" => "required",
            "pf_1" => "required",
            "pf_2" => "required",
            "pf_2_54" => "required",
            "pf_4_2" => "required",
            "laboratorium" => "required",
        ];
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        Soilqualitystandard::where('id', $soilqualitystandard->id)
            ->update($validatedData);
        return redirect('/soilquality/soilqualitystandard')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soilqualitystandard  $soilqualitystandard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soilqualitystandard $soilqualitystandard)
    {
        Soilqualitystandard::destroy($soilqualitystandard->id);
        return redirect('/soilquality/soilqualitystandard')->with('success', 'Data has been deleted!');
    }
}
