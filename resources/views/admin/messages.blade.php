@extends('layouts.main')

@section('main-section')

    <div class="container contnr_msgs">

        <div class="btn_back_lnk">
            <a class="btn_back" href="{{route('admin.houses.index')}}">Torna ai tuoi alloggi</a>
        </div>

        <h2>I tuoi messaggi</h2>

        <div class="d_flex cont_msg_fl">

            <div class="msg_lst">
                
                @foreach ($messages as $message)
                    <div class="msg_uniq">
                        <small>{{$message->house->title}}</small>
                        <h5>{{$message->email_msg}}</h5>
                        <p class="brk_msg_point">{{$message->content_msg}}</p>
                    </div>
                @endforeach
            </div>
            
            <div class="msg_show d_none">
                <div class="head_msg_info">
                {{-- header --}}
                    <h3></h3>
                    <small></small>
                {{-- header --}}
                </div>
                
                <div class="content_msg_us">
                    <p></p>
                    {{-- img copertina casa + riferimenti/link --}}
                </div>

            </div>
        </div>
    </div>

@endsection