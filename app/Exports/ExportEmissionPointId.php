<?php

namespace App\Exports;

use App\Models\EmissionPointId;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportEmissionPointId implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('dashboard.AirQuality.Emission.PointId.export', [
            'PointID' => EmissionPointId::all()
        ]);
    }
}
