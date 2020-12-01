

@extends('layouts.main')

@section('main-section')


    <label for="address">Indirizzo</label>
        <input type="text" name="address" id="address-input" placeholder="Inserisci indirizzo del tuo alloggio" value="{{old('address')}}">
        <p>Selected: <strong id="address-value">none</strong></p>
        <input type="number" placeholder="20" id="radius">
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

@endsection 

 
{{-- <h6 class="card-subtitle mb-2 text-muted">{{$house->type->type}}</h6> --}}
