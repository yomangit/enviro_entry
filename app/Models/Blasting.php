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
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->whereHas('PointId', function ($query) use ($search) {
                    $query->where('nama', 'like',  $search);
                })->orWhereHas('PointId', function ($query) {
                    $query->where('nama', '=', request('search1'));
                })->orWhereHas('PointId', function ($query) {
                    $query->where('nama', '=', request('search2'));
                });
            });
            $query->when($filters['search1'] ?? false, function ($query, $search1) {
                return $query->whereHas('PointId', function ($query) use ($search1) {
                    $query->where('nama', 'like',  $search1);
                })->orWhereHas('PointId', function ($query) {
                    $query->where('nama', '=', request('search'));
                })->orWhereHas('PointId', function ($query) {
                    $query->where('nama', '=', request('search2'));
                });
            });
            $query->when($filters['search2'] ?? false, function ($query, $search2) {
                return $query->whereHas('PointId', function ($query) use ($search2) {
                    $query->where('nama', 'like',  $search2);
                })->orWhereHas('PointId', function ($query) {
                    $query->where('nama', '=', request('search1'));
                })->orWhereHas('PointId', function ($query) {
                    $query->where('nama', '=', request('search'));
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
