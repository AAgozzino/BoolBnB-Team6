<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            'WiFi' => 'images/service-icons/prova-img.svg',
            'Vista Mare' => 'images/service-icons/prova-img.svg',
            'Balcone' => 'images/service-icons/prova-img.svg',
            'Posto Macchina' => 'images/service-icons/prova-img.svg',
            'Piscina' => 'images/service-icons/prova-img.svg',
            'Portineria' => 'images/service-icons/prova-img.svg',
            'Sauna' => 'images/service-icons/prova-img.svg',
            'Aria Condizionata'=> 'images/service-icons/prova-img.svg',
            'Ascensore'=> 'images/service-icons/prova-img.svg',
            'Cucina'=> 'images/service-icons/prova-img.svg',
            'Colazione'=> 'images/service-icons/prova-img.svg',
            'Pets Friendly'=> 'images/service-icons/prova-img.svg',
            'Zona Lavoro'=> 'images/service-icons/prova-img.svg',
            'TV'=> 'images/service-icons/prova-img.svg',
            'Biancheria'=> 'images/service-icons/prova-img.svg',
            'Griglia Barbeque'=> 'images/service-icons/prova-img.svg',
            'Set Neonati'=> 'images/service-icons/prova-img.svg'
        ];

        foreach ($services as $name => $path) {
            $service = new Service;
            $service->name_serv = $name;
            $service->path_icon = $path;
            $service->save();
        }
    }
}
