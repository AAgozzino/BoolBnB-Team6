@extends('layouts.main')

@section('main-section')
<form id="search-advance">
    {{-- address --}}
    <input type="text" name="address" id="address-input" placeholder="Inserisci indirizzo del tuo alloggio" value="{{$data["address"]}}">
    <p>Selected: <strong id="address-value">none</strong></p>
    <input id="latitude" type="hidden" name="lat" value="{{$data["lat"]}}">
    <input id="longitude" type="hidden" name="lon" value="{{$data["lon"]}}">
    {{-- /address --}}
    {{-- <input type="number" placeholder="20" id="radius"> --}}

    {{-- radius --}}
    <input type="radio" name="radius" id="20km" class="radius_radio" value="20" checked>
    <label for="radius">20KM</label>
    <input type="radio" name="radius" id="50km" class="radius_radio" value="50">
    <label for="radius">50KM</label>
    <input type="radio" name="radius" id="100km" class="radius_radio" value="100">
    <label for="radius">100KM</label>
    {{-- /radius --}}

    {{-- services --}}
    <div class="form-group">
        @foreach ($services as $service)
            <input type="checkbox" id="{{$service->id}}" name="service_id" value="{{$service->id}}">
            <label for="{{$service->name_serv}}">{{$service->name_serv}}</label>
        @endforeach
    </div>
    {{-- /services --}}

    {{-- guests --}}
    <label for="guests">Numero ospiti</label>
    <div class="form-group">
        <input type="number" name="guests" id="guests" min="1" max="100" value="">
    </div>
    {{-- /guests --}}

    {{-- Rooms --}}
    <div class="form-group">
        <label for="rooms">Numero di stanze</label>
        <input type="number" id="rooms" name="rooms" min="1" max="20" value="">
    </div>
    {{-- /Rooms --}}

    {{-- Bedrooms --}}
    <div class="form-group">
        <label for="bedrooms">Numero di camere da letto</label>
        <input type="number" id="bedrooms" name="bedrooms" min="1" max="20" value="">
    </div>
    {{-- /Bedrooms --}}
    
    {{-- Beds --}}
    <div class="form-group">
        <label for="beds">Numero di letti</label>
        <input type="number" id="beds" name="beds" min="1" max="20" value="">
    </div>
    {{-- /Beds --}}

    {{-- Price --}}
    <div class="form-group">
        <label for="price">Prezzo</label>
        <input type="range" id="price" name="price" min="1" max="999" step="0.01">
    </div>
    {{-- /Price --}}

    <input type="submit" value="Invia">
</form>

<div class="container" id="houses-list">

</div>

 <script id="houses-template" type="text/x-handlebars-template">
        <div class="card">
           <img class="card-img-top" src="/storage/@{{cover_img}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">@{{title}}</h5>
                                    
                <p class="card-text">@{{description}}</p>
                <a href="houses/@{{slug}}" class="btn btn-primary">More</a>
                
            </div>
        </div>        
</script>

@foreach ($houses_filtered as $item)
    <p>{{ $item->title }}</p>
@endforeach

@endsection 