<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PointIdMarine;
use App\Exports\ExportPointIdMarine;
use App\Imports\ImportPointIdMarine;
use Maatwebsite\Excel\Facades\Excel;

class PointIdMarineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.SurfaceWater.Marine.PointId.index', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'PointID' => PointIdMarine::with('user')->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString() //with diguanakan untuk mengatasi N+1 problem

        ]);
    }

    public function ExportPointIdMarine()
    {

        return Excel::download(new ExportPointIdMarine, 'Point Id Marine.csv');
    }
    public function ImportPointIdMarine(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportPointIdMarine;
        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/surfacewater/marinesurfacewater/pointid')->with('success', 'Data has been Imported!');
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
        return view('dashboard.SurfaceWater.Marine.PointId.create', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'PointID' => PointIdMarine::where('user_id', auth()->user()->id)->get() //with diguanakan untuk mengatasi N+1 problem

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
            'nama' => 'required|max:255|unique:point_id_drinkwaters',
            'lokasi' => 'required|max:255'
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        PointIdMarine::create($validatedData);
        return redirect('/surfacewater/marinesurfacewater/pointid/create')->with('success', 'New Code Sample Surface Water has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PointIdMarine  $pointid
     * @return \Illuminate\Http\Response
     */
    public function show(PointIdMarine $pointid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PointIdMarine  $pointid
     * @return \Illuminate\Http\Response
     */
    public function edit(PointIdMarine $pointid)
    {
        return view('dashboard.SurfaceWater.Marine.PointId.edit', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'PointID' => $pointid
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PointIdMarine  $pointid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PointIdMarine $pointid)
    {
        $rules = [
            'nama' => 'required|max:255',
            'lokasi' => 'required|max:255',
        ];
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        PointIdMarine::where('id', $pointid->id)
            ->update($validatedData);
        return redirect('/surfacewater/marinesurfacewater/pointid')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PointIdMarine  $pointid
     * @return \Illuminate\Http\Response
     */
    public function destroy(PointIdMarine $pointid)
    {
        PointIdMarine::destroy($pointid->id);
        return redirect('/surfacewater/marinesurfacewater/pointid')->with('success', 'Data Code Sample Surface Water has been deleted!');
    }
}
