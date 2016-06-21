@extends('layouts.app')
@section('content')
    {!! Form::open(['class' => 'form-horizontal', 'method'=>'post','route'=>['store_event','id'=>Auth::user()->id]]) !!}
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
        {!! Form::label('conten', 'Описание', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-8">
            {!! Form::textarea('conten', null, ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
            <button type="submit" class="btn btn-default">Создать</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection