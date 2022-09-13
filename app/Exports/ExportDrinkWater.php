<?php

namespace App\Exports;

use App\Models\DrinkWater;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportDrinkWater implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('dashboard.SurfaceWater.DrinkWater.export',[
            'Drink' => DrinkWater::with('user')->filter(request(['fromDate', 'search']))->get()
        ]);
    }
}
