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
        $query->when($filters['fromDate']?? false, function($query){
            return $query->whereBetween('date', array( date('Y-m-d',strtotime(request('fromDate'))),date('Y-m-d',strtotime( request('toDate'))))); 
            });
            $query->when($filters['search']??false,function($query,$search){
                return $query->whereHas('Biota',function($query)use($search){
                    $query->where('nama', 'like', '%' . $search . '%');
                });
            });

            $query->when($filters['location'] ?? false, function ($query, $location) {
                return $query->whereHas('locationBiota', function ($query) use ($location) {
                    $query->where('nama', 'like',  $location);
                })->orWhereHas('locationBiota', function ($query) {
                    $query->where('nama', '=', request('location1'));
                })->orWhereHas('locationBiota', function ($query) {
                    $query->where('nama', '=', request('location2'));
                });
            });
            $query->when($filters['location1'] ?? false, function ($query, $location1) {
                return $query->whereHas('locationBiota', function ($query) use ($location1) {
                    $query->where('nama', 'like',  $location1);
                })->orWhereHas('locationBiota', function ($query) {
                    $query->where('nama', '=', request('location'));
                })->orWhereHas('locationBiota', function ($query) {
                    $query->where('nama', '=', request('location2'));
                });
            });
            $query->when($filters['location2'] ?? false, function ($query, $location2) {
                return $query->whereHas('locationBiota', function ($query) use ($location2) {
                    $query->where('nama', 'like',  $location2);
                })->orWhereHas('locationBiota', function ($query) {
                    $query->where('nama', '=', request('location1'));
                })->orWhereHas('locationBiota', function ($query) {
                    $query->where('nama', '=', request('location'));
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
