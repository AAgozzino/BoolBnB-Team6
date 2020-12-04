@extends('layouts.main')

@section('main-section')
    <div class="container">        
        <div class="show">
            <div><h5 class="show-title">{{$house->title}}</h5></div>
            <h6 class="house-type">{{$house->type->type}} a {{$house->address}}</h6>
            <img class="show-img" src="{{asset('storage/'.$house->cover_img)}}" alt="Card image cap">
            <div class="show-description show-box">
                <ul>
                    <li class="show-list-title">Descrizione</li>
                    <li class="show-list-description"><p>{{$house->description}}</p></li>
                </ul>

                
                {{-- <p>{{$house->address}}</p> --}}
                <p><strong>Prezzo:</strong> {{$house->price}}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Ospiti:</strong> {{$house->guests}}</li>
                <li class="list-group-item"><strong>Stanze:</strong> {{$house->rooms}}</li>
                <li class="list-group-item"><strong>Camere da letto:</strong> {{$house->bedrooms}}</li>
                <li class="list-group-item"><strong>Letti:</strong> {{$house->beds}}</li>
                <li class="list-group-item"><strong>Bagni:</strong> {{$house->bathrooms}}</li>
                <li class="list-group-item"><strong>Mq:</strong> {{$house->mq}}</li>
            </ul>
            <div class="card-header">
                Servizi aggiuntivi
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($house->services as $service)
                    <li class="list-group-item">{{$service->name_serv}} <span><img src="{{asset($service->path_icon)}}" alt="Icona {{$service->name_serv}}"></span></li>
                @endforeach
            </ul>
            <div>
                {{-- DIV toggle (si apre il div al click per visualizzare le statistiche) --}}
                <h3>STATISTICHE</h3>
            </div>
            <div class="card-body">
                <a href="{{route('admin.houses.edit',  $house->slug)}}" class="card-link">Modifica</a>
                <a href="#" class="card-link">Sponsorizza</a>
                <form action="{{route('admin.houses.destroy', $house->slug)}}" method="POST">
                    @csrf
                    @method('DELETE')

                    <input type="submit" value="Delete">

                </form>
            </div>
          </div>
    </div>
@endsection