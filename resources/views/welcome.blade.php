@extends('layouts.app')

@section('content')
    <div class="view bgi" style="margin-left: -70px; margin-top: -70px;">
        <div class="row h-100 w-100">
            <div class="col-sm-12 my-auto helloblock" style="padding-left: 70px">
                @auth
                    <h1 class="text-white">{{ auth()->user()->full_name }} Добро пожаловать в</h1>
                    <h1 class="text-white">OFFROAD PARADISE</h1>
                    <h3 class="text-white">Социальная сеть авторских путешествий</h3>
                    <a href="{{ route('user.show', ['user' => auth()->user()]) }}" class="btn btn-outline-dark hello-btn">Моя страница</a>
                @else
                    <h1 class="text-white">OFFROAD PARADISE</h1>
                    <h3 class="text-white">Поделись своим - авторским путешествием!</h3>
                    <a href="{{ route('login') }}" class="btn btn-outline-dark hello-btn">Войти</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-dark hello-btn reg">Зарегистрироваться</a>
                @endauth
            </div>
        </div>
    </div>
@endsection
