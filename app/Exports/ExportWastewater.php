<?php

namespace App\Exports;

use App\Models\Wastewater;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportWastewater implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('dashboard.WasteWater.Master.export', [
            'Wastewater' => Wastewater::where('user_id', auth()->user()->id)->filter(request(['fromDate', 'search']))->get()
        ]);
    }
}
