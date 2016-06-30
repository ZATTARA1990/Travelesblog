@extends('layouts.app')
@section('content')



    <div class="row">

        @foreach($events as $event)

            <div class="col-xs-8 col-xs-offset-2">
                <h1>{{$event->title}}</h1>
                @if(isset($event->link))
                    <img class="img-responsive img-thumbnail" src="{{$event->link}}">
                @endif
                <div class="event_content">
                    <p>{{$event->content}}</p>
                </div>

            </div>

    </div>

    <div class="row">
        <div class="col-xs-10 col-xs-offset-2 comment">
            <p>Коментарии:</p>
        </div>
    </div>

    @forelse($comments as $comment)
        <div class="row row_comment">
            <div class="col-xs-10 col-xs-offset-2">

                <div class="col-xs-2">
                    @foreach($users as $user)
                        @if($user->id==$comment->user_id)
                            <img class="img-responsive img-rounded" alt="Сервер с фотографией временно не доступен"
                                 src="{{ !empty($user->photo) ? $user->photo :'/ava.png'}}"">

                </div>

                <div class="col-xs-6 com_hr">
                    <div>
                        <span><a href="{{route('user',$user->id)}}"
                                 itemprop="name">{{$user->name}} {{ $user->surname}}</a>
                            @endif
                            @endforeach</span>

                        <span class="com_date">
                            {{$comment->created_at}}
                        </span>
                    </div>
                    <span class="com_content">
                        <p><pre>
                            nl2br( {!! $comment->comment !!}  )
                        </pre>
                        </p>
                    </span>


                </div>

                <div>
                    @if (!Auth::guest())
                        @if (Auth::user()->id==$event->user_id)
                            <span class="link">
                    <a href="{{route('del_comment',$comment->id)}}">
                        <label>
                            <span class="glyphicon glyphicon-trash"></span>
                            <span class="glyphicon-class">Удалить запись</span>
                        </label>
                    </a>
                </span>
                        @endif
                    @endif
                </div>

            </div>
        </div>

    @empty
        <div class="row">
            <div class="col-xs-10 col-xs-offset-2">
                <p>Ваш комментарий будет первым</p>
            </div>
        </div>
    @endforelse


    @if (Auth::user())
        <div class="row">
            {!! Form::open(['class' => 'form-horizontal', 'method'=>'post','route'=>['addComment','event'=>$event->id]]) !!}

            <div class="form-group">
                {!! Form::label('comment', 'Коментарий', ['class' => 'col-xs-2 control-label']) !!}
                <div class="col-xs-8">
                    {!! Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => '', 'rows'=>'5']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-offset-2 col-xs-6">
                    <button type="submit" class="btn btn-success">Оставить коментарий</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    @endif
    @endforeach

@endsection