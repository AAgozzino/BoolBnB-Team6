<header>
    <div class="container">
        <div class="row">
            {{-- Logo --}}
            <div class="header_logo col-2">
                <img src="#" alt="BoolBnB logo">
            </div>
            {{-- /Logo --}}

            {{-- Header menu --}}
            <div class="header_menu col">
                <div class="menu_nav">
                    <ul class="menu_nav_list">
                        <li class="menu_nav_list_item active">
                            <a href="{{route('admin.houses.index')}}">Appartamenti</a>
                        </li>
                        <li class="menu_nav_list_item">
                            <a href="#">Sponsorizzazioni</a>
                        </li>
                        <li class="menu_nav_list_item">
                            <a href="{{route('admin.houses.create')}}">Aggiungi appartamento</a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- Header menu --}}

            {{-- Authentication --}}
            <div class="header_login col">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
            {{-- /Authentication --}}
        </div>
    </div>
</header>