@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            @if($errors->any())
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                        <li class="list-group-item text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

<div class="row">
    {!! Form::open(['class' => 'form-horizontal', 'method'=>'post','route'=>['store_event','id'=>Auth::user()->id], 'enctype'=>'multipart/form-data']) !!}
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
        {!! Form::label('photo_event', 'Фото', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-8">
            {!! Form::file('photo_event', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
            <button type="submit" class="btn btn-default">Создать</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>

@endsection