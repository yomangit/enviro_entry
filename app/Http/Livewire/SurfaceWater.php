<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Dataentry;
use App\Models\Codesample;
use App\Models\Wastewaterstandard;

class SurfaceWater extends Component
{
    use WithPagination;
    public $fromDate='';
    public $toDate='';
    public $search=''; 
    protected $paginationTheme ='bootstrap';
    public function render()
    {

        $firstDayofPreviousMonth = doubleval(strtotime(request($this->fromDate)));
        $lastDayofPreviousMonth = doubleval(strtotime(request($this->toDate)));
        if (empty($firstDayofPreviousMonth)) {
            $table = 30;
        } else
            $table = ($lastDayofPreviousMonth - $firstDayofPreviousMonth) / 86400;
        $grafiks = Dataentry::with('user')
            ->filter(request(['fromDate', 'search']))->paginate($table)->withQueryString();
        $tanggal = [];
        $suhu = [];
        $conductivity = [];
        $tds = [];
        $nama = [];
        $lokasi = [];
        $tss = [];
        $ph = [];
        $do = [];
        $tssStandard = [];
        $tdsStandard = [];
        $conductivityStandard = [];
        $phMin = [];
        $phMax = [];
        $doStandard = [];

        foreach ($grafiks as $grafik) {
            $nama[] = $grafik->PointId->nama;
            $lokasi[] = $grafik->PointId->lokasi;
            // $doStandard[]=$grafik->standard->do;
            $tanggal[] = date('d-M-Y', strtotime($grafik->date));

            if (is_numeric($grafik->temperatur)) {
                $suhu[] = doubleval($grafik->temperatur);
            } else {

                $suhu[] = '';
            }


            if (is_numeric($grafik->conductivity)) {
                $conductivity[] =  doubleval($grafik->conductivity);
            } else {

                $conductivity[] = '';
            }
            if (is_numeric($grafik->tds)) {

                $tds[] =  doubleval($grafik->tds);
            } else {
                $tds[] = '';
            }
            if (is_numeric($grafik->tss)) {
                $tss[] =  doubleval($grafik->tss);
            } else {
                $tss[] = '';
            }
            if (is_numeric($grafik->ph)) {
                $ph[] =  doubleval($grafik->ph); # code...

            } else {
                $ph[] = '';
            }
            if (is_numeric($grafik->do)) {
                $do[] =  doubleval($grafik->do); # code...

            } else {
                $do[] = '';
            }




            if (!is_numeric($grafik->ph)) {
                $phMax[] = '';
                $phMin[] = '';
            } 
            elseif (is_numeric($grafik->standard->ph_max) && $grafik->standard->ph_min) 
            {
                $phMax[] = doubleval($grafik->standard->ph_max);
                $phMin[] = doubleval($grafik->standard->ph_min);
            } 


            if (!is_numeric($grafik->conductivity)) {
                $conductivityStandard[] = '';
            } elseif (is_numeric($grafik->standard->conductivity)) {
                $conductivityStandard[] = doubleval($grafik->standard->conductivity);
            } else {
                $conductivityStandard[] = '';
            }
            if (!is_numeric($grafik->tss)) {
                $tssStandard[] = '';
            } elseif ($grafik->standard->totalsuspendedsolids_tss) {
                $tssStandard[] = doubleval($grafik->standard->totalsuspendedsolids_tss);
            } else {
                $tssStandard[] = '';
            }
            if (!is_numeric($grafik->tds)) {

                $tdsStandard[] = '';
            } elseif ($grafik->standard->totaldissolvedsolids_tds) {
                $tdsStandard[] = doubleval($grafik->standard->totaldissolvedsolids_tds);
            } else {
                $tdsStandard[] = '';
            }
            if (is_numeric($grafik->standard->dissolvedoxygen_do)) {
                $doStandard[] = doubleval($grafik->standard->dissolvedoxygen_do);
            } else {
                $doStandard[] = '';
            }
        }

        return view('livewire.surface-water',[
            'code_units' => Codesample::all(),
            'QualityStandard' => Wastewaterstandard::all(),
            'tittle' => 'Surface Water',
            'breadcrumb' => 'Surface Water',
            'date' => $tanggal,
            'suhu' => $suhu,
            'conductivity' => $conductivity,
            'tds' => $tds,
            'tss' => $tss,
            'ph' => $ph,
            'do' => $do,
            'doStandard' => $doStandard,
            'tssStandard' => $tssStandard,
            'tdsStandard' => $tdsStandard,
            'cdvStd' => $conductivityStandard,
            'phMin' => $phMin,
            'phMax' => $phMax,
            'Input' => Dataentry::with('user')->whereBetween('date', array( date('Y-m-d',strtotime(request($this->fromDate))),date('Y-m-d',strtotime( request($this->toDate)))))
            ->orderBy('date', 'desc')
                ->filter(request(['fromDate', 'search']))
                ->paginate(30)
                ->withQueryString(), //with diguanakan untuk mengatasi N+1 problem
        ]);
    }
}
