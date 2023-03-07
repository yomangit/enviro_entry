<?php

namespace App\Http\Controllers;

use App\Models\Mestom;
use Illuminate\Http\Request;
use App\Models\TailingCodeId;

class MestomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        return view('dashboard.Tailing.mestom.create', [
            'tittle' => ' MES & TOM',
            'breadcrumb' => ' MES & TOM',
            'code_units' => TailingCodeId::all(),
            // 'QualityStd' => TailingQualityStandard::where('user_id', auth()->user()->id)->filter(request(['fromDate','search']))->paginate(10)->withQueryString(),
            // 'Tailing'=>Tailing::where('user_id',auth()->user()->id)->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString()
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
            'Antimony_Sb' => 'required',
            'Arsenic_As' => 'required',
            'Barium_Ba' => 'required',
            'Beryllium_Be' => 'required',
            'Boron_B' => 'required',
            'Cadmium_Cd' => 'required',
            'Chromium_Hexavalent_CrVI' => 'required',
            'Copper_Cu' => 'required',
            'Lead_Pb' => 'required',
            'Mercury_Hg' => 'required',
            'Molybdenum_Mo' => 'required',
            'Nickel_Ni' => 'required',
            'Selenium_Se' => 'required',
            'Silver_Ag' => 'required',
            'Tributyltin_oxide' => 'required',
            'Zinc_Zn' => 'required',
            'Chloride' => 'required',
            'Cyanide_Total' => 'required',
            'Fluoride' => 'required',
            'Iodium' => 'required',
            'Nitrate_NNO3' => 'required',
            'Nitrite_NNO2' => 'required',
            'Benzene' => 'required',
            'Benzoapyrene' => 'required',
            'C6_C9_Petroleum_Hydrocarbon' => 'required',
            'C10_C36_Petroleum_Hydrocarbon' => 'required',
            'Carbontetrachloride' => 'required',
            'Chlorobenzene' => 'required',
            'Chloroform' => 'required',
            '2_Cholorophenol' => 'required',
            'Total_Cresol' => 'required',
            'Di2_etilhelsil_ftalat' => 'required',
            '1_2_Dichlorobenzene' => 'required',
            '1_4_Dichlorobenzene' => 'required',
            '1_2_Dichloroethane' => 'required',
            '1_1_Dichloroethene' => 'required',
            '1_2_Dichloroethene' => 'required',
            'Dichloro_Methane_Methylen_Chloride' => 'required',
            '2_4_Dichlorophenol' => 'required',
            '2_4_Dinitrotoulene' => 'required',
            'Ethylbenzene' => 'required',
            'Ethylenediaminetetraacetic_EDTA' => 'required',
            'Formaldehyde' => 'required',
            'Hexachlorobutadiene' => 'required',
            'Methyl_Ethyl_Ketone' => 'required',
            'Nitrobenzene' => 'required',
            'Poly_Aromatic_Hydrocarbons_PAHs' => 'required',
            'Phenol_Total,_non_halogenated' => 'required',
            'Polychlorinated_Biphenyls_PCBs' => 'required',
            'Styrene' => 'required',
            '1_1_1_2_Tetrachloroethane' => 'required',
            '1_1_2_2_Tetrachloroethane' => 'required',
            'Tetrachloroethene' => 'required',
            'Toluene' => 'required',
            'Trichloroenzene' => 'required',
            '1_1_1_Trichloroethane' => 'required',
            '1_1_2_Trichloroethane' => 'required',
            'Trichloroethene' => 'required',
            '2_4_5_Trichlorophenol' => 'required',
            '2_4_6_Trichlorophenol' => 'required',
            'Vinyl_Chloride' => 'required',
            'Xylene_Total' => 'required',
            'Aldrin_Dieldrin' => 'required',
            'DDT_DDD_DDE' => 'required',
            '2_4_D_2_4_dichlorophenoxyacetic_acid' => 'required',
            'Chlordane' => 'required',
            'Heptachlor' => 'required',
            'Lindane' => 'required',
            'Methoxychlor' => 'required',
            'Pentachlorophenol' => 'required',
        ]);
        $validatedData['date'] = date('Y-m-d', strtotime(request('date')));

        Mestom::create($validatedData);
        return redirect('/airquality/noisemeter/noise/create')->with('success', 'New data Noise has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mestom  $mestom
     * @return \Illuminate\Http\Response
     */
    public function show(Mestom $mestom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mestom  $mestom
     * @return \Illuminate\Http\Response
     */
    public function edit(Mestom $mestom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mestom  $mestom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mestom $mestom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mestom  $mestom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mestom $mestom)
    {
        //
    }
}
