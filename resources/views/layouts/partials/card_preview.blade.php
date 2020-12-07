    <div class="col col-md-4">
        <div class="preview">
            <a href="{{route('admin.houses.show',  $house->slug)}}" class="preview-link">
                <img class="preview-img" src="{{asset('storage/'.$house->cover_img)}}" alt="Card image cap">
                <div class="preview-banner d_flex">
                    <h3 class="preview-banner-title">{{$house->title}}</h3>
                    <h4 class="preview-banner-subtitle">{{$house->type->type}}</h4>
                </div>
            </a>
        </div>
    </div>