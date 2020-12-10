@extends('layouts.main')

@section('main-section')
    <div class="container">
        <h2 class="h2-title">I tuoi alloggi</h2>
        <div class="row">
            {{-- Render Houses from db using card preview --}}
            @foreach ($houses as $house)
                @include('layouts.partials.admin__card')
            @endforeach
        </div>
    </div>
    @include('layouts.partials.add_house')
@endsection