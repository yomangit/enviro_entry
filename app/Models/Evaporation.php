<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaporation extends Model
{
    use HasFactory;
    public $table = 'evaporations';
    use HasFactory;
    protected $guarded = ['id'];

    public function scopefilter($query, array $filters)
    {


        $query->when($filters['fromDate']?? false, function($query){
            return $query->whereBetween('date', array( date('Y-m-d',strtotime(request('fromDate'))),date('Y-m-d',strtotime( request('toDate'))))); 
            });
        $query->when($filters['bulan']?? false, function($query){
            return $query->where('date','like',"%".date('Y-m',strtotime( request('bulan')))."%"); 
            });
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->whereHas('PointId', function ($query) use ($search) {
                $query->where('nama', 'like',  $search);
            });
        });
    }
    public function getRouteKeyName()
    {
        return 'id';
    }
    public function PointId()
    {
        return $this->belongsTo(Evaporationpointid::class, 'point_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
