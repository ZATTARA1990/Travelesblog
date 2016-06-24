@extends('layouts.app')
@section('content')
    <div class="contener">
        <div class="row">
            <header id="site-header" class="site-header col-md-4 " role="banner">

                <div class="menu-slider ">
                    @foreach($info as $inf)
                        <div class="site-info">
                            <img alt="Сервер с фотографией временно не доступен"
                                 src="{{ !empty($inf->photo) ? $inf->photo :'https://secure.gravatar.com/avatar/?s=72&amp;d=identicon&amp;r=pg'}}"
                                 height="72" width="72">

                            <p>{{$inf->surname}} {{$inf->name}}</p>
                            <hr>
                            @if (!Auth::guest())

                                @if (Auth::user()->id==$inf->id)

                            <a href="{{ route('create_event', ['id' =>$inf->id]) }}">
                                <button type="button" class="btn btn-success">Добавить новость</button>
                            </a>
                                @endif
                                @endif
                        </div>
                        @endforeach
                                <!-- #menu-primary .menu-container -->
                </div>
            </header>

            <div id="main" class="main col-md-6" role="main">
                @if (isset ($events))
                    @foreach($events as $event)
                        <div class="excerpts-container">
                            <div class="post publish author-admin post-19 format-standard category-uncategorized post_tag-boat post_tag-lake excerpt"
                                 itemscope="" itemtype="http://schema.org/BlogPosting">
                                <div class="excerpt-meta">
                            <span class="excerpt-date" itemprop="datePublished"
                                  content="2008-10-17">{{$event->created_at}}</span>
                                </div>
                                <div class="excerpt-header">
                                    <img src="{{$event->link}}" class="img-responsive img-thumbnail">

                                    <h1 class="excerpt-title" itemprop="headline">
                                        <a itemprop="url" href="https://wp-themes.com/?p=19">{{$event->title}}</a>
                                    </h1>
                                </div>
                                <div class="excerpt-content">
                                    <article itemprop="description">
                                        <p>{{$event->short_description}}</p>

                                        <p><a class="more-link"
                                              href="{{ route('view_event', ['event_id' => $event->id]) }}">Читать
                                                полностью</a></p>
                                    </article>
                                </div>
                            </div>
                            @if (!Auth::guest())

                                @if (Auth::user()->id==$event->user_id)
                                    <span class="link">
                                <a href="{{route('edit_event',$event->id)}}">
                                    <label>
                                        <span class="glyphicon glyphicon-pencil"></span>
                                        <span class="glyphicon-class">Отредактировать запись</span>
                                    </label>
                                </a>
                            </span>

                                    <span class="link">
                                <a href="{{route('del_event',$event->id)}}">
                                    <label>
                                        <span class="glyphicon glyphicon-trash"></span>
                                        <span class="glyphicon-class">Удалить запись</span>
                                    </label>
                                </a>
                            </span>
                                @endif
                            @endif
                        </div>
                        <hr>
                    @endforeach
                    {{$events->render()}}
                @else
                    <p>На вашей стене пока нет записей</p>
                @endif
            </div>

            <!-- .main -->
        </div>
    </div>
    <!--overflow-container-->


@endsection