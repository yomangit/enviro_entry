<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeBulananNoise extends Model
{
    use HasFactory;
    public $table = "resume_bulanan_noises";
    protected $guarded = ['id'];
    public function scopefilter($query, array $filters)
    {
        
                $query->when($filters['fromDate']?? false, function($query){
        return $query->whereBetween('date', array( date('Y-m-d',strtotime(request('fromDate'))),date('Y-m-d',strtotime( request('toDate'))))); 
        });
        $query->when($filters['bulan']?? false, function($query){
            return $query->where('date','like',"%".date('Y',strtotime( request('bulan')))."%"); 
            });

        $query->when($filters['location'] ?? false, function ($query, $location) {
            return $query->whereHas('CodeLocationNM', function ($query) use ($location) {
                $query->where('nama', 'like',  $location);
            })->orWhereHas('CodeLocationNM', function ($query) {
                $query->where('nama', '=', request('location1'));
            })->orWhereHas('CodeLocationNM', function ($query) {
                $query->where('nama', '=', request('location2'));
            });
        });
        $query->when($filters['location1'] ?? false, function ($query, $location1) {
            return $query->whereHas('CodeLocationNM', function ($query) use ($location1) {
                $query->where('nama', 'like',  $location1);
            })->orWhereHas('CodeLocationNM', function ($query) {
                $query->where('nama', '=', request('location'));
            })->orWhereHas('CodeLocationNM', function ($query) {
                $query->where('nama', '=', request('location2'));
            });
        });
        $query->when($filters['location2'] ?? false, function ($query, $location2) {
            return $query->whereHas('CodeLocationNM', function ($query) use ($location2) {
                $query->where('nama', 'like',  $location2);
            })->orWhereHas('CodeLocationNM', function ($query) {
                $query->where('nama', '=', request('location1'));
            })->orWhereHas('CodeLocationNM', function ($query) {
                $query->where('nama', '=', request('location'));
            });
        });
    }
    public function CodeLocationNM()
    {
        return $this->belongsTo(Lokasi::class,'locationresume');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getRouteKeyName()
    {
        return 'id';
    }

}
