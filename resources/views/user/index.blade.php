@extends('layouts.app')
@section('content')
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--@foreach($info as $inf)--}}
    {{--<div class="row">--}}
    {{--<div class="col-lg-3 col-lg-offset-2">--}}
    {{--<img src="{{ !empty($inf->photo) ? $inf->photo : 'default_avatar.png' }}" class="img-responsive "--}}
    {{--alt="Сервер с фотографией временно не доступен">--}}
    {{--<a href="{{route('user_edit',['id'=>$inf->id])}}">Редактировать профиль</a>--}}
    {{--</div>--}}



    {{--<div class="col-lg-3">--}}
    {{--<div><h3>{{$inf->surname}} {{$inf->name}} </h3></div>--}}
    {{--@if(!empty($inf->city))--}}
    {{--<p>Город</p>--}}

    {{--<p>{{$inf->city}}</p>--}}
    {{--@endif--}}
    {{--@if(!empty($inf->birthday))--}}
    {{--<p>Дата рождения</p>--}}

    {{--<p>{{$inf->birthday}}</p>--}}
    {{--@endif--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--@endforeach--}}
    {{--<hr>--}}
    {{--<div class="row">--}}
    {{--<a href="{{ route('create_event', ['id' =>Auth::user()->id]) }}"><button  type="button" class="btn btn-success">Добавить новость</button></a>--}}
    {{--<div class="col-lg-6 col-lg-offset-2">--}}
    {{--<form action="{{route('form')}}" method="post" enctype="multipart/form-data">--}}
    {{--{{ csrf_field() }}--}}
    {{--<textarea class="form-control" rows="3" name="text"></textarea>--}}

    {{--<div class="form-group">--}}
    {{--<input type="file" id="exampleInputFile" name="photo_event">--}}
    {{--</div>--}}
    {{--<input type="submit" value="Опубликовать">--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row">--}}
    {{--<div class="col-lg-6 col-lg-offset-2">--}}
    {{--@foreach($events as $event)--}}
    {{--<p>{{$event->title}}</p>--}}
    {{--@endforeach--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    <div class="overflow-container">
        <a class="skip-content" href="#main">Skip to content</a>
        <header id="site-header" class="site-header" role="banner">


            <button id="toggle-button" class="toggle-button">
                <i class="fa fa-bars"></i>
            </button>


            <div class="menu-slider">
                @foreach($info as $inf)
                    <div class="site-info">
                        <img alt="Сервер с фотографией временно не доступен"
                             src="{{ !empty($inf->photo) ? $inf->photo :'https://secure.gravatar.com/avatar/?s=72&amp;d=identicon&amp;r=pg'}}"
                             srcset="https://secure.gravatar.com/avatar/?s=144&amp;d=identicon&amp;r=pg 2x"
                             class="avatar avatar-72 photo avatar-default" height="72" width="72" itemprop="image">

                        <p>{{$inf->surname}} {{$inf->name}}</p>
                        <hr>
                    </div>
                @endforeach
                <div class="menu-container menu-primary" role="navigation">
                    <div class="menu-unset">
                        <a href="{{ route('create_event', ['id' =>Auth::user()->id]) }}">
                            <button type="button" class="btn btn-success">Добавить новость</button>
                        </a>
                    </div>
                </div>
                <!-- #menu-primary .menu-container -->
            </div>
        </header>

        <div id="main" class="main" role="main">
            @if (isset ($events))
                @foreach($events as $event)
                    <div class="excerpts-container">
                        <div class="post publish author-admin post-19 format-standard category-uncategorized post_tag-boat post_tag-lake excerpt"
                             itemscope="" itemtype="http://schema.org/BlogPosting">
                            <div class="excerpt-meta">
                            <span class="excerpt-date" itemprop="datePublished"
                                  content="2008-10-17">{{$event->created_at}}</span>
                                {{--<span itemprop="author" itemscope="" itemtype="http://schema.org/Person" class="excerpt-author">--}}
                                {{--<span>Published by:</span>--}}
                                {{--<a href="https://wp-themes.com/?author=1" itemprop="name">Theme Admin</a>--}}
                                {{--</span>--}}
                            </div>
                            <div class="excerpt-header">
                                <h1 class="excerpt-title" itemprop="headline">
                                    <a itemprop="url" href="https://wp-themes.com/?p=19">{{$event->title}}</a>
                                </h1>
                            </div>
                            <div class="excerpt-content">
                                <article itemprop="description">
                                    <p>{{$event->short_description}}</p>

                                    <p><a class="more-link" href="{{ route('view_event', ['event_id' => $event->id]) }}">Читать полностью</a></p>
                                </article>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            @else
                <p>На вашей стене пока нет записей</p>
            @endif
        </div>

        <!-- .main -->

    </div>
    <!--overflow-container-->


@endsection