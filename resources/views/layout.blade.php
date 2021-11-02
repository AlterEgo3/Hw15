<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/style.css">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Montserrat:400,700&amp;subset=cyrillic-ext" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>GIRAFFE</title>
</head>
<body>

<header class="header">
    <div class="container">
        <div class="header__inner">
            <div>
                <img src="/images/logotip.png" width="30%"  alt="Лого жирафа">
            </div>
            <nav class="nav">
                @if($user==null)
                    <a class="nav__link" href="#2">Зарегистрироваться</a>
                    <a class="nav__link" href="#2">Войти</a>
                @else
                    <a class="nav__link" href="#2">Посты жирафиков</a>
                    <a class="nav__link" href="/logout">Выйти</a>
                    @endif
            </nav>
        </div>
    </div>
</header>
<div class="intro">
    <div class="container">
        <div class="intro__inner">
            <h2 class="intro__suptitle">Software GIRAFFE</h2>
            @if($user==null)
            <h1 class="intro__title">Приветствуем в заповеднике</h1>
                    <a class="btn1" href="#2">Стань участником заповедника</a>
            @else
                <h1 class="intro__title">Приветствуем в заповеднике, {{$user->name}}</h1>
                <a class="btn1" href="#2">Посмотреть посты</a>
                @endif
        </div>
    </div>
</div>
@if($user==null)
<section class="intro2" id="2">
        <div class="container2">
            <div class="section__header">
                <div class = "container-fluid">
                    <form method="post" action="/login">
                        @csrf
                        <h3 class="registration">Регистрация жирафиков</h3>
                        <div class="mb-3">
                            <label for="name" class="form-label" style="color: yellow">Username</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{request()->old('name')}}">
                            @if($errors->has('name'))
                                @foreach($errors->get('name') as $error)
                                    <p style="color: red">{{$error}}</p>
                                @endforeach
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label" style="color: yellow">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                            @if($errors->has('password'))
                                @foreach($errors->get('password') as $error)
                                    <p style="color: red">{{$error}}</p>
                                @endforeach
                            @endif
                        </div>
                        <div>
                            <input type="submit" class="btn btn-success" style="background-color: #EBD55A; border-color: yellow;" value="Вход">
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>
@endif
<section class="intro2" id="2">
    <div class="section__header1">
        <div class="container2">
            <div class="post">
                @yield('content')
            </div>
        </div>
    </div>
</section>
</body>
</html>
