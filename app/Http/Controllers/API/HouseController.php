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
        $lat = $request->('latitudine');
        $long = $request->('longitudine');
        $houses = House::where('latitude' == $lat && 'longitude' == $long);

        return response()->json($houses);
    }
}
