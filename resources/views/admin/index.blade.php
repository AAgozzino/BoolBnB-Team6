@extends('layouts.main')

@section('main-section')
    <div class="container">
        <input type="search" id="address-input" placeholder="Where are we going?" />
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