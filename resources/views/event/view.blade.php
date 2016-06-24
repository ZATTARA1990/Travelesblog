@extends('layouts.app')
@section('content')
    @foreach($events as $event)

            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h1>{{$event->title}}</h1>
                    <img class="img-responsive img-thumbnail" src="{{$event->link}}">

                    <p>{{$event->content}}</p>
                </div>
            </div>


    @if (Auth::user())
    <div class="row">
        {!! Form::open(['class' => 'form-horizontal', 'method'=>'post','route'=>['addComment','event'=>$event->id]]) !!}

        <div class="form-group">
            {!! Form::label('comment', 'Коментарий', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => '']) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-6">
                <button type="submit" class="btn btn-default">Оставить коментарий</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    @endif
    @endforeach
    @foreach($comments as $comment)
    <p>{{$comment->comment}}</p>
    @endforeach
@endsection