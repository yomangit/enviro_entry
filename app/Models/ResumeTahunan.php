<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeTahunan extends Model
{
    public $table="resume_tahunans";
    protected $guarded = ['id'];
    use HasFactory;

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
        return $this->belongsTo(Lokasi::class,'locationResume');
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
