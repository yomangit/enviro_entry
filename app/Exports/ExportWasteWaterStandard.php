<?php

namespace App\Exports;

use App\Models\Wastewaterstandard;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportWasteWaterStandard implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('dashboard.WasteWater.QualityStandard.export', [
            'QualityStd' => Wastewaterstandard::where('user_id', auth()->user()->id)->filter(request(['fromDate', 'search']))->get()
        ]);
    }
}
