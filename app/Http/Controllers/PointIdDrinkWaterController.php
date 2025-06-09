<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PointIdDrinkwater;
use App\Exports\ExportPointIdDrink;
use App\Imports\ImportPointIdDrink;
use Maatwebsite\Excel\Facades\Excel;

class PointIdDrinkWaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.SurfaceWater.DrinkWater.PointId.index', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'PointID' => PointIdDrinkwater::with('user')->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString() //with diguanakan untuk mengatasi N+1 problem

        ]);
    }
    public function ExportdrinkwaterPointId()
    {

        return Excel::download(new ExportPointIdDrink, 'Point Id.csv');
    }
    public function ImportdrinkwaterPointId(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportPointIdDrink;
        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/surfacewater/drinkwater/pointid')->with('success', 'Data has been Imported!');
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
        return view('dashboard.SurfaceWater.DrinkWater.PointId.create', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'PointID' => PointIdDrinkwater::where('user_id', auth()->user()->id)->get() //with diguanakan untuk mengatasi N+1 problem

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
        PointIdDrinkwater::create($validatedData);
        return redirect('/surfacewater/drinkwater/pointid/create')->with('success', 'New Code Sample Surface Water has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PointIdDrinkwater  $pointid
     * @return \Illuminate\Http\Response
     */
    public function show(PointIdDrinkwater $pointid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PointIdDrinkwater  $pointid
     * @return \Illuminate\Http\Response
     */
    public function edit(PointIdDrinkwater $pointid)
    {
        return view('dashboard.SurfaceWater.DrinkWater.PointId.edit', [
            "tittle" => "Point ID",
            'breadcrumb' => 'Point ID',
            'PointID' => $pointid
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PointIdDrinkwater  $pointid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PointIdDrinkwater $pointid)
    {
        $rules = [
            'nama' => 'required|max:255',
            'lokasi' => 'required|max:255',
        ];
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        PointIdDrinkwater::where('id', $pointid->id)
            ->update($validatedData);
        return redirect('/surfacewater/drinkwater/pointid')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PointIdDrinkwater  $pointid
     * @return \Illuminate\Http\Response
     */
    public function destroy(PointIdDrinkwater $pointid)
    {
        PointIdDrinkwater::destroy($pointid->id);
        return redirect('/surfacewater/drinkwater/pointid')->with('success', 'Data Code Sample Surface Water has been deleted!');
    }
}
