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
        
        $query->when($filters['fromDate'] ?? false, function ($query) {
            return  $query->where('date','like', '%'. date('Y-m', strtotime(request('fromDate'))) .'%' );
        });
        // $query->when($filters['location']??false,function($query,$location){
        //     return $query->where('location', 'like', '%' . $location . '%');
           
        // });
        $query->when($filters['location']??false,function($query,$location){
            return $query->whereHas('CodeLocationNM',function($query)use($location){
                $query->where('nama', 'like', '%' . $location . '%');
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
