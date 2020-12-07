@extends('layouts.main')

@section('main-section')
    <div class="container">        
        <div class="show">
            <div><h5 class="show-title">{{$house->title}}</h5></div>
            <h6 class="house-type">{{$house->type->type}} a {{$house->address}}</h6>
            <div class="show-img"><img src="{{asset('storage/'.$house->cover_img)}}" alt="Card image cap"></div>
            <ul class="show-subinfo">
                <li>Ospiti: {{$house->guests}}</li>
                <li>Camere da letto: {{$house->bedrooms}}</li>
                <li>Bagni: {{$house->bathrooms}}</li>
                <li>mq: {{$house->mq}}</li>
            </ul>

            {{-- Info House --}}
            <div class="show-info">
               <div class="show-house">
                    <div class="show-description show-box">
                        <ul>
                            <li class="show-list-title">Descrizione</li>
                            <li class="show-list-description"><p>{{$house->description}}</p></li>
                        </ul>
                    </div>
                        

                    {{-- Recap house --}}
                    <div class="show-box">    
                        <h5 class="show-list-title">Riepilogo alloggio</h5>
                        <ul class="recap">
                            <li><strong>Ospiti:</strong> {{$house->guests}}</li>
                            <li><strong>Stanze:</strong> {{$house->rooms}}</li>
                            <li><strong>Camere da letto:</strong> {{$house->bedrooms}}</li>
                            <li><strong>Letti:</strong> {{$house->beds}}</li>
                            <li><strong>Bagni:</strong> {{$house->bathrooms}}</li>
                            <li><strong>Mq:</strong> {{$house->mq}}</li>
                        </ul>
                    </div>

                    {{-- Service List --}}
                    <div class="show-box">
                            <h5 class="show-list-title">Servizi aggiuntivi</h5>                        
                        <ul class="show-services">
                            @foreach ($house->services as $service)
                                <li><span><img class="service-icon" src="{{asset($service->path_icon)}}" alt="Icona {{$service->name_serv}}"></span>{{$service->name_serv}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- Box-right --}}
                 <div class="highlight">
                    <p class="show-list-title">Prezzo: <span class="price">{{$house->price}}</span></p> 
                    <div class="message">
                        <h4>Contatta l'host</h4>
                        <button class="message-btn">INVIA UN MESSAGGIO</button>
                    </div>
                </div>
            </div>
          </div>
    </div>
@endsection