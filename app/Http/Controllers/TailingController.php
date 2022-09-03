<?php

namespace App\Http\Controllers;

use App\Models\Tailing;
use Illuminate\Http\Request;
use App\Models\TailingCodeId;
use App\Exports\ExportTailing;
use App\Imports\ImportTailing;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\TailingQualityStandard;

class TailingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.Tailing.index',[
            'tittle'=>'Tailing',
            'breadcrumb'=>'Quality Standard',
            'code_units'=>TailingCodeId::all(),
            'QualityStd' => TailingQualityStandard::where('user_id', auth()->user()->id)->filter(request(['fromDate','search']))->paginate(10)->withQueryString(),
            'Tailing'=>Tailing::where('user_id',auth()->user()->id)->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString()
        ]);
    }
    public function ExportTailing()
    {

        return Excel::download(new ExportTailing, 'Tailing.csv');
    }
    public function ImportTailing(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportTailing;
        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/tailing')->with('success', 'Data has been Imported!');
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
        return view('dashboard.Tailing.create',[
            'tittle'=>'Tailing',
            'breadcrumb'=>'Quality Standard',
            'code_units'=>TailingCodeId::all(),
            'QualityStd' => TailingQualityStandard::where('user_id', auth()->user()->id)->filter(request(['fromDate','search']))->paginate(10)->withQueryString(),
            'Tailing'=>Tailing::where('user_id',auth()->user()->id)->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString()
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
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
        Tailing::create($validatedData);
        return redirect('/tailing/qualitystandard/create')->with('success', 'New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tailing  $tailing
     * @return \Illuminate\Http\Response
     */
    public function show(Tailing $tailing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tailing  $tailing
     * @return \Illuminate\Http\Response
     */
    public function edit(Tailing $tailing)
    {
        return view('dashboard.Tailing.edit',[
            'tittle'=>'Tailing',
            'breadcrumb'=>'Quality Standard',
            'code_units'=>TailingCodeId::all(),
            'Tailing'=>$tailing
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tailing  $tailing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tailing $tailing)
    {
        $rules = [
            'point_id' => 'required',
            'date' => 'required', 
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
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
        Tailing::where('id', $tailing->id)
            ->update($validatedData);
        return redirect('/tailing')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tailing  $tailing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tailing $tailing)
    {
        Tailing::destroy($tailing->id);
        return redirect('/tailing')->with('success', 'Data has been deleted!');
    }
}
