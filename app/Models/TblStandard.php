<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblStandard extends Model
{
    use HasFactory;
    protected $guarded=['id','standard_id'];
    public function maen_mq1(){
        return $this->hasMany(Mq1::class);
    }
}
