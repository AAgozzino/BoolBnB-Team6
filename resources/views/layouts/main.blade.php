<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>BoolBnB</title>
        {{-- Link FontAwesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
        {{-- Link Style CSS --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        {{-- Partial Header --}}
        @include('layouts.partials.header')
        @include('layouts.partials.hero')


        {{-- Yield main --}}
        @yield('main-section')

        {{-- Partial Footer --}}
        @include('layouts.partials.admin__footer')
        <script src='{{asset('js/app.js')}}'></script>
    </body>
</html>