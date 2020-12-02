@extends('layouts.main')

@section('main-section')
<form id="search-advance">
    <input type="text" name="address" id="address-input" placeholder="Inserisci indirizzo del tuo alloggio" value="{{$data["address"]}}">
    <p>Selected: <strong id="address-value">none</strong></p>
    <input id="latitude" type="hidden" name="lat" value="{{$data["lat"]}}">
    <input id="longitude" type="hidden" name="lon" value="{{$data["lon"]}}">
    {{-- <input type="number" placeholder="20" id="radius"> --}}

    <input type="hidden" name="ciao" value="ciao">

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