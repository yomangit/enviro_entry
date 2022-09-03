<?php

namespace App\Exports;

use App\Models\EmissionStandard;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportQualityStandard2 implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('dashboard.AirQuality.Emission.QualityStandard.export2', [
            'QualityStandard' => EmissionStandard::all()
        ]);
    }
}
