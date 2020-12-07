@extends('layouts.main')

@section('main-section')
    <div class="container create_hs_cstm">

        <div class="btn_back_lnk">
            <a class="btn_back" href="{{route('admin.houses.show',  $house->slug)}}">Indietro</a>
        </div>

        <h2>MODIFICA IL TUO ALLOGGIO</h2>

        <form action="{{route('admin.houses.update', $house->slug)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- House Type --}}
            <div class="form-group row form_div_mb select_dv">
                <label for="type_id" class="col-md-12 col-form-label text-md-right">Tipologia di alloggio</label>
                <select name="type_id" id="type_id" value="{{old('type_id') ? old('type_id') : $house->type_id}}">
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
                    <input type="text" name="title" class="form-control txt_input_cr" id="title" placeholder="Inserisci titolo del tuo alloggio" value="{{old('title') ? old('title') : $house->title}}">
                </div>
            </div>
            {{-- /Title --}}

            {{-- Address --}}
            <div class="form-group row form_div_mb">
                <label for="address" class="col-md-6 col-form-label text-md-right">Indirizzo</label>
                <div class="col-md-8">
                    <input type="text" name="address" class="form-control txt_input_cr" id="address-input" placeholder="Inserisci indirizzo del tuo alloggio" value="{{old('address') ?  old('address') : $house->address}}">
                </div>
            </div>
            {{-- /Address --}}

            {{-- Latitudine Longitudine- DA CANCELLARE IN FUTURO --}}
            <div class="form-group">
                {{-- <label for="latitude">Latitudine</label> --}}
                <input type="hidden" name="latitude" id="latitude" placeholder="Latitudine"  step="0.000001" value="{{old('latitude') ?? $house->latitude}}">
            </div>
            <div class="form-group">
                {{-- <label for="longitude">Longitudine</label> --}}
                <input type="hidden" name="longitude" id="longitude" placeholder="Longitudine" step="0.000001" value="{{old('longitude') ?? $house->longitude}}">
            </div>
            {{-- /Latitude Longitudine --}}

            {{-- Guests number --}}
            <div class="form-group row form_div_mb">
                <div class="col-md-4 nmbr_dv">
                    <label for="guests" class="col-md-12 col-form-label text-md-right">Numero di ospiti</label>
                    <div class="col-md-12">
                        <input type="number" id="guests" name="guests" class="nmbr_input_cr" min="1" max="100" value="{{old('guests') ? old('guests') : $house->guests}}">
                    </div>
                </div>
            {{-- /Guests number --}}

                {{-- Rooms --}}
                <div class="col-md-4 nmbr_dv">
                    <label for="rooms" class="col-md-12 col-form-label text-md-right">Numero di stanze</label>
                    <div class="col-md-12">
                        <input type="number" id="rooms" name="rooms" class="nmbr_input_cr" min="1" max="20" value="{{old('bedrooms') ?? $house->rooms}}">
                    </div>
                </div>
            {{-- /Rooms --}}

            {{-- Bedrooms --}}
                <div class="col-md-4 nmbr_dv">
                    <label for="bedrooms" class="col-md-12 col-form-label text-md-right">Numero camere da letto</label>
                    <div class="col-md-12">
                        <input type="number" id="bedrooms" name="bedrooms" class="nmbr_input_cr" min="1" max="20" value="{{old('bedrooms') ?? $house->bedrooms}}">
                    </div>
                </div>
            </div>
            {{-- /Bedrooms --}}
            
            {{-- Beds --}}
            <div class="form-group row form_div_mb">
                <div class="col-md-4 nmbr_dv">
                    <label for="beds" class="col-md-12 col-form-label text-md-right">Numero di letti</label>
                    <div class="col-md-12">
                        <input type="number" id="beds" name="beds" class="nmbr_input_cr" min="1" max="20" value="{{old('beds') ?? $house->beds}}">
                    </div>
                </div>
            {{-- /Beds --}}

            {{-- Bathrooms --}}
                <div class="col-md-4 nmbr_dv">
                    <label for="bathrooms" class="col-md-12 col-form-label text-md-right">Numero di bagni</label>
                    <div class="col-md-12">
                        <input type="number" id="bathrooms" name="bathrooms" class="nmbr_input_cr" min="1" max="20" value="{{old('bathrooms') ?? $house->bathrooms}}">
                    </div>
                </div>
            {{-- /Bathrooms --}}

            {{-- Square feet --}}
                <div class="col-md-4 nmbr_dv">
                    <label for="mq" class="col-md-12 col-form-label text-md-right">Metri quadrati</label>
                    <div class="col-md-12">
                        <input type="number" id="mq" name="mq" class="nmbr_input_cr" min="1" value="{{old('mq') ?? $house->mq}}">
                    </div>
                </div>
            </div>
            {{-- /Square feet --}}

            {{-- Price --}}
            <div class="form-group row form_div_mb">
                <label for="price" class="col-md-12 col-form-label text-md-right">Prezzo</label>
                <div class="col-md-3 nmbr_dv">
                    <input type="number" id="price" name="price" class="nmbr_input_cr price_input" min="1" step="0.01" value="{{old('price') ?? $house->price}}">
                </div>
            </div>
            {{-- /Price --}}

            {{-- Services --}}
            <div class="form-group row form_div_mb serv_list_cnt">
                <h4 class="col-md-12">Servizi</h4>

                @php
                $house_service = [];
                foreach ($house->services as $serv) {
                    $house_service[] = $serv->id;
                }          
                @endphp

                @foreach ($services as $service)
                    <div class="col-md-3 srv_chkbox">
                        <input type="checkbox" id="{{$service->name_serv}}" name="service_id[]" value="{{$service->id}}" {{in_array($service->id, $house_service) ? 'checked' : ' ' }}>
                        <label for="{{$service->name_serv}}" class="col-form-label text-md-right">{{$service->name_serv}}</label>
                    </div>
                @endforeach
            </div>
            {{-- /Services --}}

            {{-- Slug non modificabile dall'utente perchè creato in automatico con js a partire dal titolo (aggiungere readonly alla input) --}}
            <div class="form-group">
                {{-- <label for="slug">Slug</label> --}}
                <input type="hidden"  name="slug" id="slug" placeholder="Inserisci lo slug" value="{{old('slug') ?? $house->slug}}">
            </div>
            {{-- /Slug --}}

            {{-- Decrizione --}}
            <div class="form-group row form_div_mb textar_input">
                <label for="description" class="col-md-8 col-form-label text-md-right">Modifica descrizione</label>
                <div class="col-md-12">
                    <textarea name="description" class="form-control" id="description" name="description" cols="30" rows="10">{{old('description') ? old('description') : $house->description}}</textarea>
                </div>
            </div>
            {{-- /Descrizione --}}

            {{-- Cover image --}}
            <div class="form-group row form_div_mb">

                <label for="cover_img" class="col-md-12 col-form-label text-md-right">Modifica immagine di copertina</label>
                
                @if($house->cover_img)
                    <div class="col-md-6">
                        <img class="img_storage_upd" src="{{asset('storage/'.$house->cover_img)}}" alt="">
                    </div>
                @endif

                {{-- <label for="cover_img" class="col-md-12 col-form-label text-md-right">Modifica immagine di copertina</label> --}}
                <div class="col-md-12 file_img_sd">
                    <input type="file" class="form-control" name="cover_img" id="cover_img" accept="image/*" placeholder="Inserisci un'immagine" value="cover_img">
                </div>
            </div>
            {{-- /Cover image --}}

            <div class="create_btn">
                <button type="submit" class="create_ndx_btn">Modifica</button>
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