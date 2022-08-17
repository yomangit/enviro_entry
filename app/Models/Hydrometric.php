<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hydrometric extends Model
{
    public $table = 'hydrometrics';
    use HasFactory;
    protected $fillable = ['start_time','stop_time','cyanide','level','codeHydrometric_id','lvl_lgr','tl_wall','tl_tsf','debit_s','debit_d','orp','tss','ph','do','conductivity',
    'tds','temperatur','salinity','turbidity','water_condition','water_color','odor','rain','rain_during_sampling','oil_layer','source_pollution','remarks','sampler','standard_id','user_id','date'];
    public function scopefilter($query, array $filters)
    {

        $query->when($filters['fromDate'] ?? false, function ($query) {
            return $query->whereBetween('date', array(date('Y-m-d', strtotime(request('fromDate'))), date('Y-m-d', strtotime(request('toDate')))));
        });
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->whereHas('CodeSample', function ($query) use ($search) {
                $query->where('nama', 'like',  $search);
            });
        });
    }
    public function standard()
    {
        return $this->belongsTo(QualityStandard::class, 'standard_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function CodeSample()
    {
        return $this->belongsTo(CodeHydrometric::class, 'codeHydrometric_id');
    }
    public function getRouteKeyName()
    {
        return 'id';
    }
}
