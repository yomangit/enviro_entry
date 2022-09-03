<?php

namespace App\Http\Controllers;

use App\Models\Wastewater;
use App\Models\Wastewaterpointid;
use Illuminate\Http\Request;
use App\Models\Wastewaterstandard;

class WastewaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.WasteWater.Master.index', [
            'tittle' => 'Waste Water',
            'breadcrumb' => 'Waste Water',
            'code_units'=>Wastewaterpointid::all(),
            'QualityStd' => Wastewaterstandard::where('user_id', auth()->user()->id)->paginate(10)->withQueryString(),
            'Wastewater' => Wastewater::where('user_id', auth()->user()->id)->filter(request(['fromDate','search']))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.WasteWater.Master.create', [
            'tittle' => 'Waste Water',
            'breadcrumb' => 'Waste Water',
            'code_units'=>Wastewaterpointid::all(),
            'Wastewater' => Wastewater::where('user_id', auth()->user()->id)->filter(request(['fromDate','search']))->paginate(10)->withQueryString()
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
            'point_id' => 'required',
            'date' => 'required',
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
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
        Wastewater::create($validatedData);
        
        return redirect('/wastewater/create')->with('success', 'New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wastewater  $wastewater
     * @return \Illuminate\Http\Response
     */
    public function show(Wastewater $wastewater)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wastewater  $wastewater
     * @return \Illuminate\Http\Response
     */
    public function edit(Wastewater $wastewater)
    {
        return view('dashboard.WasteWater.Master.edit', [
            'tittle' => 'Waste Water',
            'breadcrumb' => 'Waste Water',
            'code_units'=>Wastewaterpointid::all(),
            'Wastewater' => $wastewater
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wastewater  $wastewater
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wastewater $wastewater)
    {
        $rules = [
            'point_id' => 'required',
            'date' => 'required',
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
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
        Wastewater::where('id', $wastewater->id)
            ->update($validatedData);
        return redirect('/wastewater')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wastewater  $wastewater
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wastewater $wastewater)
    {
        //
    }
}
