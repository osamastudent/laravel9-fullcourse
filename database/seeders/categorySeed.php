<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\category;
use GuzzleHttp\Promise\Create;

class categorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
       
        for($a=1; $a<=5; $a++){
            $obj=new category();
        $obj->name=$faker->name;
        $obj->save();
        }
        

    }
}
