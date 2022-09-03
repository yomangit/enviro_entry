<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\TailingQualityStandard;
use App\Exports\ExportQualityStandardTailing;
use App\Imports\ImportQualityStandardTailing;

class TailingStandardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.Tailing.QualityStandard.index', [
            'tittle' => 'Quality Standard',
            'breadcrumb' => 'Quality Standard',
            'QualityStd' => TailingQualityStandard::where('user_id', auth()->user()->id)->filter(request(['fromDate','search']))->paginate(10)->withQueryString()
        ]);
    }
    public function ExportQualityStandardTailing()
    {

        return Excel::download(new ExportQualityStandardTailing, 'Quality Standard Tailing.csv');
    }
    public function ImportQualityStandardTailing(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportQualityStandardTailing;
        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/tailing/qualitystandard')->with('success', 'Data has been Imported!');
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
        return view('dashboard.Tailing.QualityStandard.create', [
            'tittle' => 'Quality Standard',
            'breadcrumb' => 'Quality Standard',
            'QualityStd' => TailingQualityStandard::where('user_id', auth()->user()->id)->filter(request(['fromDate','search']))->paginate(10)->withQueryString()
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
            'user_id' => 'required',
            'nama' => 'required',
            'antimony' => 'required',
            'arsenic' => 'required',
            'barium' => 'required',
            'beryllium' => 'required',
            'boron' => 'required',
            'cadmium' => 'required',
            'hexavalent' => 'required',
            'chromium_cr' => 'required',
            'copper' => 'required',
            'iodide' => 'required',
            'lead' => 'required',
            'mercury' => 'required',
            'molybdenum' => 'required',
            'nickel' => 'required',
            'selenium' => 'required',
            'silver' => 'required',
            'tributyl' => 'required',
            'zinc_zn' => 'required',
            'chloride_cl' => 'required',
            'free_cyanide' => 'required',
            'total_cyanide' => 'required',
            'fluoride' => 'required',
            'nitrite_no2' => 'required',
            'nitrate' => 'required',
            'aldrin' => 'required',
            'dieldrin' => 'required',
            'benzene' => 'required',
            'benzo_a_pyrene' => 'required',
            'tetrachloride' => 'required',
            'chlordane' => 'required',
            'chlorobenzene' => 'required',
            'chlorophenol2' => 'required',
            'chloroform' => 'required',
            'o_cresol' => 'required',
            'm_cresol' => 'required',
            'p_cresol' => 'required',
            'total_cresol' => 'required',
            'ethylhexylphthalate' => 'required',
            'd' => 'required',
            'dichlorobenzene2' => 'required',
            'dichlorobenzene4' => 'required',
            'dichloroethane1' => 'required',
            'dichloroethylene' => 'required',
            'dichloroethene2' => 'required',
            'dichloroethene3' => 'required',
            'dichloromethane' => 'required',
            'dichlorophenol' => 'required',
            'dinitrotoluene' => 'required',
            'ethyl_benzene' => 'required',
            'thylenediaminetetraacetic' => 'required',
            'formaldehyde' => 'required',
            'hexachloro' => 'required',
            'endrin' => 'required',
            'heptachlor' => 'required',
            'hexachlorobenzene' => 'required',
            'hexachlorobutadiene' => 'required',
            'hexachloroethane' => 'required',
            'total_phenols' => 'required',
            'lindane' => 'required',
            'methoxychlor1' => 'required',
            'ketone' => 'required',
            'parathion1' => 'required',
            'nitrobenzene' => 'required',
            'styrene' => 'required',
            'tetrachloroethane1' => 'required',
            'tetrachloroethane2' => 'required',
            'nitriloacetic' => 'required',
            'pentachlorophenol' => 'required',
            'pyridine' => 'required',
            'toxaphene1' => 'required',
            'parathion' => 'required',
            'total_chlor' => 'required',
            'tetrachloroethene' => 'required',
            'toluene' => 'required',
            'trichlorobenzene' => 'required',
            'methoxychlor2' => 'required',
            'trichloroethane1' => 'required',
            'trichloroethene2' => 'required',
            'toxaphene2' => 'required',
            'trichloroethylene' => 'required',
            'trihalomethanes' => 'required',
            'trichlorophenol5' => 'required',
            'trichlorophenol6' => 'required',
            'tp_silvex' => 'required',
            'vinyl_chloride' => 'required',
            'xylenes_total' => 'required',
            'ddt_ddd_dde' => 'required',
            'dichlorophenoxyacetic' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        TailingQualityStandard::create($validatedData);
        return redirect('/tailing/qualitystandard/create')->with('success', 'New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TailingQualityStandard  $qualitystandard
     * @return \Illuminate\Http\Response
     */
    public function show(TailingQualityStandard $qualitystandard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TailingQualityStandard  $qualitystandard
     * @return \Illuminate\Http\Response
     */
    public function edit(TailingQualityStandard $qualitystandard)
    {
        return view('dashboard.Tailing.QualityStandard.edit', [
            "tittle" => " Table Blasting",
            'breadcrumb' => 'Table Blasting',
            'QualityStd' => $qualitystandard

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TailingQualityStandard  $qualitystandard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TailingQualityStandard $qualitystandard)
    {
        $rules = [
            'user_id' => 'required',
            'nama' => 'required',
            'antimony' => 'required',
            'arsenic' => 'required',
            'barium' => 'required',
            'beryllium' => 'required',
            'boron' => 'required',
            'cadmium' => 'required',
            'hexavalent' => 'required',
            'chromium_cr' => 'required',
            'copper' => 'required',
            'iodide' => 'required',
            'lead' => 'required',
            'mercury' => 'required',
            'molybdenum' => 'required',
            'nickel' => 'required',
            'selenium' => 'required',
            'silver' => 'required',
            'tributyl' => 'required',
            'zinc_zn' => 'required',
            'chloride_cl' => 'required',
            'free_cyanide' => 'required',
            'total_cyanide' => 'required',
            'fluoride' => 'required',
            'nitrite_no2' => 'required',
            'nitrate' => 'required',
            'aldrin' => 'required',
            'dieldrin' => 'required',
            'benzene' => 'required',
            'benzo_a_pyrene' => 'required',
            'tetrachloride' => 'required',
            'chlordane' => 'required',
            'chlorobenzene' => 'required',
            'chlorophenol2' => 'required',
            'chloroform' => 'required',
            'o_cresol' => 'required',
            'm_cresol' => 'required',
            'p_cresol' => 'required',
            'total_cresol' => 'required',
            'ethylhexylphthalate' => 'required',
            'd' => 'required',
            'dichlorobenzene2' => 'required',
            'dichlorobenzene4' => 'required',
            'dichloroethane1' => 'required',
            'dichloroethylene' => 'required',
            'dichloroethene2' => 'required',
            'dichloroethene3' => 'required',
            'dichloromethane' => 'required',
            'dichlorophenol' => 'required',
            'dinitrotoluene' => 'required',
            'ethyl_benzene' => 'required',
            'thylenediaminetetraacetic' => 'required',
            'formaldehyde' => 'required',
            'hexachloro' => 'required',
            'endrin' => 'required',
            'heptachlor' => 'required',
            'hexachlorobenzene' => 'required',
            'hexachlorobutadiene' => 'required',
            'hexachloroethane' => 'required',
            'total_phenols' => 'required',
            'lindane' => 'required',
            'methoxychlor1' => 'required',
            'ketone' => 'required',
            'parathion1' => 'required',
            'nitrobenzene' => 'required',
            'styrene' => 'required',
            'tetrachloroethane1' => 'required',
            'tetrachloroethane2' => 'required',
            'nitriloacetic' => 'required',
            'pentachlorophenol' => 'required',
            'pyridine' => 'required',
            'toxaphene1' => 'required',
            'parathion' => 'required',
            'total_chlor' => 'required',
            'tetrachloroethene' => 'required',
            'toluene' => 'required',
            'trichlorobenzene' => 'required',
            'methoxychlor2' => 'required',
            'trichloroethane1' => 'required',
            'trichloroethene2' => 'required',
            'toxaphene2' => 'required',
            'trichloroethylene' => 'required',
            'trihalomethanes' => 'required',
            'trichlorophenol5' => 'required',
            'trichlorophenol6' => 'required',
            'tp_silvex' => 'required',
            'vinyl_chloride' => 'required',
            'xylenes_total' => 'required',
            'ddt_ddd_dde' => 'required',
            'dichlorophenoxyacetic' => 'required',
        ];



        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        TailingQualityStandard::where('id', $qualitystandard->id)
            ->update($validatedData);
        return redirect('/blasting/tablestandard')->with('success', ' Standard Value Blasting has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TailingQualityStandard  $qualitystandard
     * @return \Illuminate\Http\Response
     */
    public function destroy(TailingQualityStandard $qualitystandard)
    {
        TailingQualityStandard::destroy($qualitystandard->id);
        return redirect('/blasting/tablestandard')->with('success', 'Data has been deleted!');
    }
}
