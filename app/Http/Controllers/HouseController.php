<?php

namespace App\Http\Controllers;

use App\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
        // $houses = House::all();
        // return view("houses.index", compact('houses'));
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function show(House $house)
    {
        //
    }

    public function index()
    {
        return view("houses.index");
    }

    public function search(Request $request)
    {
        $data = $request->all();
        $houses = House::all();

        $houses_filtered = $houses->filter(function ($house) use($data) {
            return $this->distance($data["lat"], $data["lon"], $house->latitude, $house->longitude) < 10000;
        });
        
        return view("houses.search", compact("houses_filtered", "data"));
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
