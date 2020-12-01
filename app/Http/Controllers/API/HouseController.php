<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\House;
use App\Type;
use App\Http\Controllers\Controller;

class HouseController extends Controller
{
    public function ajaxRequest()

    {
        $houses = House::all();
        return response()->json($houses);

    }

    public function search(Request $request)

    {
        $coordinate = json_decode($request);
        $lat1 = $coordinate->latitudine;
        $lon1 = $coordinate->longitudine;
        
        
        $houses = House::all();

        $resoults = [];


        foreach ($houses as $house) {
            $lat2 = $house->latitude;
            $lon2 = $house->longitude;

            $distance = distance($lat1, $lon1, $lat2, $lon2, "K");

            if ($distance < 20){
                $resoults[] = $house;
            }
            
        };


         function distance($lat1, $lon1, $lat2, $lon2, $unit) {
            if (($lat1 == $lat2) && ($lon1 == $lon2)) {
                return 0;
            }
            else {
                $theta = $lon1 - $lon2;
                $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                $dist = acos($dist);
                $dist = rad2deg($dist);
                $miles = $dist * 60 * 1.1515;
                $unit = strtoupper($unit);

                if ($unit == "K") {
                return ($miles * 1.609344);
                } 
            }
         }

        // echo distance(32.9697, -96.80322, 29.46786, -98.53506, "M") . " Miles<br>";
        // echo distance(32.9697, -96.80322, 29.46786, -98.53506, "K") . " Kilometers<br>";
        // echo distance(32.9697, -96.80322, 29.46786, -98.53506, "N") . " Nautical Miles<br>";
         dd($resoults);

        return view('houses.search');
        // return response()->json($resoults);
    }
}
