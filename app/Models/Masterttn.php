<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masterttn extends Model
{
   
    public $table = "masterttns";
    use HasFactory;
    protected $guarded=['id'];
    // protected $with=['standard','user'];
    

    public function scopefilter($query,array $filters)
    {
        $query->when($filters['fromDate']?? false, function($query){
            return $query->whereBetween('date', array( date('Y-m-d',strtotime(request('fromDate'))),date('Y-m-d',strtotime( request('toDate'))))); 
            });
        
            //    $query->when($filters['search']??false,function($query,$search){
            //     return  $query->where('nama', 'like', '%' . $search . '%')
            //                   ->orWhere('lokasi', 'like', '%' . $search . '%');
            // });
            $query->when($filters['search']??false,function($query,$search){
                return $query->whereHas('CodeSampleTTN',function($query)use($search){
                    $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('lokasi', 'like', '%' . $search . '%');
                });
            });
          
    }
  
     public function standard(){
    return $this->belongsTo(TblStandard::class,'standard_id');
    }
    public function CodeSampleTTN(){
        return $this->belongsTo(Codesamplettn::class,'codesamplettn_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function getRouteKeyName()
{
    return 'failed_at';
}
}
