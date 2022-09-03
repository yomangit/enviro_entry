<?php

namespace App\Exports;
use App\Models\Rainfall;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportRainfall implements FromView, ShouldAutoSize, WithEvents
{
    
    private $Rainfall;

    public function __construct($Rainfall)
    {
        $this->Rainfall =$Rainfall;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {

        $avg_rainfall = Rainfall::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate', 'search']))->paginate(31)->withQueryString()->sum('rainfall');
        $avg_year = Rainfall::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate', 'search']))->get()->sum('rainfall');
        $max_rainfall = Rainfall::where('user_id', auth()->user()->id)->latest()->filter(request(['fromDate', 'search']))->paginate(31)->withQueryString()->max('rainfall');
        $rainday = Rainfall::where('rainfall', '>', 0)->filter(request(['fromDate', 'search']))->get();
        $count = $rainday->count();
        $wetday = Rainfall::where('rainfall', '>', 5)->filter(request(['fromDate', 'search']))->get();
        $count2 = $wetday->count();
        // $Rainfall=Rainfall::with('user_id', auth()->user()->id)->filter(request(['fromDate', 'search']))->get();

        return view('dashboard.Weather.Rainfall.export', [
            'avg_rainfall' => $avg_rainfall,
            'avg_year' => $avg_year,
            'max_rainfall' => $max_rainfall,
            'rainday' => $count,
            'wetday' => $count2,
            'Rainfall' => $this->Rainfall
        ]);
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->setRightToLeft(true);
            },
        ];
    }
}
