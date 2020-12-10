@extends('layouts.main')

@section('main-section')
    <div class="container">
        <h2>I nostri alloggi in evidenza</h2>
        <div class="row">
            {{-- Render Houses from db using card preview --}}
            @foreach ($houses as $house)
                @include('layouts.partials.card_preview')
            @endforeach
        </div>
    </div>

    {{-- Become a Host section --}}
    @include('layouts.partials.become_host')
@endsection


