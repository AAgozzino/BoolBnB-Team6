<header>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container d_flex cont_flex">

            <!-- Left Side Of Navbar -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{-- {{ config('app.name', 'Laravel') }} --}}
                <img src="{{asset('images/boolbnb-logo.png')}}" alt="Boolbnb logo">
            </a>

            <!-- Central Side Of Navbar / Input Search -->
            <form action="{{route("houses.search")}}" class="index_form" method="POST">
                @csrf
                @method("POST")

                <div class="add_input_search">
                    <input type="text" name="address" id="address-input" placeholder="Dove vuoi andare?" value="{{old('address')}}">
                    <input id="latitude" type="hidden" name="lat" value="">
                    <input id="longitude" type="hidden" name="lon" value="">
                    <input type="submit" class="index_search_btn" value="Invia">
                </div>
            </form>

                <!-- Right Side Of Navbar -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
                <button class="navbar-toggler d_none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>
</header>