<?php

namespace App\Exports;

use App\Models\Soilqualitystandard;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportSoilStandard implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('dashboard.SoilQuality.QualityStandard.export', [
            'StandardQuality' => Soilqualitystandard::where('user_id', auth()->user()->id)->filter(request(['fromDate', 'search']))->get()
        ]);
    }
}
