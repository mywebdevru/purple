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
        <x-header.control-block/>
	</div>
</header>
<!-- ... окончание Header -->
@component('user.components.header.mobile.mobile_header')@endcomponent
@auth
    <x-left-sidebar/>
    <x-right-sidebar/>
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
<script>
 function acceptFriendshipRequest()
 {

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
</script>
</body>
</html>
