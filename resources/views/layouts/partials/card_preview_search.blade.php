<div class="col-12">
    <a href="{{route('houses.show', $house->slug)}}" class="preview-search-link row">
        <div class="preview-search col-12">
            <div class="row">
                {{-- Box image --}}
                <div class="col-12 col-md-5 col-lg-4">
                    <div class="image-box">
                        <img class="preview-img" src="{{asset('storage/'.$house->cover_img)}}" alt="Card image cap">
                    </div>  
                </div>
                {{-- /Box image --}}

                {{-- Box text --}}
                <div class="search-info col-12 col-md-7 col-lg-8">
                    <div class="search-info-head">
                        <div class="address">{{$house->address}}</div>
                        <div class="title">{{$house->title}}</div>
                    </div>
                    <div class="separator"></div>
                    <div class="search-info-body">
                        <ul class="rooms-info">
                            <li>{{$house->guests}} ospiti</li>
                            <li>{{$house->rooms}} stanze</li>
                            <li>{{$house->bedrooms}} camere</li>
                            <li>{{$house->bathrooms}} bagni</li>
                        </ul>
                    </div>
                </div>
                {{-- /box text --}}
            </div>
        </div>
    </a>
</div>