<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TailingCodeId;
use App\Exports\ExportPointID;
use App\Imports\ImportPointID;
use Maatwebsite\Excel\Facades\Excel;

class TailingCodeIdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.Tailing.PointId.index',[
            'tittle'=>'Point ID',
            'breadcrumb'=>'Point ID',
            'TailingCodeId'=>TailingCodeId::with('user')->filter(request(['fromDate', 'search']))->paginate(10)->withQueryString()
        ]);
    }
    public function ExportPointID()
    {

        return Excel::download(new ExportPointID, 'Point Id Tailing.csv');
    }
    public function ImportPointID(Request $request)
    {

        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('EnviroDatabase', $nameFile);
        $import = new ImportPointID;
        try {
            Excel::import($import, public_path('/EnviroDatabase/' . $nameFile));
            return redirect('/tailing/codeid')->with('success', 'Data has been Imported!');
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
        return view('dashboard.Tailing.PointId.create',[
            'tittle'=>'Point ID',
            'breadcrumb'=>'Point ID',
            'TailingCodeId'=>TailingCodeId::where('user_id',auth()->user()->id)->get()
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
            'nama' => 'required|max:255|unique:tailing_code_ids',
            'lokasi' => 'required|max:255'
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        TailingCodeId::create($validatedData);
        return redirect('/tailing/codeid/create')->with('success', 'New Code Sample Surface Water has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TailingCodeId  $codeid
     * @return \Illuminate\Http\Response
     */
    public function show(TailingCodeId $codeid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TailingCodeId  $codeid
     * @return \Illuminate\Http\Response
     */
    public function edit(TailingCodeId $codeid)
    {
        return view('dashboard.Tailing.PointId.edit',[
            'tittle'=>'Point ID',
            'breadcrumb'=>'Point ID',
            'TailingCodeId'=>$codeid
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TailingCodeId  $codeid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TailingCodeId $codeid)
    {
        $rules = [
            'nama' => 'required|max:255',
            'lokasi' => 'required|max:255',
        ];
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        TailingCodeId::where('id', $codeid->id)
            ->update($validatedData);
        return redirect('/tailing/codeid')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TailingCodeId  $codeid
     * @return \Illuminate\Http\Response
     */
    public function destroy(TailingCodeId $codeid)
    {
        TailingCodeId::destroy($codeid->id);
        return redirect('/tailing/codeid')->with('success', 'Data  has been deleted!');
    }
}
