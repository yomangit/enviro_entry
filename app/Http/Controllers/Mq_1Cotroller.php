<?php

namespace App\Http\Controllers;

use App\Models\Mq1;
use Illuminate\Http\Request;

class Mq_1Cotroller extends Controller
{
    public function index()
    {
    //    return Mq1::where('user_id',auth()->user()->id)->get();
        return view('maen.mq1.index',[
            "tittle"=>"MQ1",
            "dataMQ1"=>Mq1::with('standard','user')->latest()->filter(request(['search','user']))->paginate(10)//with diguanakan untuk mengatasi N+1 problem
            
        ]);
    }

}
