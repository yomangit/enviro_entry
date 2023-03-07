<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dust extends Model
{
    public $table = "dusts";
    use HasFactory;
    protected $guarded=['id'];
    // protected $with=['standard','user'];
    public function scopefilter($query,array $filters)
    {
        $query->when($filters['fromDate']?? false, function($query){
            return $query->whereBetween('date_out', array( date('Y-m-d',strtotime(request('fromDate'))),date('Y-m-d',strtotime( request('toDate'))))); 
            });
            // $query->when($filters['search']??false,function($query,$search){
            //     return  $query->where('nama', 'like', '%' . $search . '%')
            //                 ->orWhere('lokasi', 'like', '%' . $search . '%');
            // });
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->whereHas('CodeDust', function ($query) use ($search) {
                    $query->where('nama', 'like',  $search);
                })->orWhereHas('CodeDust', function ($query) {
                    $query->where('nama', '=', request('search1'));
                })->orWhereHas('CodeDust', function ($query) {
                    $query->where('nama', '=', request('search2'));
                });
            });
            $query->when($filters['search1'] ?? false, function ($query, $search1) {
                return $query->whereHas('CodeDust', function ($query) use ($search1) {
                    $query->where('nama', 'like',  $search1);
                })->orWhereHas('CodeDust', function ($query) {
                    $query->where('nama', '=', request('search'));
                })->orWhereHas('CodeDust', function ($query) {
                    $query->where('nama', '=', request('search2'));
                });
            });
            $query->when($filters['search2'] ?? false, function ($query, $search2) {
                return $query->whereHas('CodeDust', function ($query) use ($search2) {
                    $query->where('nama', 'like',  $search2);
                })->orWhereHas('CodeDust', function ($query) {
                    $query->where('nama', '=', request('search1'));
                })->orWhereHas('CodeDust', function ($query) {
                    $query->where('nama', '=', request('search'));
                });
            });
    }


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function CodeDust(){
        return $this->belongsTo(Codesampledg::class,'codedust_id');
    }

    public function getRouteKeyName()
{
    return 'id';
}
}
