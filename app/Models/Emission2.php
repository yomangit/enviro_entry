<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emission2 extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public $table ='emission2s';
    public function scopefilter($query,array $filters)
    {
        $query->when($filters['fromDate']?? false, function($query){
                return $query->whereBetween('date', array(request('fromDate'), request('toDate'))); 
            });
            $query->when($filters['search']??false,function($query,$search){
                return $query->whereHas('PointId',function($query)use($search){
                    $query->where('nama', 'like', $search );
                });
            }); 
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function PointId()
    {
        return $this->belongsTo(EmissionPointId::class, 'point_id');
    }
    public function getRouteKeyName()
    {
        return 'id';
    }
}
