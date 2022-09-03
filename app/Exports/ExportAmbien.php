<?php

namespace App\Exports;

use App\Models\Ambien;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportAmbien implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('dashboard.AirQuality.Ambien.export', [
            'Ambien' => Ambien::all()
        ]);
    }
}
