<?php

namespace App\Exports;

use App\Models\Mastergw;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GroundWaterExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('dashboard.GroundWater.Mastergw.export', [
            'Groundwater' => Mastergw::with('user')->filter(request(['fromDate', 'search']))->get()
        ]);
    }
}
