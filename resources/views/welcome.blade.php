@extends('layouts.app')
@section('content')

    <div class="row otstup">

        <div class="col-xs-12">

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="main_name"><h1>TrevelesBlog</h1></div>
                <!-- Маркеры слайдов -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Содержимое слайдов -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="cor.jpg" alt="...">

                        <div class="carousel-caption">
                            <h3>Смелость</h3>

                            <p>Путешествие — это совсем не страшно, это всего лишь много-много маленьких шагов. Ты
                                же можешь сделать один шаг, правда?</p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="cor2.jpg"
                             alt="...">

                        <div class="carousel-caption">
                            <h3>Мечты</h3>

                            <p>Путешествия многое нам открывают, о многом заставляют думать, мечтать</p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="cor3.jpg"
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

    <div class="row">
        <div class=" col-sm-4 col-xs-12">
            <div class="thumbnail">
                <img class="img-responsive" src="new.jpg" alt="New place">

                <div class="caption">
                    <h3>Узнавай о новых местах</h3>

                    <p>Читай отчёты путешественников и выбирай, куда отправишся ты</p><br>

                </div>
            </div>
        </div>
        <div class=" col-sm-4 col-xs-12">
            <div class="thumbnail">
                <img class="img-responsive" src="impression.jpg" alt="Give impressoin">

                <div class="caption">
                    <h3>Делись впечатлениями</h3>

                    <p>Идеальный отдых или неудачный! В любом случае это опыт, которым стоит поделиться с другими</p>

                </div>
            </div>
        </div>
        <div class=" col-sm-4 col-xs-12">
            <div class="thumbnail">
                <img class="img-responsive" src="help.jpg" alt="Helping others have a good rest">

                <div class="caption">
                    <h3>Помоги другим хорошо отдохнуть</h3>

                    <p>Поделись своими советами и подскажи, как сделать отдых лучше</p>

                </div>
            </div>
        </div>
    </div>
    @if (isset ($events))
        @foreach($events as $event)
            <div class="otstup">
                <div class="my_excerpts">
                    <div class="row">
                        @if (isset($event->link))
                        <div class="col-xs-5">

                            <img class="img-responsive img-thumbnail" src="{{$event->link}}">

                        </div>

                        <div class="col-xs-5">
                            <h1>{{$event->title}}</h1>
                            @if (isset($users))
                                @foreach($users as $user)
                                    @if ($user->id==$event->user_id)
                                        <div class="event_date">
                                            <span class="event_auth">
                            <span>Автор:</span>
                            <a href="{{route('user',$user->id)}}">
                                {{$user->name}} {{ $user->surname}}</a>
                            </span>
                                            @endif
                                            @endforeach
                                            @endif
                                            <span>{{$event->created_at}}</span>
                                        </div>

                                        <p>
                                            {{$event->short_description.'...'}}
                                        </p>

                                        <p><a class="more-link"
                                              href="{{ route('view_event', ['event_id' => $event->id]) }}">
                                                <button type="button" class="btn btn-success">читать далее...
                                                </button>
                                            </a></p>
                        </div>

                        @else

                            <div class="col-xs-10">
                                <h1>{{$event->title}}</h1>
                                @if (isset($users))
                                    @foreach($users as $user)
                                        @if ($user->id==$event->user_id)
                                            <div class="event_date">
                                            <span class="event_auth">
                            <span>Автор:</span>
                            <a href="{{route('user',$user->id)}}">
                                {{$user->name}} {{ $user->surname}}</a>
                            </span>
                                                @endif
                                                @endforeach
                                                @endif
                                                <span>{{$event->created_at}}</span>
                                            </div>

                                            <p>
                                                {{$event->short_description.'...'}}
                                            </p>

                                            <p><a class="more-link"
                                                  href="{{ route('view_event', ['event_id' => $event->id]) }}">
                                                    <button type="button" class="btn btn-success">читать далее...
                                                    </button>
                                                </a></p>
                            </div>

                        @endif
                    </div>
                </div>

                {{$events->render()}}

            </div>
        @endforeach
    @endif
@endsection
