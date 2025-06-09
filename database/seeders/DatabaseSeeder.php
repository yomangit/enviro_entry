<?php

namespace Database\Seeders;

use App\Models\Codesample;
use App\Models\GroundWaterStandard;
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

        User::create([
            'name'=>'yoman banea',
            'username'=>'yomanbanea',
            'email'=>'yomandenis@gmail.com',
            'password'=>bcrypt('123'),
            'is_admin'=>'1'
        ]);
       
       
    }
}
