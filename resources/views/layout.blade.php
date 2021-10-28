<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Montserrat:400,700&amp;subset=cyrillic-ext" rel="stylesheet">
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
                <a class="nav__link" href="#2">Зарегистрироваться</a>
                <a class="nav__link" href="#2">Войти</a>
            </nav>
        </div>
    </div>
</header>
<div class="intro">
    <div class="container">
        <div class="intro__inner">
            <h2 class="intro__suptitle">Software GIRAFFE</h2>
            <h1 class="intro__title">Приветствуем в заповеднике</h1>
                    <a class="btn" href="#2">Стань участником заповедника</a>
        </div>
    </div>
</div>
<section class="intro2" id="2">
        <div class="container2">
            <div class="section__header">
                <div class = "container-fluid">
                    <form method="post">
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
</body>
</html>
