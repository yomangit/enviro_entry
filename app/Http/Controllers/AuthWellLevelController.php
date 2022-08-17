<?php

namespace App\Http\Controllers;

use App\Models\Mastergw;
use App\Models\Codesamplegw;
use Illuminate\Http\Request;

class AuthWellLevelController extends Controller
{
    public function index()
    {
        
        return view('Auth.GroundWaterWellLevel.index',[
            "tittle"=>"Code Unit",
            'code_units'=>Codesamplegw::all(),
            'breadcrumb'=>'Ground Well Level',
      'Codes'=>Mastergw::with('user')->latest()->filter(request(['fromDate','search']))->paginate(20)->withQueryString()//with diguanakan untuk mengatasi N+1 problem

         ]);
    }
}
