@extends('layouts.main')

@section('main-section')
    <div class="container create_hs_cstm">

        <div class="btn_back_lnk">
            <a class="btn_back create_ndx_btn" href="{{route('admin.houses.index')}}">Indietro</a>
        </div>

        <form action="{{route('admin.houses.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            {{-- Title --}}
            <div class="form-group row form_div_mb">
                <label for="title" class="col-md-6 col-form-label text-md-right">Inserisci il titolo</label>
                <div class="col-md-8">
                    <input type="text" name="title" class="form-control txt_input_cr" id="title" placeholder="Inserisci titolo del tuo alloggio" value="{{old('title')}}">
                </div>
            </div>
            {{-- /Title --}}

            {{-- House Type --}}
            <div class="form-group row form_div_mb">
                <label for="type_id" class="col-md-6 col-form-label text-md-right">Tipologia di alloggio</label>
                <small class="form-text text-muted">Scegli la tipologia di alloggio</small>
                <select name="type_id" id="type_id">
                    @foreach ($types as $type)
                        <option value="{{old($type->type)}}">
                            <h3>{{$type->type}}</h3>
                            <p>{{$type->descr_type}}</p>
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- /House Type --}}

            {{-- Guests number --}}
            <div class="form-group row form_div_mb">
                <label for="guests" class="col-md-6 col-form-label text-md-right">Numero di ospiti</label>
                <div class="col-md-8">
                    <input type="number" id="guests" name="guests" min="1" max="100" value="{{old('guests')}}" placeholder="Seleziona il numero di ospiti">
                </div>
            </div>
            {{-- /Guests number --}}

            {{-- Address --}}
            <div class="form-group row form_div_mb">
                <label for="address" class="col-md-6 col-form-label text-md-right">Indirizzo</label>
                <div class="col-md-8">
                    <input type="text" name="address" id="address-input" placeholder="Inserisci indirizzo del tuo alloggio" value="{{old('address')}}">
                </div>
            </div>
            {{-- /Address --}}

            {{-- Latitudine Longitudine --}}
            <div class="form-group row form_div_mb">
                {{-- <label for="latitude">Latitude</label> --}}
                <input type="hidden" name="latitude" id="latitude" step="0.000001" placeholder="Latitudine" value="{{old('latitude')}}">
            </div>
            <div class="form-group row form_div_mb">
                {{-- <label for="longitude">Longitude</label> --}}
                <input type="hidden" name="longitude" id="longitude" step="0.000001" placeholder="Longitudine" value="{{old('longitude')}}">
            </div>
            {{-- /Latitude Longitudine --}}

            {{-- Rooms --}}
            <div class="form-group row form_div_mb">
                <label for="rooms" class="col-md-6 col-form-label text-md-right">Numero di stanze</label>
                <div class="col-md-8">
                    <input type="number" id="rooms" name="rooms" min="1" max="20" value="{{old('rooms')}}" placeholder="Seleziona il numero di stanze">
                </div>
            </div>
            {{-- /Rooms --}}

            {{-- Bedrooms --}}
            <div class="form-group row form_div_mb">
                <label for="bedrooms" class="col-md-6 col-form-label text-md-right">Numero di camere da letto</label>
                <div class="col-md-8">
                    <input type="number" id="bedrooms" name="bedrooms" min="1" max="20" value="{{old('bedrooms')}}" placeholder="Seleziona il numero di camere da letto">
                </div>
            </div>
            {{-- /Bedrooms --}}
            
            {{-- Beds --}}
            <div class="form-group row form_div_mb">
                <label for="beds" class="col-md-6 col-form-label text-md-right">Numero di letti</label>
                <div class="col-md-8">
                    <input type="number" id="beds" name="beds" min="1" max="20" value="{{old('beds')}}" placeholder="Seleziona il numero di letti">
                </div>
            </div>
            {{-- /Beds --}}

            {{-- Bathrooms --}}
            <div class="form-group row form_div_mb">
                <label for="bathrooms" class="col-md-6 col-form-label text-md-right">Numero di bagni</label>
                <div class="col-md-8">
                    <input type="number" id="bathrooms" name="bathrooms" min="1" max="20" value="{{old('bathrooms')}}" placeholder="Seleziona il numero di bagni">
                </div>
            </div>
            {{-- /Bathrooms --}}

            {{-- Square feet --}}
            <div class="form-group row form_div_mb">
                <label for="mq" class="col-md-6 col-form-label text-md-right">Metri quadrati</label>
                <div class="col-md-8">
                    <input type="number" id="mq" name="mq" min="1" value="{{old('mq')}}" placeholder="Seleziona i metri quadrati">
                </div>
            </div>
            {{-- /Square feet --}}

            {{-- Price --}}
            <div class="form-group row form_div_mb">
                <label for="price" class="col-md-6 col-form-label text-md-right">Prezzo</label>
                <div class="col-md-8">
                    <input type="number" id="price" name="price" min="1" max="999" step="0.01" value="{{old('price')}}" placeholder="Seleziona il prezzo per il tuo alloggio">
                </div>
            </div>
            {{-- /Price --}}

            {{-- Services --}}
            <div class="form-group form_div_mb">
                @foreach ($services as $service)
                    <input type="checkbox" id="{{$service->id}}" name="service_id[]" value="{{old($service->id)}}">
                    <label for="{{$service->name_serv}}" class="col-md-6 col-form-label text-md-right">{{$service->name_serv}}</label>
                @endforeach
            </div>
            {{-- /Services --}}

            {{-- Slug --}}
            <div class="form-group row form_div_mb">
                {{-- <label for="slug">Slug</label> --}}
                <input type="hidden" name="slug" id="slug" data-id="{{$user_id}}" placeholder="Inserisci lo slug" value="">
            </div>
            {{-- /Slug --}}

            {{-- Decrizione --}}
            <div class="form-group row form_div_mb">
                <label for="description" class="col-md-6 col-form-label text-md-right">Inserisci descrizione</label>
                <div class="col-md-8">
                    <textarea name="description" class="form-control" id="description" name="description" cols="30" rows="10" maxlength="500"> {{old('description')}}</textarea>
                </div>
            </div>
            {{-- /Descrizione --}}
            
            {{-- Cover image --}}
            <div class="form-group row form_div_mb">
                <label for="cover_img" class="col-md-6 col-form-label text-md-right">Inserisci immagine di copertina</label>
                <div class="col-md-8">
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