<?php

namespace App\Http\Controllers;

use App\Models\Masterttn;
use Illuminate\Http\Request;
use App\Models\Codesamplettn;

class AuthGroundWaterTTN extends Controller
{
    public function index()
    {
     
        return view('auth.GroundWaterTTN.index',[
            'code_units'=>Codesamplettn::all(),
            "tittle"=>"Ground Water",
            'breadcrumb'=>'Ground Water TTN',
            'Master'=>Masterttn::with('user')->latest()->filter(request(['fromDate','search']))->paginate(10)->withQueryString()//with diguanakan untuk mengatasi N+1 problem
            
         ]);
    }
}
