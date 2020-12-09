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
                        <li>appartamento di {{$house->user->name}}</li>
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
                        </div>
                        {{-- Box-right --}}
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="highlight"> 
                                <p class="show-list-title">Prezzo: <span class="price">{{$house->price}}€</span></p> 
                                <div class="message">
                                    <h4>Contatta l'host</h4>
                                    <div class="index_search_btn snd_msg_dv">INVIA UN MESSAGGIO</div>

                                        <div id="modal-send_msg" class="modale">
                                            <div class="modal-wrap">                                                                            
                                                <div class="modal-content">
                                                    <i class="fas fa-times-circle modal-close"></i>
                                                    <div class="d_flex">
                
                                                        <form action="{{route("messages.store")}}" class="index_form d_flex" method="POST">
                                                            @csrf
                                                            @method("POST")
                                
                                                            <input type="hidden" name="house_id" id="house_id" class="hdn_npt_hid" value="{{$house->id}}">
                                                            <input type="text" name="email_msg" id="email_msg" class="txt_input_cr" placeholder="Inserisci la tua mail">
                                                            @error('email_msg')
                                                                <div class="alert alert-danger">{{ 'Inserire una Email' }}</div>
                                                            @enderror
                                                            <textarea name="content_msg" id="content_msg" class="txt_input_cr" cols="10" rows="10">{{old('content_msg')}}</textarea>
                                                            @error('content_msg')
                                                                <div class="alert alert-danger">{{ 'Inserire un contenuto' }}</div>
                                                            @enderror
                                                            <button type="submit" class="message-btn btn__snd">INVIA</button>
                                                        </form>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
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