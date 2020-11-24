<?php

namespace App\Http\Controllers\Admin;

use App\House;
use App\Service;
use App\User;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $houses = House::all();
        return view('admin.index', compact('houses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'guests' => 'required',
            'address' => 'required',
            // 'latitude' => 'required',    CONTROLLO
            // 'longitude' => 'required',   CONTROLLO
            'bedrooms' => 'required',
            'beds' => 'required',
            'bathrooms' => 'required',
            'mq' => 'required',
            'price' => 'required',
            'service_id' => 'required',
            // 'slug' => 'required',    CONTROLLO
            'description' => 'required',
            'image' => 'image'
        ]);
        
        $id = Auth::id();
        $og_file_img = $data['image']->getClientOriginalName();
        $path = Storage::disk('public')->putFileAs("image/$id", $data['image'], $og_file_img);

        $newHouse = new House;
        $newHouse->user_id = Auth::id();
        $newHouse->title = $data['title'];
        $newHouse->type = $data['type'];
        $newHouse->guests = $data['guests'];
        $newHouse->address = $data['address'];
        // $newHouse->latitude = $data['latitude'];     CONTROLLO
        // $newHouse->longitude = $data['longitude'];   CONTROLLO
        $newHouse->bedrooms = $data['bedrooms'];
        $newHouse->beds = $data['beds'];
        $newHouse->bathrooms = $data['bathrooms'];
        $newHouse->mq = $data['mq'];
        $newHouse->price = $data['price'];
        $newHouse->service_id = $data['service_id'];
        $newHouse->content = $data['content'];
        // $newHouse->slug = $data['slug'];
        $newHouse->description = $data['description'];
        $newHouse->image = $path;
        $newHouse->save();

        if (count($data['service_id']) > 0) {
            $newHouse->service_id()->sync($data['service_id']);
        }

        return redirect()->route('admin.show', $newHouse->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $house = House::where('slug', $slug)->first();
        return view('admin.show', compact('house'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $house = House::where('slug', $slug)->first();
        return view('admin.update', compact('house'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $data = $request->all();
        $request->validate([
            'type' => 'required',
            'guests' => 'required',
            'address' => 'required',
            // 'latitude' => 'required',    CONTROLLO
            // 'longitude' => 'required',   CONTROLLO
            'bedrooms' => 'required',
            'beds' => 'required',
            'bathrooms' => 'required',
            'mq' => 'required',
            'price' => 'required',
            'service_id' => 'required',
            // 'slug' => 'required',    CONTROLLO
            'description' => 'required',
            'image' => 'image'
        ]);

        $house = House::where('slug', $slug)->first();
        $house->update($data);
        return redirect()->route('admin.index', compact('house'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $house = House::where('slug', $slug)->first();
        $house->delete();
        return redirect()->route('admin.index');
    }
}
