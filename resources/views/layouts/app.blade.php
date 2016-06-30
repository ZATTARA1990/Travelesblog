<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Путешествия отзывы советы">
    <meta name="description" content="Отзывы о путешествиях и советы как лучше отдохнуть">
    <title>Блог для путешественников</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"
          integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
    <link href="{{asset('but_del/css/style.css')}}" rel="stylesheet" >
    <link href="{{asset('but_del/jquery_confirm/jquery_confirm.css')}}" rel="stylesheet" >

    <script src="/js/sweetalert.min.js"></script>



</head>


<body>
<div class="contener">
    <div class=" col-xs-offset-1 col-xs-10 background">
        <div class="row">
            <nav class=" col-xs-12">
                {{--<div class="container">--}}
                <div class="navbar-header">

                    <!-- Branding Image -->
                    <a class="navbar-brand link_name" href="{{ url('/') }}">
                        Travelesblog
                    </a>
                </div>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle navbar-brand " data-toggle="dropdown" role="button"
                       aria-expanded="false">
                        Пользователи <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        @if (isset($users))
                            @foreach($users as $user)
                                <li><a href="{{route('user',$user->id) }}"><i
                                                class="fa fa-btn fa-sign-out"></i>{{$user->name}}
                                    </a></li>
                            @endforeach
                        @endif
                    </ul>

                </div>

                <!-- Right Side Of Navbar -->
                <div class="nav-bar-right">
                    @if (Auth::guest())
                        <a href="{{ url('/login') }}">Войти</a>
                        <a href="{{ url('/register') }}">Зарегистрироваться</a>
                    @else
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Выйти</a></li>
                            </div>
                        </div>

                    @endif
                </div>
            </nav>
        </div>

        @yield('content')
    </div>


</div>
<footer class="footer col-md-offset-1 col-xs-10">
    <div class="container">
        <p class="text-muted">Dubovik Inc. 2016</p>
    </div>
</footer>


<!-- JavaScripts -->
@if(session()->has('noty'))
    <script>
        sweetAlert("{{ session('noty.title') }}", "{{ session('noty.message') }}", "{{ session('noty.type') }}");
    </script>
@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/jquery-3.0.0.min..js') }}"></script>
<script src="{{ asset('js/validate_form.js') }}"></script>




</body>
</html>
