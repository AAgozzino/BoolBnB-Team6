   
    <div class="col-12 col-md-6 col-lg-4">
        <div class="preview">
            <a href="{{route('houses.show', $house->slug)}}" class="preview-link">
                {{-- Box image --}}
                <div class="preview-image-box">
                    <img class="preview-img" src="{{asset('storage/'.$house->cover_img)}}" alt="Card image cap">
                    <div class="sponsored">
                        Sponsorizzato
                        <i class="fas fa-star sponsored-star"></i>
                    </div>
                </div>
                {{-- /Box image --}}

                {{-- Box text --}}
                <div class="preview-banner">
                    <h3 class="preview-banner-title"> {{$house->title}}</h3>
                    <h5 class="preview-banner-subtitle">{{$house->type->type}}</h5>
                </div>
                {{-- /Box text --}}
            </a>
        </div>
    </div>