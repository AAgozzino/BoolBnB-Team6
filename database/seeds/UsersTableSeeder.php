<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 30; $i++) {
            $newUser = new User;
            $newUser->email = $faker->freeEmail();
            $newUser->password = Hash::make($faker->password());
            $newUser->name = $faker->firstName();
            $newUser->surname = $faker->lastName();
            $newUser->date_of_birth = $faker->dateTime('2002-12-31');
            $newUser->save(); 
        }
    }
}
