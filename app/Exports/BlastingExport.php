<?php

namespace App\Exports;

use App\Models\Blasting;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BlastingExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('dashboard.Blasting.Master.export', [
            'Blasting' => Blasting::where('user_id', auth()->user()->id)->filter(request(['fromDate', 'search']))->get()
        ]);
    }
}
