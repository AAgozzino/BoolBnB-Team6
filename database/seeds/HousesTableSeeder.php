<?php

use Illuminate\Database\Seeder;
use App\House;
use Faker\Generator as Faker;

class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 2; $i++) {
            $newHouse = new House;
            $newHouse->email = $faker->freeEmail();
             
        }
    }
}
