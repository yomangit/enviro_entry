<?php

namespace App\Exports;

use App\Models\Emission;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportEmission implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('dashboard.AirQuality.Emission.Master.export', [
            'Emission' => Emission::all()
        ]);
    }
}
