@extends('layouts.main')

@section('main-section')
    <div class="container">
        
        <input type="search" id="address-input" placeholder="Where are we going?" />

        raggio ricerca
        <input type="radio" id="30km" name="radius" value="30">
        <label for="30km">30 KM</label>  
        <input type="radio" id="50km" name="radius" value="50">
        <label for="50km">50 KM</label> 
        <input type="radio" id="100km" name="radius" value="100">
        <label for="100km">100 KM</label> 

        @foreach ($houses as $house)
            <div class="card">
                <img class="card-img-top" src="{{asset('storage/'.$house->cover_img)}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$house->title}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$house->type->type}}</h6>
                    <p class="card-text">{{$house->description}}</p>
                    {{-- Bottone per show --}}
                    <a href="{{route('admin.houses.show',  $house->slug)}}" class="btn btn-primary">More</a>
                </div>
            </div>
            
        @endforeach
        
    </div>
@endsection