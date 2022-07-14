<?php

namespace App\Http\Controllers;

use App\Models\Mastergw;
use App\Models\Codesamplegw;
use Illuminate\Http\Request;

class AuthGroundWaterMSM extends Controller
{
    public function index()
    {
        return view('Auth.GroundWaterMSM.index',[
            'code_units'=>Codesamplegw::all(),
            "tittle"=>"Ground Water MSM",
            'breadcrumb'=>'Ground Water MSM',
            'Master'=>Mastergw::with('user')->latest()->filter(request(['fromDate','search']))->paginate(10)->withQueryString()//with diguanakan untuk mengatasi N+1 problem
            
         ]);
    }
}
