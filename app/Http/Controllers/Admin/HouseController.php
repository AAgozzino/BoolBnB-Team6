<?php

namespace App\Http\Controllers\Admin;

use App\House;
use App\Service;
use App\User;
use App\Type;
use App\View;
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
        $user_id = Auth::id();
        $houses = House::where('user_id', $user_id)->get();
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
        $user_id = Auth::id();
        $services = Service::all();
        return view(' admin.create', compact('types', 'services', 'user_id'));
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
            'slug' => 'required|unique:houses',
            'description' => 'required',
            'cover_img' => 'image'
        ]);

        if (isset($data['cover_img'])) {
            $id = Auth::id();
            $og_file_img = $data['cover_img'];
            $path = Storage::disk('public')->put($id, $data['cover_img'], $og_file_img);
        } else {
            $path = 'images/default-img.png';
        }

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
        $views = View::where('house_id', $house->id)->increment('ip_session', 1);

        // dd($views);
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
        $house = House::where('slug', $slug)->first();

        
        if (isset($data['cover_img'])) {
            $id = Auth::id();
            $og_file_img = $data['cover_img'];
            $path = Storage::disk('public')->put($id, $data['cover_img'], $og_file_img);
        } else {
            $path = $house->cover_img;
        }
        
        
        $house->user_id = Auth::id();
        $house->title = $data['title'];
        $house->type_id = $data['type_id'];
        $house->guests = $data['guests'];
        $house->address = $data['address'];
        $house->latitude = $data['latitude'];
        $house->longitude = $data['longitude'];
        $house->rooms = $data['rooms'];
        $house->bedrooms = $data['bedrooms'];
        $house->beds = $data['beds'];
        $house->bathrooms = $data['bathrooms'];
        $house->mq = $data['mq'];
        $house->price = $data['price'];
        // $house->service_id= $data['service_id'];
        $house->slug = $data['slug'];
        $house->description = $data['description'];
        $house->cover_img = $path;

        $house->update();

        if (count($data['service_id']) > 0) {
            $house->services()->sync($data['service_id']);
        }
        

        return redirect()->route('admin.houses.index', $house);
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
        $house->services()->detach();
        $house->delete();
        return redirect()->route('admin.houses.index');
    }

}

