<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CodeHydrometric extends Model
{
    public $table = "code_hydrometrics";
    use HasFactory;
    protected $guarded = ['id'];


    public function scopefilter($query, array $filters)
    {
        $query->when($filters['fromDate'] ?? false, function ($query) {
            return $query->whereBetween('date', array(request('fromDate'), request('toDate')));
        });

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return  $query->where('nama', 'like', '%' . $search . '%')
                ->orWhere('lokasi', 'like', '%' . $search . '%');
        });
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
