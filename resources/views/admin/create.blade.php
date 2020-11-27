@extends('layouts.main')

@section('main-section')
<div class="container">
    {{-- CONTROLLARE NOMI ROTTE --}}
    <form action="{{route('admin.houses.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        {{-- Title --}}
        <div class="form-group">
            <label for="title">Inserisci il titolo</label>
            <input type="text" name="title" id="title" placeholder="Inserisci titolo del tuo alloggio" value="">
        </div>
        {{-- /Title --}}

        {{-- House Type --}}
        <div class="form-group">
            <label for="type_id">Tipologia di alloggio</label>
            <small class="form-text text-muted">Scegli la tipologia di alloggio.</small>
            <select name="type_id" id="type_id">
                @foreach ($types as $type)
                    <option value="{{$type->id}}"> {{--Controllare old--}}
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
            <input type="text" name="address" id="address" placeholder="Inserisci indirizzo del tuo alloggio" value="{{old('address')}}">
        </div>
        {{-- /Address --}}

        {{-- Latitudine Longitudine- DA CANCELLARE IN FUTURO --}}
        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="number" name="latitude" id="latitude" step="0.000001" placeholder="Latitudine" value="{{old('latitude')}}">
        </div>
        <div class="form-group">
            <label for="longitude">Longitude</label>
            <input type="number" name="longitude" id="longitude" step="0.000001" placeholder="Longitudine" value="{{old('longitude')}}">
        </div>
        {{-- /Latitude Longitudine --}}

        {{-- Rooms --}}
        <div class="form-group">
            <label for="rooms">Numero di stanze</label>
            <small class="form-text text-muted">Seleziona il numero di camere da letto.</small>
            <input type="number" id="rooms" name="rooms" min="1" max="20" value="{{old('rooms')}}">
        </div>
        {{-- /Rooms --}}

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
            <input type="number" id="price" name="price" min="1" max="999" step="0.01" value="{{old('price')}}">
        </div>
        {{-- /Price --}}

        {{-- Services --}}
        <div class="form-group">
            @foreach ($services as $service)
                <input type="checkbox" id="{{$service->id}}" name="service_id[]" value="{{$service->id}}"> {{--Controllare old--}}
                <label for="{{$service->name_serv}}">{{$service->path_icon}}</label>
            @endforeach
        </div>
        {{-- /Services --}}

        {{-- Slug non modificabile dall'utente perchè creato in automatico con js a partire dal titolo (aggiungere readonly alla input) --}}
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" placeholder="Inserisci lo slug" value="">
        </div>
        {{-- /Slug --}}

        {{-- Decrizione --}}
        <div class="form-group">
            <label for="description">Inserisci descrizione</label>
            <textarea name="description" class="form-control" id="description" name="description" cols="30" rows="10" maxlength="500"> {{old('description')}}</textarea>
        </div>
        {{-- /Descrizione --}}
        
        {{-- Cover image --}}
        <div class="form-group">
            <label for="cover_img">Inserisci immagine di copertina</label>
            <input type="file" name="cover_img" id="cover_img" accept="image/*" placeholder="Inserisci immagine" value="{{old('cover_img')}}">
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
</div>    
@endsection