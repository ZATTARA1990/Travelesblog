@extends('layouts.app')
@section('content')
    {!! Form::model($event,['class' => 'form-horizontal','enctype'=>'multipart/form-data', 'method'=>'put','route'=>['update_event','event_id'=>$event->id,'user_id'=>$event->user_id]]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-8">
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('short_description', 'Короткое описание', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-8">
            {!! Form::text('short_description', null, ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('content', 'Описание', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-8">
            {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('photo_event', 'Фото', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-8">
            {!! Form::file('photo_event', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
            <button type="submit" class="btn btn-default">Обновить</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection