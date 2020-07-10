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
</head>

<body>
    <div class="">
        <div class="navbar navbar-light-bg-light navbar-expand-md">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/"><img src="https://github.com/mywebdevru/purple/raw/dev/4x4.png" alt="LOGO" class="logo-4x4"></a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="#navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="#">Лента</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Мой профиль</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Клубы</a></li>
                        <li class="nav-item"><span class="badge badge-important">6</span><a class="nav-link" href="#" data-toggle="modal" data-target="#notifyModal"><i class="fa fa-bell-o fa-lg bt4fix-fa-icons-blacked" aria-hidden="true"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#msgModal"><i class="fa fa-envelope-o fa-lg bt4fix-fa-icons-blacked" aria-hidden="true"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                                    <img src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" class="img-responsive rounded-circle" title="{{ $data->name }} {{ $data->surname }}" alt="{{ $data->name }} {{ $data->surname }}" width="30px" height="30px">
                                </span>
                                <span class="user-name">
                                    {{ $data->name }} {{ $data->surname }}
                                </span>
                                <b class="caret"></b></a>
                            <ul class="dropdown-menu dropdown-menu-right mt-4">
                                <li>
                                    <div class="navbar-content">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <img src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" alt="Alternate Text" class="img-responsive" width="120px" height="120px" />
                                                <p class="text-center small mt-2">
                                                    <a href="#" data-toggle="modal" data-target="#profpicModal"><i class="fa fa-upload"></i> Новое фото</a>
                                                </p>
                                            </div>
                                            <div class="col-md-7">
                                                <span>{{ $data->name }} {{ $data->surname }}</span>
                                                <p class="text-muted small">
                                                    {{ $data->email }}</p>
                                                <div class="divider">
                                                </div>
                                                <a href="#" class="btn btn-default btn-xs mb-2"><i class="fa fa-user-o" aria-hidden="true"></i> Профиль</a>
                                                <a href="#" class="btn btn-default btn-xs mb-2" data-toggle="modal" data-target="#aboutModal"><i class="fa fa-address-card-o" aria-hidden="true"></i> О себе</a>
                                                <a href="#" class="btn btn-default btn-xs mb-2" data-toggle="modal" data-target="#setsModal"><i class="fa fa-cogs" aria-hidden="true"></i> Настройки</a>
                                                <a href="#" class="btn btn-default btn-xs mb-2"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Поддержка</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="navbar-footer">
                                        <div class="navbar-footer-content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#passwdModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Сменить пароль</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="#" class="btn btn-danger btn-sm pull-right"><i class="fa fa-power-off" aria-hidden="true"></i> Выход</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
    <!-- Scripts -->
    <script src="{{ asset('js/main.js') }}" defer></script>
    {{-- <script type="text/javascript" >

            class AdminMaker {
                constructor(buttonsSelector) {
                    this.selector = buttonsSelector;
                    this.buttons = this._getButtons();
                    this.answer = null;
                    this._listenForClick();
                }

                _getButtons(){
                    return document.querySelector(this.selector)
                }
                _listenForClick(){
                    console.log('start');
                        this.buttons.addEventListener('click', e =>{
                            this._changeAdminStatus();
                        });
                }
                _changeAdminStatus(){
                    let settings = this._makeRequestSettings();
                    (async () => {
                        const response = await fetch('/user/friendship_delete', settings);
                        const answer = await response.json();
                        console.log(answer);
                        this._changeUserStatusOnSite(answer);
                    }) ();
                }
                _makeRequestSettings(){
                    let data = {
                        'user_id': {{ $data->id }},
                        'friend_id':12,
                        'friendship' : 'reject'
                    };
                    let settings = {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            // 'Authorization':'Bearer '+ js_vars.api_token
                            },
                        body: JSON.stringify(data),
                        }
                    return settings
                }
                _changeUserStatusOnSite(answer) {
                    console.log('ehf')

                }
            }


            let admin = new AdminMaker('#friend');
        </script> --}}
</body>
