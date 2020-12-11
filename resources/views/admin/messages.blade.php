@extends('layouts.main')

@section('main-section')

    <div class="container contnr_msgs">

        <div class="btn_back_lnk">
            <a class="btn_back" href="{{route('admin.houses.index')}}">Torna ai tuoi alloggi</a>
        </div>

        <h2 class='h2-title'>I tuoi messaggi</h2>

        <div class="d_flex cont_msg_fl row">

            <div class="msg_lst col-12 col-md-3">
                
                @foreach ($messages as $message)
                    <div class="msg_uniq">
                        <p class="email-send">Messaggio da:</p><h5>{{$message->email_msg}}</h5>
                        <div class="barr"></div>
                        <small>{{$message->house->title}}</small>
                        <img class="img-take"src="{{asset('storage/'.$message->house->cover_img)}}" alt="">
                        <p class="address-ms">{{$message->house->address}}</p>         
                        <p class="brk_msg_point">{{$message->content_msg}}</p>
                    </div>
                @endforeach
            </div>
            <div class="col-12 col-md-9">
                <div class="msg_show d_none ">
                    <div class="head_msg_info">
                    {{-- header --}}
                        <p><small class="emailed"></small> ti ha inviato un messaggio.</p>
                        <div class="barr"></div>
                        <p id="content-msg"></p>

                    {{-- header --}}
                    </div>
                    <div class="row content_msg_us" >
                        <div class="col-12 col-md-5">
                            {{-- House img --}}
                            <div class="msg-img" >
                                <img src="" alt=""> 
                            </div>                                              
                        </div>
                        <div class="col-12 col-md-7" >
                                <p class="address-msg-show"></p>
                                <h3></h3>
                                <div class="barr"></div>
                                
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>

@endsection

