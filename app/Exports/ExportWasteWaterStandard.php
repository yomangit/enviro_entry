<?php

namespace App\Exports;

use App\Models\Wastewaterstandard;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class ExportWasteWaterStandard implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('dashboard.WasteWater.QualityStandard.export', [
            'QualityStd' => Wastewaterstandard::with('user')->filter(request(['fromDate', 'search']))->get()
        ]);
    }
}
