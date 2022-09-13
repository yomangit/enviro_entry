<?php

namespace App\Exports;

use App\Models\Dust;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DustExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('dashboard.DustGauge.DustMaster.export',[
            'Dust' => Dust::where('user_id', auth()->user()->id)->filter(request(['fromDate', 'search']))->get()
        ]);
    }
}
