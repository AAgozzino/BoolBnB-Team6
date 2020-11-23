<?php

use Illuminate\Database\Seeder;
use App\Image;
use App\House;
use Faker\Generator as Faker;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $randNum = rand(1, 20);
        $path = 'images/testfaker-images/test-'.$randNum.'.jpg';
        // LANCIARE SEEDER
    }
}
