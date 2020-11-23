<?php

use Illuminate\Database\Seeder;
use App\Sponsor;

class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsors = [
            [
                'name' => 'Basic',
                'price' => 2.99 ,
                'hour' => 24
            ],
            [
                'name' => 'Silver',
                'price' => 5.99 ,
                'hour' => 72
            ],
            [
                'name' => 'Gold',
                'price' => 9.99 ,
                'hour' => 144
            ]
        ];

        foreach ($sponsors as $type) {
            $sponsor = new Sponsor;
            $sponsor->name_spons = $type['name'];
            $sponsor->price = $type['price'];
            $sponsor->hour = $type['hour'];
            $sponsor->save();
        }
    }
}
