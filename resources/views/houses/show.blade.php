@extends('layouts.main')

@section('main-section')
    <div class="container">        
        <div class="show row">
            <div class="col-12">
                <div><h5 class="show-title">{{$house->title}}</h5></div>
                <h6 class="house-type">{{$house->type->type}} a {{$house->address}}</h6>
                <div class="show-img"><img src="{{asset('storage/'.$house->cover_img)}}" alt="Card image cap"></div>
                <ul class="show-subinfo">
                    <li>Ospiti: {{$house->guests}}</li>
                    <li>Camere da letto: {{$house->bedrooms}}</li>
                    <li>Bagni: {{$house->bathrooms}}</li>
                    <li>mq: {{$house->mq}}</li>
                </ul>
            </div>

            {{-- Info House --}}
            <div class="col-12">
                <div class="row">
                    <div class="show-info">
                        <div class="show-house col-12 col-md-8 col-lg-8">
                                <div class="show-description show-box">
                                    <ul>
                                        <li class="show-list-title">Descrizione</li>
                                        <li class="show-list-description"><p>{{$house->description}}</p></li>
                                    </ul>
                                </div>

                                {{-- Recap house --}}
                                <div class="show-box">    
                                    <h5 class="show-list-title">Riepilogo alloggio</h5>
                                    <ul class="recap row">
                                        <li class="col-5"><strong>Ospiti:</strong> {{$house->guests}}</li>
                                        <li class="col-5"><strong>Stanze:</strong> {{$house->rooms}}</li>
                                        <li class="col-5"><strong>Camere da letto:</strong> {{$house->bedrooms}}</li>
                                        <li class="col-5"><strong>Letti:</strong> {{$house->beds}}</li>
                                        <li class="col-5"><strong>Bagni:</strong> {{$house->bathrooms}}</li>
                                        <li class="col-5"><strong>Mq:</strong> {{$house->mq}}</li>
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
                            

                            {{-- Box-right --}}
                            <div class="highlight col-12 col-md-4 col-lg-4">
                                <p class="show-list-title">Prezzo: <span class="price">{{$house->price}}€</span></p> 
                                <div class="message">
                                    <h4>Contatta l'host</h4>
                                    <button class="message-btn">INVIA UN MESSAGGIO</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection