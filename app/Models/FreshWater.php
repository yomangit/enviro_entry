<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreshWater extends Model
{
    public $table = "fresh_waters";
    use HasFactory;
    protected $guarded=['id'];
    // protected $with=['standard','user'];
    

    public function scopefilter($query,array $filters)
    {
        //    $query->when($filters['fromDate']?? false, function($query){
        //         return $query->whereBetween('date', array(request('fromDate'), request('toDate'))); 
        //        });

               $query->when($filters['fromDate'] ?? false, function ($query) {
                return  $query->where('date',array(date('Y-m-d',strtotime(request('fromDate')))) );
            });
        
            //    $query->when($filters['search']??false,function($query,$search){
            //     return  $query->where('nama', 'like', '%' . $search . '%')
            //                   ->orWhere('lokasi', 'like', '%' . $search . '%');
            // });
            $query->when($filters['search']??false,function($query,$search){
                return $query->whereHas('Biota',function($query)use($search){
                    $query->where('nama', 'like', '%' . $search . '%');
                });
            });
            $query->when($filters['location']??false,function($query,$location){
                return $query->whereHas('locationBiota',function($query)use($location){
                    $query->where('nama', 'like', '%' . $location . '%');
                });
            });
          
    }
  
    public function Biota(){
        return $this->belongsTo(Biota::class,'biota_id');
    }
    public function locationBiota(){
        return $this->belongsTo(LocationBiota::class,'location_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function getRouteKeyName()
{
    return 'created_at';
}
}
