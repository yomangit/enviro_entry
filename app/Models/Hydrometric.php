<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hydrometric extends Model
{
    public $table = 'hydrometrics';
    use HasFactory;
    protected $guarded=['id'];
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
        return $this->belongsTo(CodeHydrometric::class, 'point_id');
    }
    public function getRouteKeyName()
    {
        return 'id';
    }
}
