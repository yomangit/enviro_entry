<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class GroundWaterMonthStandard extends Model
{
    public $table = "ground_water_month_standards";
    use HasFactory;
    protected $guarded=['id'];
    // protected $with=['standard','user'];
    public function scopefilter($query,array $filters)
    {
        $query->when($filters['fromDate']?? false, function($query){
                return $query->whereBetween('date', array(request('fromDate'), request('toDate'))); 
            });
            $query->when($filters['search']??false,function($query,$search){
                return  $query->where('nama', 'like', '%' . $search . '%')
                            ->orWhere('lokasi', 'like', '%' . $search . '%');
            });
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function getRouteKeyName()
{
    return 'id';
}
}
