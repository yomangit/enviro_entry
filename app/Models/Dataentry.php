<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataentry extends Model
{
    public $table = "dataentries";
    use HasFactory;
    protected $guarded=['id'];
    // protected $with=['standard','user'];
    //

    public function scopefilter($query,array $filters)
    {
       
        $query->when($filters['fromDate']?? false, function($query){
        return $query->whereBetween('date', array( date('Y-m-d',strtotime(request('fromDate'))),date('Y-m-d',strtotime( request('toDate'))))); 
        });
        $query->when($filters['search']??false,function($query,$search){
            return $query->whereHas('CodeSample',function($query)use($search){
                $query->where('nama', 'like',  $search );
            });
        });
    }
    public function standard(){
    return $this->belongsTo(Wastewaterstandard::class,'standard_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function PointId(){
        return $this->belongsTo(Codesample::class,'codesample_id');
    }
    public function getRouteKeyName()
{
    return 'id';
}
}
