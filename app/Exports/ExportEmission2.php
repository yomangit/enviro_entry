<?php

namespace App\Exports;

use App\Models\Emission2;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportEmission2 implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('dashboard.AirQuality.Emission.Master2.export', [
            'Emission' => Emission2::all()
        ]);
    }
}
