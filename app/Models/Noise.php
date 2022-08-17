<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noise extends Model
{
    public $table = "noises";
    use HasFactory;
    protected $guarded = ['id'];
    protected $with=['CodeSampleNM','CodeLocationNM'];
    // protected $with=['standard','user'];
    public function scopefilter($query, array $filters)
    {
        // $query->when($filters['fromDate'] ?? false, function ($query) {
        //     return $query->whereBetween('date', array(request('fromDate'), request('toDate')));
        // });
        $query->when($filters['fromDate'] ?? false, function ($query) {
            return  $query->where('date','like', '%'. date('Y-m', strtotime(request('fromDate'))) .'%' );
        });
        $query->when($filters['search']??false,function($query,$search){
            return $query->whereHas('CodeSampleNM',function($query)use($search){
                $query->where('nama', 'like', '%' . $search . '%');
            });
        });
        $query->when($filters['location']??false,function($query,$location){
            return $query->whereHas('CodeLocationNM',function($query)use($location){
                $query->where('nama', 'like', '%' . $location . '%');
            });
        });
    }


    public function standard()
    {
        return $this->belongsTo(TblStandard::class, 'standard_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function CodeSampleNM()
    {
        return $this->belongsTo(Codesamplenm::class,'codesample_id');
    }
    public function CodeLocationNM()
    {
        return $this->belongsTo(Lokasi::class,'location_id');
    }
    public function getRouteKeyName()
    {
        return 'updated_at';
    }
}
