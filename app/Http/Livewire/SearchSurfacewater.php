<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Dataentry;
use App\Models\Codesample;
use Livewire\WithPagination;
use App\Models\Wastewaterstandard;

class SearchSurfacewater extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $tanggal;
    public $suhu;
    public $conductivity;
    public $tds;
    public $nama;
    public $lokasi;
    public $tss;
    public $ph;
    public $do;
    public $tssStandard;
    public $tdsStandard;
    public $conductivityStandard;
    public $phMin;
    public $phMax;
    public $doStandard;

    public function mount()
    {
        $firstDayofPreviousMonth = doubleval(strtotime(request('fromDate')));
        $lastDayofPreviousMonth = doubleval(strtotime(request('toDate')));
        if (empty($firstDayofPreviousMonth)) {
            $table = 30;
        } 
        else
            $table = ($lastDayofPreviousMonth - $firstDayofPreviousMonth) / 86400;
        $grafiks = Dataentry::when($this->search ?? false, function ($query, $search) {
            return $query->whereHas('PointId', function ($query) use ($search) {
                $query->where('nama', 'like',  $search);
            });
        })->paginate($table);

        $tanggal = [];
        $suhu = [];
        $conductivity = [];
        $tds = [];
        $nama=[];
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
            $this->nama = $grafik->PointId->nama;
            $this->lokasi[] = $grafik->PointId->lokasi;
            // $doStandard[]=$grafik->standard->do;
            $this->tanggal[] = date('d-M-Y', strtotime($grafik->date));

            if (is_numeric($grafik->temperatur)) {
                $this->suhu[] = doubleval($grafik->temperatur);
            } else {

                $this->suhu[] = '';
            }


            if (is_numeric($grafik->conductivity)) {
                $this->conductivity[] =  doubleval($grafik->conductivity);
            } else {

                $this->conductivity[] = '';
            }
            if (is_numeric($grafik->tds)) {

                $this->tds[] =  doubleval($grafik->tds);
            } else {
                $this->tds[] = '';
            }
            if (is_numeric($grafik->tss)) {
                $this->tss[] =  doubleval($grafik->tss);
            } else {
                $this->tss[] = '';
            }
            if (is_numeric($grafik->ph)) {
                $this->ph =$ph[] =  doubleval($grafik->ph); # code...

            } else {
                $this->ph =$ph[] = '';
            }
            if (is_numeric($grafik->do)) {
                $this->do[] =  doubleval($grafik->do); # code...

            } else {
                $this->do[] = '';
            }




            if (!is_numeric($grafik->ph)) {
                $this->phMax[] = '';
                $this->phMin[] = '';
            } elseif (is_numeric($grafik->standard->ph_max) && $grafik->standard->ph_min) {
                $this->phMax[] = doubleval($grafik->standard->ph_max);
                $this->phMin[] = doubleval($grafik->standard->ph_min);
            }


            if (!is_numeric($grafik->conductivity)) {
                $this->conductivityStandard[] = '';
            } elseif (is_numeric($grafik->standard->conductivity)) {
                $this->conductivityStandard[] = doubleval($grafik->standard->conductivity);
            } else {
                $this->conductivityStandard[] = '';
            }
            if (!is_numeric($grafik->tss)) {
                $this->tssStandard[] = '';
            } elseif ($grafik->standard->totalsuspendedsolids_tss) {
                $this->tssStandard[] = doubleval($grafik->standard->totalsuspendedsolids_tss);
            } else {
                $this->tssStandard[] = '';
            }
            if (!is_numeric($grafik->tds)) {

                $this->tdsStandard[] = '';
            } elseif ($grafik->standard->totaldissolvedsolids_tds) {
                $this->tdsStandard[] = doubleval($grafik->standard->totaldissolvedsolids_tds);
            } else {
                $this->tdsStandard[] = '';
            }
            if (is_numeric($grafik->standard->dissolvedoxygen_do)) {
                $this->doStandard[] = doubleval($grafik->standard->dissolvedoxygen_do);
            } else {
                $this->doStandard[] = '';
            }
        }
    }

    public function render()
    {
      

        return view('livewire.search-surfacewater', [
            'code_units' => Codesample::all(),
            'QualityStandard' => Wastewaterstandard::all(),
            'tittle' => 'Surface Water',
            'breadcrumb' => 'Surface Water',
            // 'date' => $this->tanggal,
            // 'suhu' => $this->suhu,
            // 'conductivity' => $this->conductivity,
            // 'tds' => $this->tds,
            // 'tss' => $this->tss,
            // 'ph' => $this->ph,
            // 'do' => $this->do,
            // 'doStandard' => $this->doStandard,
            // 'tssStandard' => $this->tssStandard,
            // 'tdsStandard' => $this->tdsStandard,
            // 'cdvStd' => $this->conductivityStandard,
            // 'phMin' => $this->phMin,
            // 'phMax' => $this->phMax,
            // 'Input' => $grafiks, //with diguanakan untuk mengatasi N+1 problem
        ]);
    }
}
