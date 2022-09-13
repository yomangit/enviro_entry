<?php

namespace App\Exports;

use App\Models\FreshWater;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportFreshwater implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('dashboard.BiotaMonitoring.Freshwater.export', [
            'FreshWater' => FreshWater::where('user_id', auth()->user()->id)->filter(request(['fromDate', 'search']))->get()
        ]);
    }
}
