<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'OffRoad Paradise') }}</title>


	<!-- Main Styles CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.css" rel="stylesheet">

    @yield('css')
</head>

<body class="page-has-left-panels page-has-right-panels">
<!-- Header -->

<header class="header" id="site-header">

    <a href="{{ route('welcome') }}" class="logo head-logo">
        <div class="img-wrap head-img-wrap">
            <img src="{{ asset('img/4x4_white_small.png') }}" alt="offroad">
        </div>
        <div class="title-block">
            <h6 class="logo-title brand-name-small">Offroad Paradise</h6>
        </div>
    </a>

	<!-- <div class="page-title">
		<h6 class="brand-name-small">OffRoad Paradise</h6>
	</div> -->

	<div class="header-content-wrapper">
		<form class="search-bar w-search notification-list friend-requests">
			<div class="form-group with-button">
				<input class="form-control js-user-search" placeholder="Поиск друзей или информации . . . " type="text">
				<button>
					<svg class="olymp-magnifying-glass-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon') }}"></use></svg>
				</button>
			</div>
		</form>

        <!-- <a href="#" class="link-find-friend">Поиск друзей</a> -->
        <div class="control-block">
            @auth
                @component('user.components.header.control_block_item',['count' => count(auth()->user()->requestedFriendships)])
                    @slot('icon')
                        <svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
                        <div class="label-avatar bg-blue">{{ count(auth()->user()->requestedFriendships) }}</div>
                    @endslot
                    @slot('title')
                        Они хотят дружить
                    @endslot
                    @slot('notification')
                        @each('user.components.header.friendship_request', auth()->user()->requestedFriendships, 'request')
                    @endslot
                    @slot('button')
                        <a class="view-all bg-blue" href="#" onclick="event.preventDefault(); document.getElementById('accept-all-friends').submit();">      Добавить всех
                        </a>
                        <form id="accept-all-friends" action="{{ route('user.friends.store') }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="requested_friendship" value="{{ auth()->user()->requestedFriendships }}">
                        </form>
                    @endslot
                @endcomponent
                @component('user.components.header.alert_chat_message') @endcomponent
                @component('user.components.header.alert_activity') @endcomponent
                @component('user.components.header.page_owner', ['full_name' => auth()->user()->full_name, 'creed' => auth()->user()->creed, 'avatar' => auth()->user()->avatar, 'id' => auth()->user()->id])
                @endcomponent
            @else
                    <div class="nav-item text-light">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                    </div>
                    @if (Route::has('register'))
                        <div class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                        </div>
                    @endif
            @endauth
        </div>
	</div>
</header>
<!-- ... окончание Header -->
@component('user.components.header.mobile.mobile_header')@endcomponent
@auth
    @component('user.components.left.l_sidebar')@endcomponent
    @component('user.components.right.r_sidebar', ['friends' => auth()->user()->friends])@endcomponent
@endauth
<div class="header-spacer"></div>

@yield('content')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/x3mart.js') }}"></script>
<script src="{{ asset('js/libs.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

@yield('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.js"></script>
</body>
</html>
