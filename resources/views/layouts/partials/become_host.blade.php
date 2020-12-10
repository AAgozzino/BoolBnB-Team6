    <div class="wrapper-host"> 
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="b-host">
                        <div id="b-host-img"></div>
                    </div>                    
                </div>
                <div class="col-12 col-md-4">
                    <div id="b-host-text">
                        <div class="text-container">
                            <h2>Diventa un host</h2>
                            <h4>Unisciti alla community di milioni di host nel mondo ed inizia a guadagnare adesso</h4>
                            {{-- <a href=""><div class="index_search_btn">Clicca qui per iniziare</div></a> --}}
                            @guest
                                <a href="{{ route('register') }}"><div class="index_search_btn">Clicca qui per iniziare</div></a>
                            @else
                                <a href="{{route('admin.houses.index')}}"><div class="index_search_btn">Clicca qui per iniziare</div></a>
                            @endguest
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>

