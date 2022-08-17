<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Codesample extends Model
{
    public $table = "codesamples";
    use HasFactory;
    // protected $guarded=['id'];
    // protected $with=['standard','user'];
    protected $fillable = ['nama','user_id','lokasi'];

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
    public function masterGW()
    {
        return $this->hasMany(Mastergw::class,'groundwater_id');
    }
    public function groundwaterstandard()
    {
        return $this->hasMany(GroundWaterStandard::class,'gwtandard_id');
    }
    public function getRouteKeyName()
{
    return 'id';
}
}
