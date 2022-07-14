<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dataentry;
use Illuminate\Http\Request;

class DashboardAuthController extends Controller
{
    public function index(){

        return view('Auth.dashboard',[
            'tittle'=>'Dashboard',
            'Input' => Dataentry::with('user')->filter(request(['fromDate', 'search']))->paginate(30)->withQueryString(),
            'User' => User::all()
            
        ]);
    }
}
