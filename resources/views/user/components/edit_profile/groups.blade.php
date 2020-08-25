@extends('layouts.app')

@section('content')
    @component('user.components.wallpaper_block.main', ['data' => $user, 'user' => $user])@endcomponent

    <a class="back-to-top" href="#">
        <img src="../../svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
    </a>

    <div class="container pl-4">
        Ваш код здесь. Но стили этого дива можно поменять.
    </div>
@endsection
