<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biota extends Model
{
    public $table = "biotas";
    use HasFactory;
    protected $guarded = ['id'];
    // protected $with=['standard','user'];
    public function scopefilter($query, array $filters)
    {
        $query->when($filters['fromDate'] ?? false, function ($query) {
            return $query->whereBetween('date', array(request('fromDate'), request('toDate')));
        });
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return  $query->where('nama', 'like', '%' . $search . '%');
        });
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
<<<<<<< HEAD
    {
        return 'id';
    }
=======
{
    return 'id';
}
>>>>>>> d0a6326defbeba8c21bdbfff3da64407ba3b31e3
}
