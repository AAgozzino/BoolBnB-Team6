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
   
}
