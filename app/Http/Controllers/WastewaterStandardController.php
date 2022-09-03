<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wastewaterstandard;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportWasteWaterStandard;
use App\Imports\ImportWasteWaterStandard;

class WastewaterStandardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.WasteWater.QualityStandard.index', [
            'tittle' => 'Quality Standard',
            'breadcrumb' => 'Quality Standard',
            'QualityStd' => Wastewaterstandard::where('user_id', auth()->user()->id)->filter(request(['fromDate','search']))->paginate(10)->withQueryString()
        ]);
    }
    public function ExportWasteWaterStandard()
    {
        return Excel::download(new ExportWasteWaterStandard(), 'Quality Standard Waste Water.csv');
    }
    public function ImportWasteWaterStandard(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        try{
            Excel::import(new ImportWasteWaterStandard(), public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/wastewater/wastewaterstandard')->with('success', 'New Data has been Imported!');
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
        return view('dashboard.WasteWater.QualityStandard.create', [
            'tittle' => 'Quality Standard',
            'breadcrumb' => 'Quality Standard',
            'QualityStd' => Wastewaterstandard::where('user_id', auth()->user()->id)->filter(request(['fromDate','search']))->paginate(10)->withQueryString()
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
            'nama' => 'required',
            'conductivity' => 'required',
            'tds' => 'required',
            'tss' => 'required',
            'turbidity' => 'required',
            'hardness' => 'required',
            'alkalinity_as_caco3' => 'required',
            'alkalinity_carbonate' => 'required',
            'alkalinity_bicarbonate' => 'required',
            'temperature' => 'required',
            'salinity' => 'required',
            'do' => 'required',
            'ph' => 'required',
            'alkalinity_total' => 'required',
            'cl' => 'required',
            'fluoride' => 'required',
            'sulphate' => 'required',
            'sulphite' => 'required',
            'free_chlorine' => 'required',
            'fcn' => 'required',
            'total_cyanide' => 'required',
            'wad_cyanide' => 'required',
            'ammonia' => 'required',
            'nitrate' => 'required',
            'nitrite' => 'required',
            'phosphate' => 'required',
            'total_phosphate' => 'required',
            'aluminium' => 'required',
            'antimony' => 'required',
            'arsenic' => 'required',
            'barium' => 'required',
            'cadmium' => 'required',
            'calcium' => 'required',
            'chromium' => 'required',
            'chromium_hexavalent' => 'required',
            'cobalt' => 'required',
            'copper' => 'required',
            'iron' => 'required',
            'lead' => 'required',
            'magnesium' => 'required',
            'manganese' => 'required',
            'mercury' => 'required',
            'nickel' => 'required',
            'selenium' => 'required',
            'silver' => 'required',
            'sodium' => 'required',
            'tin' => 'required',
            'zinc' => 'required',
            'aluminium_t_ai' => 'required',
            'arsenic_t_as' => 'required',
            'cadmium_t_cd' => 'required',
            'chromium_t' => 'required',
            'chromium_hexavalent_t' => 'required',
            'cobalt_t' => 'required',
            'cooper' => 'required',
            'lead_t' => 'required',
            'selenium_t' => 'required',
            'mercury_t' => 'required',
            'nickel_t' => 'required',
            'zinc_t' => 'required',
            'bod' => 'required',
            'cod' => 'required',
            'oil_and_grease' => 'required',
            'phenols' => 'required',
            'surfactant' => 'required',
            'total_pcb' => 'required',
            'a_o_x' => 'required',
            'pcdfs' => 'required',
            'pcdds' => 'required',
            'fecal_coliform' => 'required',
            'e_coli' => 'required',
            'total_coliform_bacteria' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        Wastewaterstandard::create($validatedData);
        
        return redirect('/wastewater/wastewaterstandard/create')->with('success', 'New Point ID has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wastewaterstandard  $wastewaterstandard
     * @return \Illuminate\Http\Response
     */
    public function show(Wastewaterstandard $wastewaterstandard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wastewaterstandard  $wastewaterstandard
     * @return \Illuminate\Http\Response
     */
    public function edit(Wastewaterstandard $wastewaterstandard)
    {
        return view('dashboard.WasteWater.QualityStandard.edit', [
            'tittle' => 'Quality Standard',
            'breadcrumb' => 'Quality Standard',
            'QualityStd' => $wastewaterstandard
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wastewaterstandard  $wastewaterstandard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wastewaterstandard $wastewaterstandard)
    {
        $rules = [
            'nama' => 'required',
            'conductivity' => 'required',
            'tds' => 'required',
            'tss' => 'required',
            'turbidity' => 'required',
            'hardness' => 'required',
            'alkalinity_as_caco3' => 'required',
            'alkalinity_carbonate' => 'required',
            'alkalinity_bicarbonate' => 'required',
            'temperature' => 'required',
            'salinity' => 'required',
            'do' => 'required',
            'ph' => 'required',
            'alkalinity_total' => 'required',
            'cl' => 'required',
            'fluoride' => 'required',
            'sulphate' => 'required',
            'sulphite' => 'required',
            'free_chlorine' => 'required',
            'fcn' => 'required',
            'total_cyanide' => 'required',
            'wad_cyanide' => 'required',
            'ammonia' => 'required',
            'nitrate' => 'required',
            'nitrite' => 'required',
            'phosphate' => 'required',
            'total_phosphate' => 'required',
            'aluminium' => 'required',
            'antimony' => 'required',
            'arsenic' => 'required',
            'barium' => 'required',
            'cadmium' => 'required',
            'calcium' => 'required',
            'chromium' => 'required',
            'chromium_hexavalent' => 'required',
            'cobalt' => 'required',
            'copper' => 'required',
            'iron' => 'required',
            'lead' => 'required',
            'magnesium' => 'required',
            'manganese' => 'required',
            'mercury' => 'required',
            'nickel' => 'required',
            'selenium' => 'required',
            'silver' => 'required',
            'sodium' => 'required',
            'tin' => 'required',
            'zinc' => 'required',
            'aluminium_t_ai' => 'required',
            'arsenic_t_as' => 'required',
            'cadmium_t_cd' => 'required',
            'chromium_t' => 'required',
            'chromium_hexavalent_t' => 'required',
            'cobalt_t' => 'required',
            'cooper' => 'required',
            'lead_t' => 'required',
            'selenium_t' => 'required',
            'mercury_t' => 'required',
            'nickel_t' => 'required',
            'zinc_t' => 'required',
            'bod' => 'required',
            'cod' => 'required',
            'oil_and_grease' => 'required',
            'phenols' => 'required',
            'surfactant' => 'required',
            'total_pcb' => 'required',
            'a_o_x' => 'required',
            'pcdfs' => 'required',
            'pcdds' => 'required',
            'fecal_coliform' => 'required',
            'e_coli' => 'required',
            'total_coliform_bacteria' => 'required',
        ];
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        Wastewaterstandard::where('id', $wastewaterstandard->id)
            ->update($validatedData);
        return redirect('/wastewater/wastewaterstandard')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wastewaterstandard  $wastewaterstandard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wastewaterstandard $wastewaterstandard)
    {
        Wastewaterstandard::destroy($wastewaterstandard->id);
        return redirect('/wastewater/wastewaterstandard')->with('success', 'Data  has been deleted!');
    }
}
