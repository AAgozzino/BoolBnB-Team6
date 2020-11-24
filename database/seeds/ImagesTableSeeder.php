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
        $houses = House::all();

        foreach ($houses as $house) {
            $image = new Image;
            $image->house_id = $house->id;
            $image->path_img = 'images/images.jpeg';
            $image->descr_img = $faker->sentence(2);
            $image->save();
        }
    }
}
