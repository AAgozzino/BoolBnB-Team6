<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\House;
use App\Type;
use App\Http\Controllers\Controller;

class HouseController extends Controller
{
    // public function ajaxRequest()

    // {
    //     $houses = House::all();
    //     return response()->json($houses);

    // }
    public function ajaxRequest(Request $request)
    {
        $data = $request->all();    

        $houses = House::all();

        $houses_filtered = $houses->filter(function ($house) use($data) {
            return $this->distance($data["lat"], $data["lon"], $house->latitude, $house->longitude) < 10000;
        });

        return response()->json(["response" => array_values($houses_filtered->toArray())]);
    }

    private function distance($lat1, $lon1, $lat2, $lon2) 
    {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
          return 0;
        }
        else {
          $theta = $lon1 - $lon2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
      
          return ($miles * 1.609344);
        }
      }
}
