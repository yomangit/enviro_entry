<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use App\Models\ResumeTahunan;

class AuthResumeTahunanController extends Controller
{
    public function index(){
        $avg_l1= ResumeTahunan::with('user')->latest()->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString()->avg('l1');
        $avg_l2= ResumeTahunan::with('user')->latest()->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString()->avg('l2');
        $avg_l3= ResumeTahunan::with('user')->latest()->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString()->avg('l3');
        $avg_l4= ResumeTahunan::with('user')->latest()->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString()->avg('l4');
        $avg_l5= ResumeTahunan::with('user')->latest()->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString()->avg('l5');
        $avg_l6= ResumeTahunan::with('user')->latest()->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString()->avg('l6');
        $avg_l7= ResumeTahunan::with('user')->latest()->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString()->avg('l7');
        $avg_ls= ResumeTahunan::with('user')->latest()->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString()->avg('ls');
        $avg_lm= ResumeTahunan::with('user')->latest()->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString()->avg('lm');
        $avg_lsm= ResumeTahunan::with('user')->latest()->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString()->avg('lsm');
        $Resume=ResumeTahunan::with('user')->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString();
        $l1=[];
        $l2=[];
        $l3=[];
        $l4=[];
        $l5=[];
        $l6=[];
        $l7=[];
        $ls=[];
        $lm=[];
        $lsm=[];
        $date=[];
        $location=[];
        $std_pemukiman=[];
        $std_industri=[];
      
        foreach ($Resume as $item ) {
            $date[]=date('M-Y', strtotime( $item->date));
            $l1[]=doubleVal($item->l1);
            $l2[]=doubleval($item->l2);
            $l3[]=doubleval($item->l3);
            $l4[]=doubleval($item->l4);
            $l5[]=doubleval($item->l5);
            $l6[]=doubleval($item->l6);
            $l7[]=doubleval($item->l7);
            $ls[]=doubleval($item->ls);
            $lm[]=doubleval($item->lm);
            $lsm[]=doubleval($item->lsm );
            $location[]=$item->location;
            $std_industri[]=70;
            $std_pemukiman[]=55;
        }
        return view('Auth.Noise.ResumeTahunan.index',[

            "tittle" => "Annual Resume",
            'breadcrumb' => 'Annual Resume',
            'l1'=>$l1,
            'l2'=>$l2,
            'l3'=>$l3,
            'l4'=>$l4,
            'l5'=>$l5,
            'l6'=>$l6,
            'l7'=>$l7,
            'ls'=>$ls,
            'lm'=>$lm,
            'lsm'=>$lsm,
            'date'=>$date,
            'location'=>$location,
            'avg_l1'=>doubleval($avg_l1),
            'avg_l2'=>doubleval($avg_l2),
            'avg_l3'=>doubleval($avg_l3),
            'avg_l4'=>doubleval($avg_l4),
            'avg_l5'=>doubleval($avg_l5),
            'avg_l6'=>doubleval($avg_l6),
            'avg_l7'=>doubleval($avg_l7),
            'avg_ls'=>doubleval($avg_ls),
            'avg_lm'=>doubleval($avg_lm),
            'avg_lsm'=>doubleval($avg_lsm),
            'code_location'=>Lokasi::all(),
            'pemukiman'=>$std_pemukiman,
            'industri'=>$std_industri,
            'ResumeTahunan' => ResumeTahunan::with('user')->filter(request(['fromDate','search','location']))->paginate(12)->withQueryString() //with diguanakan untuk mengatasi N+1 problem

        ]);
    }
}
