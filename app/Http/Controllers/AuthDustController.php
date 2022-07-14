<?php

namespace App\Http\Controllers;

use App\Models\Dust;
use App\Models\Codesampledg;
use Illuminate\Http\Request;

class AuthDustController extends Controller
{
    public function index()
    {
        
        return view('Auth.Dust.index',[
            "tittle"=>"Dust Gauge",
            'code_units'=>Codesampledg::all(),
            'breadcrumb'=>'Dust Gauge',
            'Dust'=>Dust::with('user')->latest()->filter(request(['fromDate','search']))->paginate(10)->withQueryString()]);
    }
}
