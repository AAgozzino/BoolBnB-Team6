@extends('layouts.main')

@section('main-section')
{{-- CONTROLLARE NOMI ROTTE --}}
<form action="{{route('houses.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    {{-- House Type --}}
    <div class="form-group">
        <label for="type">Tipologia di alloggio</label>
        <small class="form-text text-muted">Scegli la tipologia di alloggio.</small>
        <select name="type" id="type">
            @foreach ($types as $type)
            <option value="{{$type->id}} {{old('type_id')}}"> {{--Controllare old--}}
                    <h3>{{$type->type}}</h3>
                    <p>{{$type->descr_type}}</p>
                </option>
            @endforeach
        </select>
    </div>
    {{-- /House Type --}}

    {{-- Guests number --}}
    <div class="form-group">
        <label for="guests">Numero di ospiti</label>
        <small class="form-text text-muted">Seleziona il numero di ospiti.</small>
        <input type="number" id="guests" name="guests" min="1" max="100" value="{{old('guests')}}">
    </div>
    {{-- /Guests number --}}

    {{-- Address --}}
    <div class="form-group">
        <label for="address">Indirizzo</label>
        <input type="address" id="address" placeholder="Inserisci indirizzo del tuo alloggio" value="{{old('address')}}">
    </div>
    {{-- /Address --}}

    {{-- Latitudine Longitudine- DA CANCELLARE IN FUTURO --}}
    <div class="form-group">
        <label for="latitude">Indirizzo</label>
        <input type="latitude" id="latitude" placeholder="Latitudine" value="{{old('latitude')}}">
    </div>
    <div class="form-group">
        <label for="longitude">Indirizzo</label>
        <input type="longitude" id="longitude" placeholder="Longitudine" value="{{old('longitude')}}">
    </div>
    {{-- /Latitude Longitudine --}}

    {{-- Bedrooms --}}
    <div class="form-group">
        <label for="bedrooms">Numero di camere da letto</label>
        <small class="form-text text-muted">Seleziona il numero di camere da letto.</small>
        <input type="number" id="bedrooms" name="bedrooms" min="1" max="20" value="{{old('bedrooms')}}">
    </div>
    {{-- /Bedrooms --}}
    
    {{-- Beds --}}
    <div class="form-group">
        <label for="beds">Numero di letti</label>
        <small class="form-text text-muted">Seleziona il numero di letti.</small>
        <input type="number" id="beds" name="beds" min="1" max="20" value="{{old('beds')}}">
    </div>
    {{-- /Beds --}}

    {{-- Bathrooms --}}
    <div class="form-group">
        <label for="bathrooms">Numero di bagni</label>
        <small class="form-text text-muted">Seleziona il numero di bagni.</small>
        <input type="number" id="bathrooms" name="bathrooms" min="1" max="20" value="{{old('bathrooms')}}">
    </div>
    {{-- /Bathrooms --}}

    {{-- Square feet --}}
    <div class="form-group">
        <label for="mq">Metri quadrati</label>
        <small class="form-text text-muted">Seleziona i metri quadrati</small>
        <input type="number" id="mq" name="mq" min="1" value="{{old('mp')}}">
    </div>
    {{-- /Square feet --}}

    {{-- Price --}}
    <div class="form-group">
        <label for="price">Prezzo</label>
        <small class="form-text text-muted">Seleziona il prezzo per il tuo alloggio</small>
        <input type="number" id="price" name="price" min="1" step="0.01" value="{{old('price')}}">
    </div>
    {{-- /Price --}}

    {{-- Services --}}
    <div class="form-group">
        @foreach ($services as $service)
            <input type="checkbox" id="{{$services->name_serv}}" name="services[]" value="{{$services->id}} {{old('service_id')}}"> {{--Controllare old--}}
            <label for="{{$services->name_serv}}">{{$services->path_icon}}</label>
        @endforeach
    </div>
    {{-- /Services --}}

    {{-- Slug non modificabile dall'utente perchè creato in automatico con js a partire dal titolo (aggiungere readonly alla input) --}}
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="slug" id="slug" placeholder="Inserisci lo slug" value="{{old('slug')}}">
    </div>
    {{-- /Slug --}}

    {{-- Decrizione --}}
    <div class="form-group">
        <label for="description">Inserisci descrizione</label>
         <textarea name="description" class="form-control" id="description" name="description" cols="30" rows="10"> {{old('description')}}</textarea>
    </div>
    {{-- /Descrizione --}}
    
    {{-- Cover image --}}
    <div class="form-group">
        <label for="cover_image">Inserisci immagine di copertina</label>
        <input type="file" name="cover_image" id="cover_image" accept="image/*" placeholder="Inserisci immagine" value="{{old('cover_image')}}">
    </div>
    {{-- /Cover image --}}

    <button type="submit" class="btn btn-primary">Submit</button>

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
@endsection