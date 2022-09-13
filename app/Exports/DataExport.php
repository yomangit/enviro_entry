<?php

namespace App\Exports;

use App\Models\Dataentry;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class DataExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('dashboard.SurfaceWater.Master.export', [
            'Input' => Dataentry::all()
        ]);
    }
}




