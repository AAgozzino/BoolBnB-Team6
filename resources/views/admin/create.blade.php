@extends('layouts.main')

@section('main-section')
    <div class="container create_hs_cstm">

        <div class="btn_back_lnk">
            <a class="btn_back" href="{{route('admin.houses.index')}}">Indietro</a>
        </div>

        <h2>CREA IL TUO APPARTAMENTO</h2>
        {{-- @dd($types) --}}
        <form action="{{route('admin.houses.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            
            {{-- House Type --}}
            <div class="form-group row form_div_mb select_dv">
                <label for="type_id" class="col-md-12 col-form-label text-md-right">Tipologia di alloggio</label>
                <select name="type_id" id="type_id">
                    @foreach ($types as $type)
                        <option value="{{$type->id}}">
                            {{$type->type}}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- /House Type --}}

            {{-- Title --}}
            <div class="form-group row form_div_mb">
                <label for="title" class="col-md-6 col-form-label text-md-right">Inserisci il titolo</label>
                <div class="col-md-8">
                    <input type="text" name="title" class="form-control txt_input_cr" id="title" placeholder="Inserisci titolo del tuo alloggio" value="{{old('title')}}">
                </div>
            </div>
            {{-- /Title --}}

            {{-- Address --}}
            <div class="form-group row form_div_mb">
                <label for="address" class="col-md-6 col-form-label text-md-right">Indirizzo</label>
                <div class="col-md-8">
                    <input type="text" name="address" class="form-control txt_input_cr" id="address-input" placeholder="Inserisci indirizzo del tuo alloggio" value="{{old('address')}}">
                    <p class="d_none">Selected: <strong id="address-value">none</strong></p>
                </div>
            </div>
            {{-- /Address --}}

            {{-- Latitudine Longitudine --}}
            <div class="form-group row">
                {{-- <label for="latitude">Latitude</label> --}}
                <input type="hidden" name="latitude" id="latitude" step="0.000001" placeholder="Latitudine" value="{{old('latitude')}}">
            </div>
            <div class="form-group row">
                {{-- <label for="longitude">Longitude</label> --}}
                <input type="hidden" name="longitude" id="longitude" step="0.000001" placeholder="Longitudine" value="{{old('longitude')}}">
            </div>
            {{-- /Latitude Longitudine --}}

            {{-- Guests number --}}
            <div class="form-group row form_div_mb">
                <div class="col-md-4 nmbr_dv">
                    <label for="guests" class="col-md-12 col-form-label text-md-right">Numero di ospiti</label>
                    <div class="col-md-12">
                        <input type="number" id="guests" name="guests" class="nmbr_input_cr" min="1" max="100" value="{{old('guests')}}" placeholder="Seleziona il numero di ospiti">
                    </div>
                </div>
            {{-- /Guests number --}}

            {{-- Rooms --}}
                <div class="col-md-4 nmbr_dv">
                    <label for="rooms" class="col-md-12 col-form-label text-md-right">Numero di stanze</label>
                    <div class="col-md-12">
                        <input type="number" id="rooms" name="rooms" class="nmbr_input_cr" min="1" max="20" value="{{old('rooms')}}" placeholder="Seleziona numero di stanze">
                    </div>
                </div>
            {{-- /Rooms --}}

            {{-- Bedrooms --}}
                <div class="col-md-4 nmbr_dv">
                    <label for="bedrooms" class="col-md-12 col-form-label text-md-right">Numero camere da letto</label>
                    <div class="col-md-12">
                        <input type="number" id="bedrooms" name="bedrooms" class="nmbr_input_cr" min="1" max="20" value="{{old('bedrooms')}}" placeholder="Seleziona numero camere da letto">
                    </div>
                </div>
            </div>
            {{-- /Bedrooms --}}
            
            {{-- Beds --}}
            <div class="form-group row form_div_mb">
                <div class="col-md-4 nmbr_dv">
                    <label for="beds" class="col-md-12 col-form-label text-md-right">Numero di letti</label>
                    <div class="col-md-12">
                        <input type="number" id="beds" name="beds" class="nmbr_input_cr" min="1" max="20" value="{{old('beds')}}" placeholder="Seleziona numero di letti">
                    </div>
                </div>
            {{-- /Beds --}}

            {{-- Bathrooms --}}
                <div class="col-md-4 nmbr_dv">
                    <label for="bathrooms" class="col-md-12 col-form-label text-md-right">Numero di bagni</label>
                    <div class="col-md-12">
                        <input type="number" id="bathrooms" name="bathrooms" class="nmbr_input_cr" min="1" max="20" value="{{old('bathrooms')}}" placeholder="Seleziona numero di bagni">
                    </div>
                </div>
            {{-- /Bathrooms --}}

            {{-- Square feet --}}
                <div class="col-md-4 nmbr_dv">
                    <label for="mq" class="col-md-12 col-form-label text-md-right">Metri quadrati</label>
                    <div class="col-md-12">
                        <input type="number" id="mq" name="mq" class="nmbr_input_cr" min="1" value="{{old('mq')}}" placeholder="Seleziona i metri quadrati">
                    </div>
                </div>
            </div>
            {{-- /Square feet --}}

            {{-- Price --}}
            <div class="form-group row form_div_mb">
                <label for="price" class="col-md-12 col-form-label text-md-right">Prezzo</label>
                <div class="col-md-3 nmbr_dv">
                    <input type="number" id="price" name="price" class="nmbr_input_cr price_input" min="1" max="999" step="0.01" value="{{old('price')}}" placeholder="Seleziona prezzo per il tuo alloggio">
                </div>
            </div>
            {{-- /Price --}}

            {{-- Services --}}
            <div class="form-group row form_div_mb serv_list_cnt">
                <h4 class="col-md-12">Servizi</h4>
                @foreach ($services as $service)
                    <div class="col-md-3 srv_chkbox">
                        <input type="checkbox" id="{{$service->id}}" name="service_id[]" value="{{$service->id}}">
                        <label for="{{$service->name_serv}}" class="col-form-label text-md-right">{{$service->name_serv}}</label>
                    </div>
                @endforeach
            </div>
            {{-- /Services --}}

            {{-- Slug --}}
            <div class="form-group form_div_mb">
                {{-- <label for="slug">Slug</label> --}}
                <input type="hidden" name="slug" id="slug" data-id="{{$user_id}}" placeholder="Inserisci lo slug" value="">
            </div>
            {{-- /Slug --}}

            {{-- Decrizione --}}
            <div class="form-group row form_div_mb textar_input">
                <label for="description" class="col-md-8 col-form-label text-md-right">Inserisci descrizione</label>
                <div class="col-md-12">
                    <textarea name="description" class="form-control" id="description" name="description" cols="30" rows="10" maxlength="500"> {{old('description')}}</textarea>
                </div>
            </div>
            {{-- /Descrizione --}}
            
            {{-- Cover image --}}
            <div class="form-group row form_div_mb">
                <label for="cover_img" class="col-md-6 col-form-label text-md-right">Inserisci immagine di copertina</label>
                <div class="col-md-8 file_img_sd">
                    <input type="file" name="cover_img" id="cover_img" accept="image/*" placeholder="Inserisci immagine" value="{{old('cover_img')}}">
                </div>
            </div>
            {{-- /Cover image --}}

            <div class="create_btn">
                <button type="submit" class="create_ndx_btn">Crea</button>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </form>
    </div>
@endsection