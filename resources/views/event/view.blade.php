@extends('layouts.app')
@section('content')
    @foreach($events as $event)
        <h1>{{$event->title}}</h1>
        <p>{{$event->content}}</p>
    @endforeach
@endsection