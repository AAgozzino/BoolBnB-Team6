<?php

use Illuminate\Database\Seeder;
use App\House;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 5; $i++) {
            $user = User::inRandomOrder()->first();

            $newHouse = new House;
            $newHouse->latitude = $faker->latitude();  //CHIEDERE
            $newHouse->longitude = $faker->longitude();  //CHIEDERE
            $newHouse->address = $faker->streetAddress();  //CHIEDERE
            $newHouse->description = $faker->paragraph(5, true);
            $newHouse->title = $faker->sentence(5, true);
            $newHouse->rooms = $faker->randomDigitNotNull();
            $newHouse->guests = $faker->randomDigitNotNull();
            $newHouse->bedrooms = $faker->numberBetween(1, 5);
            $newHouse->beds = $faker->randomDigitNotNull();
            $newHouse->bathrooms = $faker->numberBetween(1, 5);
            $newHouse->bathrooms = $faker->numberBetween(1, 5);
            $newHouse->mq = $faker->numberBetween(20, 300);
            $newHouse->price = $faker->randomFloat(2, 30, 1000);
            $newHouse->visible = 1;
            $newHouse->slug = Str::of($newHouse->title)->slug('-').$i;
            $newHouse->cover_img = 'images/images.jpeg';
            $newHouse->save();
        }

        // LANCIARE SEEDER
    }
}
