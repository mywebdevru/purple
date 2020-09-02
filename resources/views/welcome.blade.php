@extends('layouts.app')

@section('content')
    <div class="welcome-block entry">
        <div class="h-100 w-100">
            <div class="col-sm-12 my-auto entry-text">
                @auth
                    <h1 class="text-white">{{ auth()->user()->full_name }} Добро пожаловать в</h1>
                    <h1 class="brand-name">OFFROAD PARADISE</h1>
                    <h3 class="text-white">Социальная сеть авторских путешествий</h3>
                    <a href="{{ route('user.show', ['user' => auth()->user()]) }}" class="btn btn-outline-dark auth-btn text-white">Моя страница</a>
                @else
                    <h1 class="brand-name">OFFROAD PARADISE</h1>
                    <h3 class="text-white">Поделись своим - авторским путешествием!</h3>
                    <a href="{{ route('login') }}" class="btn btn-outline-dark auth-btn text-white">Войти</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-dark auth-btn reg text-white">Зарегистрироваться</a>
                @endauth
            </div>
        </div>
    </div>

    <div class="welcome-block count-trail">
        <div class="block__count-trail">
            <div class="count-trail__text">
                <p class="text-grey text-grey__main">Уже <span class="trails-number text-grey__red">568</span> авторских маршрутов и путешествий,</p>
                <!-- <p class="text-grey"></p> -->
                <p class="text-grey">с описаниями и фотографиями размещены на сайте</p>
            </div>
            <div class="count-trail__buttons">
                <div class="btn btn-outline-dark auth-btn text-grey">Поиск маршрута</div>
                <div class="btn btn-outline-dark auth-btn reg text-grey" style="color: #fff;">Разместить свой маршрут</div>
            </div>
        </div>
    </div>

    <div class="welcome-block travel">
        <div class="travel__text">
            <a href="{{ route('register') }}" class="btn btn-outline-dark auth-btn reg text-grey">Зарегистрироваться</a>
        </div>
    </div>

    <div class="welcome-block count-trail">
        <div class="block__count-trail">
            <div class="count-trail__text">
                <p class="text-grey text-grey__main">Уже <span class="users-number text-grey__red">95</span> пользователей</p>
                <p class="text-grey">используют сайт для поиска маршрутов и единомышленников</p>
            </div>
            <div class="count-trail__buttons">
                <div class="btn btn-outline-dark auth-btn text-grey">Поиск друзей</div>
                <div class="btn btn-outline-dark auth-btn reg text-grey" style="color: #fff;">Зарегистрироваться</div>
            </div>
        </div>
    </div>

    <div class="welcome-block second">
        <div class="travel__text">
            <a href="{{ route('register') }}" class="btn btn-outline-dark auth-btn text-white">Зарегистрироваться</a>
        </div>
    </div>

    <div id="js-carousel" class="owl-carousel">
        <img src="{{ asset('img/puma.png') }}" alt="" class="carousel-item carousel-img">
        <img src="{{ asset('img/jeep-logo.png') }}" alt="" class="carousel-item carousel-img">
        <img src="{{ asset('img/puma.png') }}" alt="" class="carousel-item carousel-img">
        <img src="{{ asset('img/jeep-logo.png') }}" alt="" class="carousel-item carousel-img">
        <img src="{{ asset('img/puma.png') }}" alt="" class="carousel-item carousel-img">
        <img src="{{ asset('img/jeep-logo.png') }}" alt="" class="carousel-item carousel-img">
    </div>

    <a class="back-to-top" href="#">
        <img src="{{ asset('svg-icons/back-to-top.svg') }}" alt="arrow" class="back-icon">
    </a>

    <footer>
        <div class="container block__count-trail">
            <div class="row">
                
                    <div class="col-sm">
                        <a href="nav-link"><p>Home</p></a>
                        <a href="nav-link"><p>Travels</p></a>
                        <a href="nav-link"><p>Travelers</p></a>
                    </div>
                    <div class="col-sm">
                        <a href="nav-link"><p>Friends</p></a>
                        <a href="nav-link"><p>Groups</p></a>
                        <a href="nav-link"><p>Sales</p></a>
                    </div>
                    <div class="col-sm">
                        <a href="nav-link"><p>Photos</p></a>
                        <a href="nav-link"><p>Videos</p></a>
                        <a href="nav-link"><p>Policy</p></a>
                    </div>
                    <div class="col-sm">
                        <a href="#" class="logo">
                            <div class="img-wrap">
                                <img src="{{ asset('img/4x4_white_small.png') }}" alt="offroad">
                            </div>
                            <div class="title-block">
                                <h6 class="logo-title brand-name-small">Offroad Paradise</h6>
                            </div>
                        </a>
                    </div>
               
            </div>
        </div>
    </footer>    
    
@endsection

@section('css')
        <style>
        body {
            padding-left: 0px;
            padding-right: 0px;
        }
        .fixed-sidebar-left {
            background-color: #212529;
        }
        .fixed-sidebar-right {
            background-color: #212529;
        }
        .olympus-chat {
            background-color: #212529;
        }
        .page-has-right-panels {
            padding-right: 0px;
        }
        .page-has-left-panels {
            padding-left: 0px;
        }
        .header-spacer {
            display: block;
            height: 70px;
        }              
        </style>
    @endsection

    @section('scripts')
    <script>       
        // let logo = '<div class="col-sm"><a href="#" class="logo"><div class="img-wrap"><img src="{{ asset("img/4x4_white_small.png") }}" alt="offroad"></div></a></div>';
        // let siteHeader = document.querySelector('.header');
        // siteHeader.insertAdjacentHTML('afterbegin', logo);
    </script>    
    @endsection
