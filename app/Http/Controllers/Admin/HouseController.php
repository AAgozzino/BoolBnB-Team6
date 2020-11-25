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
        $types = Type::all();
        $services = Service::all();
        return view(' admin.create', compact('types', 'services'));
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
            'type_id' => 'required',
            'guests' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'rooms' => 'required',
            'bedrooms' => 'required',
            'beds' => 'required',
            'bathrooms' => 'required',
            'mq' => 'required',
            'price' => 'required',
            'service_id' => 'nullable',
            'slug' => 'required',
            'description' => 'required',
            'cover_img' => 'image'
        ]);
        
        // dd($data);
        $id = Auth::id();
        $og_file_img = $data['cover_img'];
        $path = Storage::disk('public')->put($id, $data['cover_img'], $og_file_img);

        $newHouse = new House;
        $newHouse->user_id = Auth::id();
        $newHouse->title = $data['title'];
        $newHouse->type_id = $data['type_id'];
        $newHouse->guests = $data['guests'];
        $newHouse->address = $data['address'];
        $newHouse->latitude = $data['latitude'];
        $newHouse->longitude = $data['longitude'];
        $newHouse->rooms = $data['rooms'];
        $newHouse->bedrooms = $data['bedrooms'];
        $newHouse->beds = $data['beds'];
        $newHouse->bathrooms = $data['bathrooms'];
        $newHouse->mq = $data['mq'];
        $newHouse->price = $data['price'];
        // $newHouse->service= $data['service'];
        $newHouse->slug = $data['slug'];
        $newHouse->description = $data['description'];
        $newHouse->cover_img = $path;
        $newHouse->save();

        if (count($data['service_id']) > 0) {
            $newHouse->services()->sync($data['service_id']);
            
        }

        return redirect()->route('admin.houses.show', $newHouse->slug);
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
     * @param  \App\Type  $types
     * @param  \App\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
        {
        $house = House::where('slug', $slug)->first();
        $types = Type::all();
        $services = Service::all();

        return view('admin.edit', compact('house', 'types', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\House  $house
     * @param  \App\Type  $types
     * @param  \App\Service  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)

       {

        $data = $request->all();
        $request->validate(
            [
            'title' => 'required',
            'type_id' => 'required',
            'guests' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'rooms' => 'required',
            'bedrooms' => 'required',
            'beds' => 'required',
            'bathrooms' => 'required',
            'mq' => 'required',
            'price' => 'required',
            'service_id' => 'nullable',
            'slug' => 'required',
            'description' => 'required',
            'cover_img' => 'image'
        ]);

        $types = Type::all();
        $services = Service::all();
        $house = House::find($slug);
        $house->update($data);
        return redirect()->route('admin.houses.index', compact('houses'));
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
        return redirect()->route('admin.houses.index');
    }
}
