<?php

use Illuminate\Database\Seeder;
use App\House;
use App\Service;

class HousesServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $houses = House::all();

        foreach ($houses as $house) {
            $services = Service::inRandomOrder()->limit(rand(1,10))->get();
            $house->services()->sync($services);
        }
    }
}
