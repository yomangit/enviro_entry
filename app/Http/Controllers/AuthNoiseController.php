<?php

namespace App\Http\Controllers;

use App\Models\Noise;
use App\Models\Lokasi;
use App\Models\Codesamplenm;
use Illuminate\Http\Request;

class AuthNoiseController extends Controller
{
    public function index()
    {
        return view('Auth.Noise.index', [
            "tittle" => "Noise Meter",
            'code_sample'=>Codesamplenm::all(),
            'code_location'=>Lokasi::all(),
            'breadcrumb' => 'Noise Meter',
            'Codes'=>Noise::with('user')->latest()->filter(request(['fromDate','search','location']))->paginate(7)->withQueryString()//with diguanakan untuk mengatasi N+1 problem
            

        ]);
    }
}
