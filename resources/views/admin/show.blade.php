@extends('layouts.main')

@section('main-section')
    <div class="container">        
        <div class="show row">
            <div class="col-12">
                {{-- Title --}}
                <div><h5 class="show-title">{{$house->title}}</h5></div>
                {{-- Address --}}
                <h6 class="house-type">{{$house->type->type}} a {{$house->address}}</h6>
                {{-- Latitude&Longitude --}}
                <div id="house-lat" data-lat="{{$house->latitude}}"></div>
                <div id="house-lon" data-lon="{{$house->longitude}}"></div>
                {{-- Image --}}
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
                                        <li><span><img class="service-icon" src="{{asset($service->path_icon)}}" alt="Icona {{$service->name_serv}}"></span><span>{{$service->name_serv}}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                            {{-- <div> --}}

                                {{-- DIV toggle (si apre il div al click per visualizzare le statistiche) --}}
                                {{-- <h3>STATISTICHE</h3> --}}
                            {{-- </div> --}}

                                {{-- Admin-Action --}}
                            <div class="admin-action">
                                <a href="{{route('admin.houses.edit',  $house->slug)}}">Modifica</a>
                                <a href="#">Sponsorizza</a>
                                <p id="open-modal">Elimina</p>

                                {{-- Delete Modal --}}
                                <div id="modal-delete" class="modale">
                                    <div class="modal-wrap">                                                                            
                                        <div class="modal-content">
                                            <i class="fas fa-times-circle modal-close"></i>
                                            <h4>Sei sicuro di cancellare questo alloggio?</h4>
                                            <div class="d_flex">
                                                <span class="btn-back modal-close">Annulla</span>
                                                {{-- Delete Button --}}
                                                <form action="{{route('admin.houses.destroy', $house->slug)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input id="delete-action" type="submit" value="Elimina">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        {{-- Box-right --}}
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="highlight"> 
                                <p class="show-list-title">Prezzo: <span class="price">{{$house->price}}€</span></p> 
                                <div class="message">
                                    <h4>Contatta l'host</h4>
                                    <button class="index_search_btn">INVIA UN MESSAGGIO</button>
                                </div>
                            </div> 
                            {{-- Map --}}
                            <div id="map-show">
                                <div id="mapid"></div>
                            </div>                                           
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection