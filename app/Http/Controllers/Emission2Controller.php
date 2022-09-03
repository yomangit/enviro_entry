<?php

namespace App\Http\Controllers;

use App\Models\Emission2;
use Illuminate\Http\Request;
use App\Models\EmissionPointId;
use App\Exports\ExportEmission2;
use App\Imports\ImportEmission2;
use App\Models\EmissionStandard;
use Maatwebsite\Excel\Facades\Excel;

class Emission2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.AirQuality.Emission.Master2.index', [
            'tittle' => 'Emission',
            'breadcrumb' => 'Emission',
            'code_units'=>EmissionPointId::all(),
            'QualityStandard'=>EmissionStandard::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString(),
            'Emission' => Emission2::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString()
        ]);
    }

    public function ExportEmission2()
    {

        return Excel::download(new ExportEmission2, 'Emission.csv');
    }
    public function ImportEmission2(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportEmission2;

        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/airquality/emission2')->with('success', 'Data has been Imported!');
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
        return view('dashboard.AirQuality.Emission.Master2.create', [
            'tittle' => 'Emission',
            'breadcrumb' => 'Emission',
            'code_units'=>EmissionPointId::all(),
            'Emission' => Emission2::where('user_id', auth()->user()->id)->get()
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
            'point_id'=>'required',
            'date'=>'required',
            'equipment' => 'required',
            'fuel_type' => 'required',
            'capacity' => 'required',
            'ambient_temperature' => 'required',
            'stack_temperature' => 'required',
            'meter_temperature' => 'required',
            'moisture_content' => 'required',
            'actual_volume_sample' => 'required',
            'standard_volume_sample' => 'required',
            'actual_oxygen_o2' => 'required',
            'velocity_linear' => 'required',
            'dry_molecular_weight' => 'required',
            'actual_stack_flowrate' => 'required',
            'percent_of_isokinetic' => 'required',
            'ammonia_nh3' => 'required',
            'chlorine_cl2' => 'required',
            'hydrogen_chloride_hcl' => 'required',
            'hydrogen_fluoride_hf' => 'required',
            'nitrogen_oxide_nox_as_nitrogen_dioxide_no2' => 'required',
            'opacity' => 'required',
            'total_particulate_isokinetic' => 'required',
            'sulfur_dioxide_so2' => 'required',
            'hydrogen_sulphide_h2s' => 'required',
            'mercury_hg' => 'required',
            'arsenic_as' => 'required',
            'antimony_sb' => 'required',
            'cadmium_cd' => 'required',
            'zinc_zn' => 'required',
            'lead_pb' => 'required'

        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
        Emission2::create($validatedData);
        return redirect('/airquality/emission2/create')->with('success', 'New Data has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emission2  $emission2
     * @return \Illuminate\Http\Response
     */
    public function show(Emission2 $emission2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emission2  $emission2
     * @return \Illuminate\Http\Response
     */
    public function edit(Emission2 $emission2)
    {
        return view('dashboard.AirQuality.Emission.Master2.edit', [
            'tittle' => 'Emission',
            'breadcrumb' => 'Emission',
            'code_units'=>EmissionPointId::all(),
            'Emission' => $emission2
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emission2  $emission2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emission2 $emission2)
    {
        $rules = [
            'point_id'=>'required',
            'date'=>'required',
            'equipment' => 'required',
            'fuel_type' => 'required',
            'capacity' => 'required',
            'ambient_temperature' => 'required',
            'stack_temperature' => 'required',
            'meter_temperature' => 'required',
            'moisture_content' => 'required',
            'actual_volume_sample' => 'required',
            'standard_volume_sample' => 'required',
            'actual_oxygen_o2' => 'required',
            'velocity_linear' => 'required',
            'dry_molecular_weight' => 'required',
            'actual_stack_flowrate' => 'required',
            'percent_of_isokinetic' => 'required',
            'ammonia_nh3' => 'required',
            'chlorine_cl2' => 'required',
            'hydrogen_chloride_hcl' => 'required',
            'hydrogen_fluoride_hf' => 'required',
            'nitrogen_oxide_nox_as_nitrogen_dioxide_no2' => 'required',
            'opacity' => 'required',
            'total_particulate_isokinetic' => 'required',
            'sulfur_dioxide_so2' => 'required',
            'hydrogen_sulphide_h2s' => 'required',
            'mercury_hg' => 'required',
            'arsenic_as' => 'required',
            'antimony_sb' => 'required',
            'cadmium_cd' => 'required',
            'zinc_zn' => 'required',
            'lead_pb' => 'required'
        ];
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['date']=date('Y-m-d',strtotime(request('date')));
        Emission2::where('id', $emission2->id)
            ->update($validatedData);
        return redirect('/airquality/emission2')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emission2  $emission2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emission2 $emission2)
    {
        Emission2::destroy($emission2->id);
        return redirect('/airquality/emission2')->with('success', 'Data has been deleted!');
    }
}
