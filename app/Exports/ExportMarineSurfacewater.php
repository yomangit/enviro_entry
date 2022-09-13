<?php

namespace App\Exports;

use App\Models\MarineSurfacewater;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportMarineSurfacewater implements FromView
{


    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('dashboard.SurfaceWater.Marine.export',[
            'Marine' => MarineSurfacewater::with('user')->filter(request(['fromDate', 'search']))->get()
        ]);
    }
}
