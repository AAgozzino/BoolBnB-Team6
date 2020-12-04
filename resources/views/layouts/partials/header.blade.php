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
                    <input type="submit" class="index_search_btn" value="INVIA">
                </div>
            </form>

                <!-- Right Side Of Navbar -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav auth_list">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('registrati') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown welcome_list">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle welcome_name" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Benvenuto {{ Auth::user()->name }}!
                            </a>

                            <div class="d_none tend_menu dropdown-menu">
                                <div class="cont_tend_menu dropdown-item">
                                    <a class="your_houses" href="">I TUOI APPARTAMENTI</a>
                                </div>

                                <div class="cont_tend_menu dropdown-item">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle message_link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        MESSAGGI
                                    </a>
                                </div>

                                <div class="dropdown-menu dropdown-menu-right cont_tend_menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endguest
                </ul>
                
                {{-- Hamburger menu --}}
                <div class="hambrg_menu d_none">
                    <i class="fas fa-bars hamb_icon"></i>
                    <ul class="navbar_nav hamb_auth">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('registrati') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle profile_link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user profile_icon"></i>
                                </a>

                                <a id="navbarDropdown" class="nav-link dropdown-toggle message_link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    MESSAGGI
                                </a>
    
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item logout_link" href="{{ route('logout') }}"
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
                </div>
                {{-- Hamburger menu --}}

            </div>
        </div>
    </nav>
</header>