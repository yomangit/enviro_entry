<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualityStandard extends Model
{
    use HasFactory;
    protected $fillable = ['tss','ph_max','ph_min','do','redox','conductivity','tds','temperatur','user_id'];
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
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getRouteKeyName()
    {
        return 'id';
    }
}
