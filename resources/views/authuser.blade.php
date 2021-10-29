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
                <a class="nav__link" href="#2">Посты жирафиков</a>
                <a class="nav__link" href="/logout">Выйти</a>
            </nav>
        </div>
    </div>
</header>

<div class="intro">
    <div class="container">
        <div class="intro__inner">
            <h2 class="intro__suptitle">Software GIRAFFE</h2>
            <h1 class="intro__title">Приветствуем в заповеднике, {{$user->name}}</h1>
            <a class="btn" href="#2">Посмотреть посты</a>
        </div>
    </div>
</div>
<section class="intro2" id="2">
    <div class="container2">
        <div class="post">
            @yield('content')
        </div>
    </div>
</section>
</body>
</html>
