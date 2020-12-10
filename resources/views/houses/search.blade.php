@extends('layouts.main')

@section('main-section')
    <div class="container create_hs_cstm">
        <h2>Appartamenti ricercati</h2>
        <form id="search-advance">
        
            {{-- address --}}
            <div class="form-group row form_div_mb">
                <div class="col-md-8">
                    <input id="latitude" type="hidden" name="lat" value="{{$data["lat"]}}">
                    <input id="longitude" type="hidden" name="lon" value="{{$data["lon"]}}">
                    <input type="text" class="txt_input_cr" name="address" id="address-input" placeholder="Inserisci indirizzo del tuo alloggio" value="{{$data["address"]}}">
                    <p class="d_none">Selected: <strong id="address-value">none</strong></p>
                </div>
            </div>
            {{-- /address --}}

            <div class="form-group row form_div_mb">
                {{-- radius --}}
                <div class="col-md-5">
                    <input type="radio" name="radius" id="20km" class="radius_radio" value="20" checked>
                    <label for="radius">20KM</label>
                    <input type="radio" name="radius" id="50km" class="radius_radio" value="50">
                    <label for="radius">50KM</label>
                    <input type="radio" name="radius" id="100km" class="radius_radio" value="100">
                    <label for="radius">100KM</label>
                </div>
                {{-- /radius --}}
                
                {{-- Price --}}
                <div class="col-md-5 d_flex">
                    <label for="price">Prezzo</label>
                    <div class="range-slider">
                        <input type="range" class="range-slider__range" id="price" name="price" min="1" max="999" step="0.50" value="500">
                        <span class="range-slider__value">0</span>
                    </div>  
                </div>
                {{-- /Price --}}
            </div>

            
            {{-- guests --}}
            <div class="form-group row form_div_mb">
                <div class="col-md-4 nmbr_dv">
                    <label for="guests" class="col-md-12 col-form-label text-md-right">Numero ospiti</label>
                    <div class="col-md-12">
                        <input type="number" name="guests" id="guests" class="nmbr_input_cr" min="1" max="100" value="">
                    </div>
                </div> 
                {{-- /guests --}}

                {{-- Rooms --}}
                <div class="col-md-4 nmbr_dv">            
                    <label for="rooms" class="col-md-12 col-form-label text-md-right">Numero stanze</label>
                    <div class="col-md-12">
                        <input type="number" id="rooms" name="rooms" class="nmbr_input_cr" min="1" max="20" value="">
                    </div>
                </div>    
                {{-- /Rooms --}}

                {{-- Bedrooms --}}
                <div class="col-md-4 nmbr_dv">
                    <label for="bedrooms" class="col-md-12 col-form-label text-md-right">Numero camere da letto</label>
                    <div class="col-md-12">
                        <input type="number" id="bedrooms" name="bedrooms" class="nmbr_input_cr" min="1" max="20" value="">
                    </div>
                </div>    
                {{-- /Bedrooms --}}
            
                {{-- Beds --}}
                <div class="col-md-4 nmbr_dv">
                    <label for="beds" class="col-md-12 col-form-label text-md-right">Numero letti</label>
                    <div class="col-md-12">
                        <input type="number" id="beds" name="beds" class="nmbr_input_cr" min="1" max="20" value="">
                    </div>
                </div>    
                {{-- /Beds --}}
            </div>

            {{-- services --}}
            <div class="form-group row form_div_mb serv_list_cnt">
                <h4 class="col-md-12" id="services-title">Servizi <i class="fas fa-angle-down"></i></h4>
                <div id="services-container" class="col-12">
                    <div class="row">
                        @foreach ($services as $service)
                            <div class="col-md-4 col-lg-3 srv_chkbox">
                                <input type="checkbox" id="{{$service->id}}" name="service_id" value="{{$service->id}}">
                                <label for="{{$service->name_serv}}" class="col-form-label text-md-right">{{$service->name_serv}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- /services --}}

            <div class="create_btn">
                <button type="submit" class="create_ndx_btn">Cerca</button>
            </div>
                {{-- <input type="submit" value="Invia"> --}}
        </form>
    </div>
    
    <div class="container" id="houses-list">
        @foreach ($houses_filtered as $house)
            @include('layouts.partials.card_preview_search')
        @endforeach
    </div>

    {{-- HANDLEBARS TEMPLATE SEARCH --}}
    <script id="houses-template" type="text/x-handlebars-template">
        <div class="row">
            <div class="col-12">
                <div class="preview-search">
                    <a href="@{{{slug}}}">
                        
                        <div class="image-box">
                            <img class="preview-img" src="/storage/@{{{cover_img}}}" alt="Card image cap">
                            <div class="sponsored">
                                Sponsorizzato
                                <i class="fas fa-star sponsored-star"></i>
                            </div>
                        </div>
                        
                        <div class="search-info">
                            <div class="search-info-head">
                                <div class="address">@{{address}}</div>
                                <div class="title">@{{title}}</div>
                            </div>
                            <div class="search-info-body">
                                <ul class="rooms-info">
                                    <li>@{guests}} ospiti</li>
                                    <li>@{{rooms}} stanze</li>
                                    <li>@{{bedrooms}} camere</li>
                                    <li>@{{bathrooms}} bagni</li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </script>
    {{-- /HANDLEBARS TEMPLATE --}}

    {{-- HANDLEBARS TEMPLATE NOT FOUND --}}
    <script id="notfound-template" type="text/x-handlebars-template">
        <h2 class="search-empty">Nessun alloggio disponibile</h2>
    </script>
    {{-- /HANDLEBARS TEMPLATE NOT FOUND --}}
@endsection 