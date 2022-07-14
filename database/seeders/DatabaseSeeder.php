<?php

namespace Database\Seeders;

use App\Models\Codesample;
use App\Models\Mq1;
use App\Models\TblStandard;
use App\Models\Toka;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Wq3;
use App\Models\Wq4;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        TblStandard::create([

           'tss'         =>'50.0',
           'ph_max'      =>'9.0',
           'ph_min'      =>'6.0',
           'do'          =>'4.0',
           'redox'       =>'No std',
           'conductivity'=>'No std',
           'tds'         =>'1000',
           'temperatur'  =>'No std'
        ]);
        User::create([
            'name'=>'yoman banea',
            'username'=>'yomanbanea',
            'email'=>'yomandenis@gmail.com',
            'password'=>bcrypt('123'),
            'is_admin'=>'1'
        ]);
     
       
    }
}
