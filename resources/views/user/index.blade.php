@extends('layouts.app')
@section('content')

    <div class="row main">
        <header class=" col-xs-4 ">
            <div class="woll">
                @foreach($info as $inf)
                    <div class="user_info">
                        <img class="img-responsive img-rounded avatar" alt="Сервер с фотографией временно не доступен"
                             src="{{ !empty($inf->photo) ? $inf->photo : 'ava.png'}}"
                                >

                        <p>{{$inf->surname}} {{$inf->name}}</p>
                        <hr>
                        @if (Auth::user())

                            @if (Auth::user()->id==$inf->id)
                                <div class="botton_otstup">
                                    <button class="btn btn-primary btn-success" data-toggle="modal"
                                            data-target="#myModal">
                                        Добавить фотографию
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">Загрузите свое фото</h4>
                                                </div>
                                                <form id="upload"
                                                      action="{{route('myform',['id' => \Auth::user()->id])}}"
                                                      method="post"
                                                      enctype='multipart/form-data'>
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="put">

                                                    <div class="modal-body">
                                                        <input class="btn btn-primary" type="file" name="somename">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Закрыть
                                                        </button>
                                                        <input class="btn btn-success" type="submit"
                                                               value="Сохранить изменения">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="botton_otstup2">
                                    <a href="{{ route('create_event', ['id' =>$inf->id]) }}">
                                        <button type="button" class="btn btn-success">Добавить новость</button>
                                    </a>
                                </div>
                            @endif
                        @endif
                    </div>
                    @endforeach
                            <!-- #menu-primary .menu-container -->
            </div>
        </header>

        <div class=" col-xs-6 col-xs-offset-1">
            @forelse($events as $event)
                <div class="excerpts-container " id="excerpts-container_{{$event->id}}">
                    <div class="post publish author-admin post-19 format-standard category-uncategorized post_tag-boat post_tag-lake excerpt"
                         itemscope="" itemtype="http://schema.org/BlogPosting">
                        <div class="excerpt-meta">
                            <span class="excerpt-date" itemprop="datePublished"
                                  content="2008-10-17">{{$event->created_at}}</span>
                        </div>
                        <div class="excerpt-header">
                            <img src="{{$event->link}}" class="img-responsive img-thumbnail">

                            <h1 class="excerpt-title" itemprop="headline">
                                <a itemprop="url"
                                   href="{{ route('view_event', ['event_id' => $event->id]) }}">{{$event->title}}</a>
                            </h1>
                        </div>
                        <div class="excerpt-content">
                            <article itemprop="description">
                                <p>{{$event->short_description.'...'}}</p>

                                <p><a class="more-link"
                                      href="{{ route('view_event', ['event_id' => $event->id]) }}">
                                        <button type="button" class="btn btn-success">читать далее...</button>
                                    </a></p>
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

                            <span class="link item">
                                <label id="del-{{$event->id}}" class="delete" data-toggle="modal"
                                       data-target="{{--.bs-example-modal-sm{{$event->id}}--}}" {{--onclick="myfunc()"--}}>
                                    <span class="glyphicon glyphicon-trash"></span>
                                    <span class="glyphicon-class">Удалить запись</span>
                                </label>
                                </span>
                        @endif
                    @endif
                </div>
                {{--<div class="modal fade bs-example-modal-sm{{$event->id}}" tabindex="-1" role="dialog"--}}
                     {{--aria-labelledby="mySmallModalLabel"--}}
                     {{--aria-hidden="true">--}}
                    {{--<div class="modal-dialog modal-sm">--}}
                        {{--<div class="modal-content">--}}
                            {{--<div class="modal-header">--}}
                                {{--<button type="button" class="close" data-dismiss="modal"--}}
                                        {{--aria-hidden="true">&times;</button>--}}
                                {{--<h4 class="modal-title" id="myModalLabel">УДАЛЕНИЕ</h4>--}}
                            {{--</div>--}}
                            {{--<div class="modal-body">--}}
                                {{--Вы точно хатите удалить новость???--}}
                            {{--</div>--}}
                            {{--<div class="modal-footer">--}}
                                {{--<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>--}}
                                {{--<form action="{{route('del_event',$event->id)}}" method="POST">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--{{ method_field('DELETE') }}--}}

                                    {{--<button type="submit" id="delete-{{ $event->id }}" class="btn btn-danger">--}}
                                        {{--<i class="fa fa-btn fa-trash"></i>Delete--}}
                                    {{--</button>--}}
                                {{--</form>--}}
                                {{--<a href="{{route('del_event',$event->id)}}">--}}
                                {{--<button type="button" class="btn btn-danger">Удалить</button>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            @empty
                <div class="default_woll">
                    <p>Здесь будут отображаться ваши записи</p>
                </div>
                <div class="default_event">
                    <p>У Вас пока нет записей</p>
                </div>

            @endforelse

            {{$events->render()}}
        </div>

        <!-- .main -->
    </div>
<script>
    $('document').ready(function()
    {
        $('.delete').click(function()
        {
            var clickedID = this.id.split("-"); //Разбиваем строку (Split работает аналогично PHP explode)
            var id = clickedID[1]; //и получаем номер из массива
            /*confirm_var=confirm('Удалить категорию?');*///запрашиваем подтверждение на удаление
            /*if (!confirm_var) {return false;}*/
            swal({   title: "Вы уверены?",   text: "Вы хотите удалить новость!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Да, удалить",   closeOnConfirm: false }, function(){

                $.ajax({
                    url:'/event/'+id+'/del', //url куда мы мы передаем delete запрос
                    method: 'POST',
                    data: {'_token':"{{csrf_token()}}" }, //не забываем передавать токен, или будет ошибка.
                    success: function(msg)
                    {
                        $('#excerpts-container_'+id).fadeOut("slow");
                        swal("Удалено!", "Выбранная новость успешно удолена.", "success");
//                    alert('Category '+msg+' destroy');
                    },
                    error: function(msg)
                    {
                        console.log(msg); // в консоле  отображаем информацию об ошибки, если они есть
                    }
                });

                });

        });
    });






</script>
@endsection