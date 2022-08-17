<?php

namespace App\Http\Controllers;

use App\Exports\CodeSampleSWExport;
use App\Imports\SampleSurfaceWaterImport;
use App\Models\Codesample;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ResourceCodeSampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.SurfaceWater.Codesample.index', [
            "tittle" => "Code Sample",
            'breadcrumb' => 'Code Sample Surface Water',
            'Codes' => Codesample::where('user_id', auth()->user()->id)->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString() //with diguanakan untuk mengatasi N+1 problem

        ]);
    }
    public function ExportCodeSampleSW()
    {

        return Excel::download(new CodeSampleSWExport, 'codesamples.xlsx');
    }
    public function ImportCodeSampleSW(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new SampleSurfaceWaterImport;

        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/surfacewater/qualityperiode/codesample')->with('success', 'New Code Sample Surface Water has been Imported!');
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
        return view('dashboard.SurfaceWater.Codesample.create', [
            "tittle" => "Code Sample",
            'breadcrumb' => 'Code Sample Surface Water',

            'Codes' => Codesample::where('user_id', auth()->user()->id)->filter(request(['fromDate']))->get() //with diguanakan untuk mengatasi N+1 problem

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
            'nama' => 'required|max:255|unique:codesamples',
            'lokasi' => 'required|max:255'

        ]);

        $validatedData['user_id'] = auth()->user()->id;
        Codesample::create($validatedData);
        return redirect('/surfacewater/qualityperiode/codesample/create')->with('success', 'New Code Sample Surface Water has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Codesample  $codesample
     * @return \Illuminate\Http\Response
     */
    public function show(Codesample $codesample)
    {
        return view('dashboard.SurfaceWater.Codesample.show', [
            "tittle" => "Code Sample ",
            'breadcrumb' => 'Code Sample Surface Water',
            'Codes' => $codesample
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Codesample  $codesample
     * @return \Illuminate\Http\Response
     */
    public function edit(Codesample $codesample)
    {
        return view('dashboard.SurfaceWater.Codesample.edit', [
            "tittle" => "Code Sample",
            'breadcrumb' => 'Code Sample Surface Water',

            'Codes' => $codesample
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Codesample  $codesample
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Codesample $codesample)
    {
        $rules = [
            'nama' => 'required|max:255',
            'lokasi' => 'required|max:255',
        ];
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        Codesample::where('id', $codesample->id)
            ->update($validatedData);
        return redirect('/surfacewater/qualityperiode/codesample')->with('success', 'Code Sample Surface Water has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Codesample  $codesample
     * @return \Illuminate\Http\Response
     */
    public function destroy(Codesample $codesample)
    {
        Codesample::destroy($codesample->id);
        return redirect('/surfacewater/qualityperiode/codesample')->with('success', 'Data Code Sample Surface Water has been deleted!');
    }
}
