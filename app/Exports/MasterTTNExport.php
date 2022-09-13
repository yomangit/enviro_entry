<?php

namespace App\Exports;

use App\Models\Masterttn;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MasterTTNExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('dashboard.GroundWater.MasterTTN.export', [
            'Groundwater' => Masterttn::with('user')->filter(request(['fromDate', 'search']))->get()
        ]);
    }
}
