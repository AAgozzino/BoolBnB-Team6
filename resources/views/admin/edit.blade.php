@extends('layouts.main')

@section('main-section')
{{-- CONTROLLARE NOMI ROTTE --}}
<form action="{{route('admin.houses.update', $house->slug)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

        {{-- Title --}}
    <div class="form-group">
        <label for="title">Inserisci il titolo</label>
        <input type="text" name="title" id="title" placeholder="Inserisci titolo del tuo alloggio" value="{{old('title') ? old('title') : $house->title}}">
    </div>
    {{-- /Title --}}

    {{-- House Type --}}
    <div class="form-group">
        <label for="type_id">Tipologia di alloggio</label>
        <small class="form-text text-muted">Scegli la tipologia di alloggio.</small>
        <select name="type_id" id="type_id" value="{{old('type_id') ? old('type_id') : $house->type_id}}">
            @foreach ($types as $type)
                <option value="{{$type->id}}">
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
        <input type="number" id="guests" name="guests" min="1" max="100" value="{{old('guests') ? old('guests') : $house->guests}}">
    </div>
    {{-- /Guests number --}}

    {{-- Address --}}
    <div class="form-group">
        <label for="address">Indirizzo</label>
        <input type="text" name="address" id="address-input" placeholder="Inserisci indirizzo del tuo alloggio" value="{{old('address') ?  old('address') : $house->address}}">
    </div>
    {{-- /Address --}}

    {{-- Latitudine Longitudine- DA CANCELLARE IN FUTURO --}}
    <div class="form-group">
        <label for="latitude">Latitudine</label>
        <input type="hidden" name="latitude" id="latitude" placeholder="Latitudine"  step="0.000001" value="{{old('latitude') ?? $house->latitude}}">
    </div>
    <div class="form-group">
        <label for="longitude">Longitudine</label>
        <input type="hidden" name="longitude" id="longitude" placeholder="Longitudine" step="0.000001" value="{{old('longitude') ?? $house->longitude}}">
    </div>
    {{-- /Latitude Longitudine --}}

        {{-- Rooms --}}
    <div class="form-group">
        <label for="rooms">Numero di stanze</label>
        <small class="form-text text-muted">Seleziona il numero di camere da letto.</small>
        <input type="number" id="rooms" name="rooms" min="1" max="20" value="{{old('bedrooms') ?? $house->rooms}}">
    </div>
    {{-- /Rooms --}}

    {{-- Bedrooms --}}
    <div class="form-group">
        <label for="bedrooms">Numero di camere da letto</label>
        <small class="form-text text-muted">Seleziona il numero di camere da letto.</small>
        <input type="number" id="bedrooms" name="bedrooms" min="1" max="20" value="{{old('bedrooms') ?? $house->bedrooms}}">
    </div>
    {{-- /Bedrooms --}}
    
    {{-- Beds --}}
    <div class="form-group">
        <label for="beds">Numero di letti</label>
        <small class="form-text text-muted">Seleziona il numero di letti.</small>
        <input type="number" id="beds" name="beds" min="1" max="20" value="{{old('beds') ?? $house->beds}}">
    </div>
    {{-- /Beds --}}

    {{-- Bathrooms --}}
    <div class="form-group">
        <label for="bathrooms">Numero di bagni</label>
        <small class="form-text text-muted">Seleziona il numero di bagni.</small>
        <input type="number" id="bathrooms" name="bathrooms" min="1" max="20" value="{{old('bathrooms') ?? $house->bathrooms}}">
    </div>
    {{-- /Bathrooms --}}

    {{-- Square feet --}}
    <div class="form-group">
        <label for="mq">Metri quadrati</label>
        <small class="form-text text-muted">Seleziona i metri quadrati</small>
        <input type="number" id="mq" name="mq" min="1" value="{{old('mq') ?? $house->mq}}">
    </div>
    {{-- /Square feet --}}

    {{-- Price --}}
    <div class="form-group">
        <label for="price">Prezzo</label>
        <small class="form-text text-muted">Seleziona il prezzo per il tuo alloggio</small>
        <input type="number" id="price" name="price" min="1" step="0.01" value="{{old('price') ?? $house->price}}">
    </div>
    {{-- /Price --}}

    {{-- Services --}}
    <div class="form-group">
        @php
        $house_service = [];
        foreach ($house->services as $serv) {
            $house_service[] = $serv->id;
        }          
        @endphp

        @foreach ($services as $service)

            <input type="checkbox" id="{{$service->name_serv}}" name="service_id[]" value="{{$service->id}}" {{in_array($service->id, $house_service) ? 'checked' : ' ' }}>
            <label for="{{$service->name_serv}}">{{$service->name_serv}} {{$service->path_icon}}</label>     
        @endforeach
    </div>
    {{-- /Services --}}

    {{-- Slug non modificabile dall'utente perchè creato in automatico con js a partire dal titolo (aggiungere readonly alla input) --}}
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="hidden"  name="slug" id="slug" placeholder="Inserisci lo slug" value="{{old('slug') ?? $house->slug}}">
    </div>
    {{-- /Slug --}}

    {{-- Decrizione --}}
    <div class="form-group">
        <label for="description">Inserisci descrizione</label>
         <textarea name="description" class="form-control" id="description" name="description" cols="30" rows="10">{{old('description') ? old('description') : $house->description}}</textarea>
    </div>
    {{-- /Descrizione --}}

    {{-- Cover image --}}
    <div class="form-group">
        @if($house->cover_img)
            <div>
                <img src="{{asset('storage/'.$house->cover_img)}}" alt="">
            </div>
        @endif
        <label for="cover_img">Inserisci immagine di copertina</label>
        <input type="file" class="form-control" name="cover_img" id="cover_img" accept="image/*" placeholder="Inserisci un'immagine" value="cover_img">
    </div>
    {{-- /Cover image --}}

    <button type="submit" class="btn btn-primary">Submit</button>
    {{-- @dd($house) --}}

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