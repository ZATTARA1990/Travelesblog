@extends('layouts.app')
@section('content')
    <div class="col-lg-3 col-lg-offset-2">
        <form action="{{route('myform',['id' => \Auth::user()->id])}}" method="post" enctype='multipart/form-data'>
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
           <div>выберети свою фотографию<input type="file" name="somename"></div>
           <div>введите ваш город<input type="text" name="city"></div>
           <div><input type="submit" value="Загрузить"></div>
        </form>
    </div>
@endsection