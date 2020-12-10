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

            {{-- radius --}}
            <input type="radio" name="radius" id="20km" class="radius_radio" value="20" checked>
            <label for="radius">20KM</label>
            <input type="radio" name="radius" id="50km" class="radius_radio" value="50">
            <label for="radius">50KM</label>
            <input type="radio" name="radius" id="100km" class="radius_radio" value="100">
            <label for="radius">100KM</label>
            {{-- /radius --}}
            
            <div class="form-group row form_div_mb">
                {{-- guests --}}
                <div class="col-md-4 nmbr_dv">
                    <label for="guests" class="col-md-12 col-form-label text-md-right">Numero ospiti</label>
                    <div class="col-md-12">
                        <input type="number" name="guests" id="guests" class="nmbr_input_cr" min="1" max="100" value="">
                    </div>
                </div> 
                {{-- /guests --}}

                {{-- Rooms --}}
                <div class="col-md-4 nmbr_dv">            
                    <label for="rooms" class="col-md-12 col-form-label text-md-right">Numero di stanze</label>
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
                    <label for="beds" class="col-md-12 col-form-label text-md-right">Numero di letti</label>
                    <div class="col-md-12">
                        <input type="number" id="beds" name="beds" class="nmbr_input_cr" min="1" max="20" value="">
                    </div>
                </div>    
                {{-- /Beds --}}
            </div>

            {{-- services --}}
            <div class="form-group row form_div_mb serv_list_cnt">
                <h4 class="col-md-12">Servizi</h4>
                @foreach ($services as $service)
                    <div class="col-md-3 srv_chkbox">
                        <input type="checkbox" id="{{$service->id}}" name="service_id" value="{{$service->id}}">
                        <label for="{{$service->name_serv}}" class="col-form-label text-md-right">{{$service->name_serv}}</label>
                    </div>
                @endforeach
            </div>
            {{-- /services --}}

            {{-- Price --}}
            <div class="form-group">
                <label for="price">Prezzo</label>
                <input type="range" id="price" name="price" min="1" max="999" step="0.01">
            </div>
            {{-- /Price --}}

            <div class="create_btn">
                <button type="submit" class="create_ndx_btn">Cerca</button>
            </div>
        </form>
    </div>

    {{-- <div id="map-instantsearch-container" style="height: 300px; width:300px"></div> --}}
    
    <div class="container" id="houses-list">
        @foreach ($houses_filtered as $house)
            @include('layouts.partials.card_preview')
        @endforeach
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