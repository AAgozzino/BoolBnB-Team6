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
                        
                        {{-- <p>{{$house->address}}</p> --}}

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
                    <div>

                        {{-- DIV toggle (si apre il div al click per visualizzare le statistiche) --}}
                        {{-- <h3>STATISTICHE</h3> --}}
                    </div>

                    {{-- Admin-Action --}}
                    <div class="admin-action">
                        <a href="{{route('admin.houses.edit',  $house->slug)}}">Modifica</a>
                        <a href="#">Sponsorizza</a>
                        <p id="open-modal">Elimina</p>

                        {{-- Delete Modal --}}
                        <div id="modal-delete" class="modal">
                            <div class="modal-warp">
                                <span class="modal-close">X</span>
                                <p>Sei sicuro di cancellare questo alloggio?</p>
                                <div class="btn-back modal-close">Annulla</div>
                                <form action="{{route('admin.houses.destroy', $house->slug)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" value="Delete">

                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Box-right --}}
                 <div class="highlight">
                    <p class="show-list-title">Prezzo: <span class="price">{{$house->price}}</span></p> 
                    <div class="message">

                        <form action="{{route("messages.store")}}" class="index_form" method="POST">
                            @csrf
                            @method("POST")

                            <input type="hidden" name="house_id" id="house_id" class="hdn_npt_hid" value="{{$house->id}}">
                            <input type="text" name="email_msg" id="email_msg" placeholder="Inserisci la tua mail">
                            @error('email_msg')
                                <div class="alert alert-danger">{{ 'Inserire una Email' }}</div>
                            @enderror
                            <textarea name="content_msg" id="content_msg" cols="10" rows="10">{{old('content_msg')}}</textarea>
                            @error('content_msg')
                                <div class="alert alert-danger">{{ 'Inserire un contenuto' }}</div>
                            @enderror
                            <button type="submit" class="message-btn">INVIA UN MESSAGGIO</button>
                        </form>
                        
                    </div>
                </div>
            </div>
          </div>
    </div>
@endsection