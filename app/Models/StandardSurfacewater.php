<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandardSurfacewater extends Model
{
    use HasFactory;
    public $table = "standard_surfacewaters";
    protected $guarded = ['id'];
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
}
