@extends('layouts.main')

@section('main-section')

    <form action="{{route("houses.search")}}" method="POST">
        @csrf
        @method("POST")

        <input type="text" name="address" id="address-input" placeholder="Inserisci indirizzo del tuo alloggio" value="{{old('address')}}">
        <p>Hai cercato: <strong id="address-value"></strong></p>

        <input id="latitude" type="hidden" name="lat" value="">
        <input id="longitude" type="hidden" name="lon" value="">
        <input type="submit" value="Invia">
    </form>

@endsection
