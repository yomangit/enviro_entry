<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blasting extends Model
{
    public $table = "blastings";
    use HasFactory;
    protected $guarded = ['id'];
    // protected $with=['standard','user'];
    public function scopefilter($query, array $filters)
    {
        $query->when($filters['fromDate']?? false, function($query){
            return $query->whereBetween('date', array( date('Y-m-d',strtotime(request('fromDate'))),date('Y-m-d',strtotime( request('toDate'))))); 
            });
            $query->when($filters['search']??false,function($query,$search){
                return $query->whereHas('pointID',function($query)use($search){
                    $query->where('nama', 'like', '%' . $search . '%');
                });
            });
    }

    public function pointID()
    {
        return $this->belongsTo(PointIdBlasting::class, 'point_id');
    }
    public function StandardID()
    {
        return $this->belongsTo(StandardBlasting::class, 'standard_id');
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
