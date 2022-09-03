<?php

namespace App\Exports;

use App\Models\Soilqualitypointid;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportSoilQualityPointId implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('dashboard.SoilQuality.PointId.export', [
            'Codes' => Soilqualitypointid::where('user_id', auth()->user()->id)->filter(request(['fromDate', 'search']))->get()
        ]);
    }
}
