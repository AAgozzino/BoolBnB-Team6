@extends('layouts.main')

@section('main-section')
    <div class="container">        
        <div class="card">
            <img class="card-img-top" src="{{asset('storage/'.$house->cover_img)}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$house->title}}</h5>
                {{-- Controllare i due type uguali(nome tabella e colonna) r10 --}}
                <h6 class="card-subtitle mb-2 text-muted">{{$house->type->type}}</h6>
                <p class="card-text">{{$house->description}}</p>
                <p>{{$house->address}}</p>
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