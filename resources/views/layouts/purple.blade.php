<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PurpleTeam') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="https://github.com/mywebdevru/purple/raw/dev/4x4.png" alt="" width="30" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Лента</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Профиль</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Клубы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Карты</a>
                </li>
            </ul>
            <div class="form-inline navbar-nav ml-auto my-2 my-lg-0 dropleft">
                <div class="navbar_inline_notifications mr-4 ml-4">
                    <i class="fas fa-2x fa-bell text-secondary"></i><span class="badge badge-pill badge-danger">12</span>
                    <i class="fas fa-2x fa-envelope text-secondary"></i><span class="badge badge-pill badge-warning">42</span>
                    <i class="fas fa-2x fa-plus text-secondary"></i><span class="badge badge-pill badge-success">32</span>
                </div>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="http://placehold.it/35x35" class="navbar_profile_pic">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <b class="dropdown-item mt-2 disabled font-weight-bold">Имя Фамилия</b>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Профиль (вы здесь)</a>
                        <a class="dropdown-item" href="#">Настройки</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger mb-2" href="#">Выход</a>
                    </div>
                </li>
            </div>
        </div>
    </nav>
    @yield('content')
    <!-- Scripts -->
    <script src="{{ asset('js/main.js') }}" defer></script>
</body>