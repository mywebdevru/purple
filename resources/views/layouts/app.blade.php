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
    <livewire:styles />
    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
            padding: 0;
            margin: 10px;
        }
        .new-image-wrapper {
            position: relative;
            width: 100%;
        }

        .new-image-wrapper .message {
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .loading-img-wrapper {
            background-color: rgba(255, 255, 255, .8);
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left:0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #ff5e3a;
            font-weight : 800;
            font-size: 3rem;
        }

        .loading-img-wrapper .skills-item-meter {
            width: 80%;
            height: 10px;
            position: relative;
            margin-top: 2rem;
        }

        input[type=file]:hover {
            cursor: pointer;
        }

        .map-name {
            border-color: none;
            padding: 0.5rem;
        }

        /* .loading-img-wrapper div progress {
            width: 100%;
            background-color:#ff5e3a;
        } */
    </style>
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
	<div class="header-content-wrapper">
		<form class="search-bar w-search notification-list friend-requests">
			<div class="form-group with-button">
				<input class="form-control js-user-search" placeholder="Поиск друзей или информации . . . " type="text">
				<button>
					<svg class="olymp-magnifying-glass-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon') }}"></use></svg>
				</button>
			</div>
        </form>
        @auth
            <x-header.control-block/>
        @else
            <div class="control-block">
                <div class="nav-item text-light">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                </div>
                @if (Route::has('register'))
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                    </div>
                @endif
            </div>
        @endauth
	</div>
</header>
<!-- ... окончание Header -->
@component('user.components.header.mobile.mobile_header')@endcomponent
@auth
    <x-left-sidebar/>
    <div id="right-sidebar">
        <right-sidebar></right-sidebar>
    </div>
@endauth
<div class="header-spacer"></div>

@yield('content')

<!-- Scripts -->
<livewire:scripts />
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/libs.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>

@auth
<script src="{{ asset('js/chat.js') }}"></script>
<script src="{{ asset('js/enable-push.js') }}"></script>
@endauth

@yield('scripts')
<script>
    function acceptFriendshipRequest(item)
    {

    }
    function acceptAllFriendshipRequests(item)
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.ajax({
            type: "post",
            url: `${document.location.origin}/user/edit/friends`,
            data: {'getThemAll': 1},
            dataType: "JSON",
            success: function (response) {
                console.log(response)
                if(!!response){
                    item.parents('.more-dropdown').find('.friend-requests').html('<div class="text-center">Запросов нет</div>')
                    item.parents('.control-icon').find('.requests_count').text('0')

                }
            }
        })
    }
    function deleteFriendshipRequest(item)
    {
        let id = item.data('id')
        let request = item.parents('li')
        let requestsCount = +item.parents('.control-icon').find('.requests_count').text()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.ajax({
            type: "delete",
            url: `${document.location.origin}/user/friendship_request/${id}`,
            data: '',
            dataType: "JSON",
            success: function (response) {
                if(!!response['deleted']){
                    request.slideUp(300)
                    item.parents('.control-icon').find('.requests_count').text(--requestsCount)
                }
            }
        })
    }
    $('.control-block').on('click', '.requested_friendship_delete', function (e){
        e.preventDefault()
        deleteFriendshipRequest($(this))
    })
    .on('click', '.requested_friendship_accept', function (e){
        e.preventDefault()
        console.log($(this))
        if($(this).data('id') == 'all') {
            acceptAllFriendshipRequests($(this))
            console.log('all')
        } else {
            acceptFriendshipRequest($(this))
        }
    })
</script>
</body>
</html>
