@extends('layouts.app')
@section('content')


    <div id="main_blok">
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
        <div id="comment_block"></div>
        <div id="div_comment">
            @forelse($comments as $comment)
                <div class="row row_comment" id="del_{{$comment->id}}">
                    <div class="col-xs-10 col-xs-offset-2">

                        <div class="col-xs-2">
                            @foreach($users as $user)
                                @if($user->id==$comment->user_id)
                                    <img class="img-responsive img-rounded"
                                         alt="Сервер с фотографией временно не доступен"
                                         src="{{ !empty($user->photo) ? $user->photo :'/ava.png'}}">

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
                        <p>
                            {{$comment->comment}}


                        </p>
                    </span>


                        </div>

                        <div>
                            @if (!Auth::guest())
                                @if (Auth::user()->id==$event->user_id)
                                    <span class="link">
                    {{--<a href="{{route('del_comment',$comment->id)}}">--}}
                                        <label class="delete" id="del-{{$comment->id}}">
                                            <span class="glyphicon glyphicon-trash"></span>
                                            <span class="glyphicon-class">Удалить запись</span>
                                        </label>
                                        {{--</a>--}}
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


        </div>

        @if (Auth::user())
            <div class="row">
                {!! Form::open(['class' => 'form-horizontal', 'method'=>'post','route'=>['addComment','event'=>$event->id],'onSubmit'=>'return validate(this)']) !!}

                <div class="form-group">
                    {!! Form::label('comment', 'Коментарий', ['class' => 'col-xs-2 control-label']) !!}
                    <div class="col-xs-8">
                        {!! Form::textarea('comment', null, ['id'=>'contentText','class' => 'form-control', 'placeholder' => '', 'rows'=>'5']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-offset-2 col-xs-6">
                        <button id="add-{{$event->id}}" {{--type="submit"--}} class="btn btn-success FormSubmit">
                            Оставить коментарий
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        @endif
        @endforeach
    </div>

    <script>
        function validate(form) {
            fail = validateComment(form.comment.value)

            if (fail == "") return true
            else { swal("Внимание!", fail, "warning"); return false }

        };

        $('document').ready(function () {



            $('.delete').click(function () {
                var clickedID = this.id.split("-"); //Разбиваем строку (Split работает аналогично PHP explode)
                var id = clickedID[1]; //и получаем номер из массива
                /*confirm_var=confirm('Удалить категорию?');*///запрашиваем подтверждение на удаление
                /*if (!confirm_var) {return false;}*/
                swal({
                    title: "Вы уверены?",
                    text: "Вы хотите удалить комментарий!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Да, удалить",
                    closeOnConfirm: false
                }, function () {

                    $.ajax({
                        url: '/' + id + '/del', //url куда мы мы передаем delete запрос
                        method: 'POST',
                        data: {'_token': "{{csrf_token()}}"}, //не забываем передавать токен, или будет ошибка.
                        success: function (msg) {
                            $('#del_' + id).fadeOut("slow");
                            swal("Удалено!", "Выбранный коментарий успешно удолен.", "success");
//                    alert('Category '+msg+' destroy');
                        },
                        error: function (msg) {
                            console.log(msg); // в консоле  отображаем информацию об ошибки, если они есть
                        }
                    });

                });

            });
        });
    </script>
@endsection