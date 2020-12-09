<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\House;
use App\Service;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class HouseController extends Controller
{
    public function ajaxRequest(Request $request)
    {
        $data = $request->all();
        $guests = $data['guests'];
        $rooms = $data['rooms'];
        $bedrooms = $data['bedrooms'];
        $beds = $data['beds'];
        $price = $data['price'];
        
        if (isset($data['services'])) {
          $services = $data['services']; 
        } else{
          $services = false;
        };
        
  
        $services_houses = Service::all();

        $houses = House::where('price', '<=', $price)
                ->when($rooms, function($query, $rooms){
                  return $query->where('rooms', '>=', $rooms);
                })
                ->when($bedrooms, function($query, $bedrooms){
                  return $query->where('bedrooms', '>=', $bedrooms);
                })
                ->when($beds, function($query, $beds){
                  return $query->where('beds', '>=', $beds);
                })
                ->when($guests, function($query, $guests){
                  return $query->where('guests', '>=', $guests);
                })
                ->when($services, function($query, $services){
                  return $query->whereHas('services', function($q) use($services){
                      $q->where('service_id', $services);
                      });
                })
                ->get();
  
        $houses_filtered = $houses->filter(function ($house) use($data) {
          return $this->distance($data['lat'], $data['lon'], $house->latitude, $house->longitude) < $data['radius'];
        });

        return response()->json(['response' => array_values($houses_filtered->toArray())]);
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
// $houses = House::where('guests', '>=', $data['guests'])
        //           ->where('rooms', '>=', $data['rooms'])
        //           ->where('bedrooms', '>=', $data['bedrooms'])
        //           ->where('beds', '>=', $data['beds'])
        //           ->where('price', '<=', $data['price'])
                  // ->whereHas('services', function($query) use($data) {
                  //   $query->where('service_id', $data['services']);
                  // })
                  // ->get();
       