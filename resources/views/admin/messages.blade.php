@extends('layouts.main')

@section('main-section')
    @foreach ($messages as $message)
    <small>{{$message->house_id}}</small>
    <h3>{{$message->email_msg}}</h3>
    <p>{{$message->content_msg}}</p>
    @endforeach
@endsection