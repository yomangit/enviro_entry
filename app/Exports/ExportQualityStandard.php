<?php

namespace App\Exports;

use App\Models\EmissionStandard2;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportQualityStandard implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('dashboard.SoilQuality.PointId.export', [
            'QualityStandard' => EmissionStandard2::all()
        ]);
    }
}
