@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row otstup">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Маркеры слайдов -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Содержимое слайдов -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="http://www.fonstola.ru/pic/201308/1280x1024/fonstola.ru-106377.jpg" alt="...">

                            <div class="carousel-caption">
                                <h3>Смелость</h3>

                                <p>Путешествие — это совсем не страшно, это всего лишь много-много маленьких шагов. Ты
                                    же можешь сделать один шаг, правда?.</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="http://hq-wallpapers.ru/wallpapers/9/hq-wallpapers_ru_city_43943_1280x1024.jpg"
                                 alt="...">

                            <div class="carousel-caption">
                                <h3>Мечты</h3>

                                <p>Путешествия многое нам открывают, о многом заставляют думать, мечтать</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="http://wpapers.ru/wallpapers/All/9131/1280x1024_%D0%9A%D0%B0%D1%80%D1%82%D0%B0-%D0%B8-%D0%BA%D0%BE%D0%BC%D0%BF%D0%B0%D1%81.jpg"
                                 alt="...">

                            <div class="carousel-caption">
                                <h3>Страсть</h3>

                                <p>Любое путешествие — всегда немножко похоже на сказку. Наверное, поэтому его так
                                    трудно дождаться</p>
                            </div>
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8  col-md-offset-2">
                <div>
                    @if (isset ($events))
                        @foreach($events as $event)
                            <div class="excerpts-container my_excerpts">
                                <div class="post publish author-admin post-19 format-standard category-uncategorized post_tag-boat post_tag-lake excerpt"
                                     itemscope="" itemtype="http://schema.org/BlogPosting">
                                    <div class="excerpt-meta">
                            <span class="excerpt-date" itemprop="datePublished"
                                  content="2008-10-17">{{$event->created_at}}</span>
                                        @if (isset($users))
                                            @foreach($users as $user)
                                                @if ($user->id==$event->user_id)
                                                    <span itemprop="author" itemscope=""
                                                          itemtype="http://schema.org/Person" class="excerpt-author">
                                        <span>Автор:</span>
                                        <a href="{{route('user',$user->id)}}"
                                           itemprop="name">{{$user->name}} {{ $user->surname}}</a>
                                        </span>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>

                                    <div class="excerpt-header">
                                        <h1 class="excerpt-title" itemprop="headline">
                                            <a itemprop="url" href="{{ route('view_event', ['event_id' => $event->id]) }}">{{$event->title}}</a>
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
                            </div>
                            <hr>
                        @endforeach
                        {{$events->render()}}
                    @else
                        <p>На стене пока нет записей</p>
                    @endif
                </div>

            </div>
        </div>
    </div>

@endsection
