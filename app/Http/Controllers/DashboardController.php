<?php

namespace App\Http\Controllers;

use App\Models\Dataentry;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        return view('dashboard.index',[
            'tittle'=>'Dashboard',
            'Input' => Dataentry::with('user')->filter(request(['fromDate', 'search']))->paginate(30)->withQueryString(),
            'User' => User::all()
            
        ]);
    }
}
