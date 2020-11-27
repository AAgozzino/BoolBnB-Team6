<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BoolBnB</title>
    {{-- Link Style CSS --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    {{-- Partial Header --}}
    @include('layouts.partials.header')
    <main>
        {{-- Yeld main --}}
        @yield('main-section')
    </main>
    {{-- Partial Footer --}}
    @include('layouts.partials.footer')
</body>
</html>