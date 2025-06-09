<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurfacewaterMonthly extends Model
{
    use HasFactory;
    public $table = "surfacewater_monthlies";
    protected $guarded = ['id'];
    public function scopefilter($query,array $filters)
    {
       
        $query->when($filters['fromDate']?? false, function($query){
        return $query->whereBetween('date', array( date('Y-m-d',strtotime(request('fromDate'))),date('Y-m-d',strtotime( request('toDate'))))); 
        });
        $query->when($filters['search']??false,function($query,$search){
            return $query->whereHas('PointId',function($query)use($search){
                $query->where('nama', 'like',  $search );
            });
        });
    }
    public function standard(){
    return $this->belongsTo(StandardSurfacewater::class,'standard_id');
    }
    public function PointId(){
        return $this->belongsTo(Codesample::class,'codesample_id');
    }
}
