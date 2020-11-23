@foreach ($service as $type)
    <p>{{$type->name_serv}}</p>
    <img src="{{$type->path_icon}}" alt="">
@endforeach