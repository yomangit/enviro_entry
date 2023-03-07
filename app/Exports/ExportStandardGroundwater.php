<?php

namespace App\Exports;

use App\Models\GroundWaterMonthStandard;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportStandardGroundwater implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('dashboard.GroundWater.Standard.export',[
            'MonthStandard' => GroundWaterMonthStandard::where('user_id', auth()->user()->id)->filter(request(['fromDate', 'search']))->get()
        ]);
    }
}
