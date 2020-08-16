<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'OffRoad Paradise') }}</title>

	<link rel="stylesheet" href="{{ asset('css/fm.revealator.jquery.css') }}">

	<!-- Main Styles CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

    @yield('css')
</head>

<body class="page-has-left-panels page-has-right-panels">
<!-- Header -->

<header class="header" id="site-header">

	<div class="page-title">
		<h6>OffRoad Paradise</h6>
	</div>

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
                @component('user.components.header.control_block_item',['count' => auth()->user()->requested_friendships_count])
                    @slot('icon')
                        <svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
                        <div class="label-avatar bg-blue">{{ auth()->user()->requested_friendships_count }}</div>
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
<script src="{{ asset('js/main.js') }}"></script>
@yield('scripts')
<script>
    function like_it(id, model)
    {
        // console.log($('#form_like_'+ model +'_' + id + ' input[name="_method"]'))
        let route ='../like';
        if($('#like_' + model + '_' + id).hasClass('like_it')){
            route = route + '/' + $('#like_' + model + '_' + id).data('like_id')
            $('#form_like_'+ model +'_' + id).append('<input type="hidden" name="_method" value="DELETE">')
        }

        $.ajax({
            type: "POST",
            url: route,
            data: $('#form_like_'+ model +'_' + id).serialize(),
            dataType: "JSON",
            success: function (response) {
                if(!!response['error']){
                    console.log(response['error'])
                }
                $('#avatars_' + model + '_' + id).html('')
                $('#names_' + model + '_' + id).html('')
                count = response['likes'].length
                if(model != 'comment'){
                renderLikedUsers(response, model, id, count)
                }
                if(!!response['like_id']){
                    console.log(response['likes'])
                    $('#like_' + model + '_' + id)
                    .toggleClass('like_it')
                    .data('like_id', response['like_id'])
                    $('#like_' + model + '_' + id + ' span').text(count)
                }
                if(!!response['delete']){
                    $('#form_like_'+ model +'_' + id + ' input[name="_method"]').detach()
                    $('#like_' + model + '_' +id)
                    .toggleClass('like_it')
                    .data('like_id', 0)
                    $('#like_' + model + '_' + id + ' span').text(count)
                }
            }
        });
    }
    function renderLikedUsers(response, model, id, count)
    {
        if(count > 2) {
            likes = response['likes'].slice(-2)
        } else {
            likes = response['likes']
        }
        likes.forEach(like => {
            $('#avatars_' + model + '_' + id).append(`<li><a href="{{ URL::to('/') }}/user/${like['authorable']['id']}">
                <img src="{{ URL::to('/') }}/${like['authorable']['avatar']}" alt="${like['authorable']['full_name']}">
            </a></li>`)
            $('#names_' + model + '_' + id).append(`<a href="{{ URL::to('/') }}/user/${like['authorable']['id']}">${like['authorable']['name']} </a>`)
        });
        if (count > 2) {
            $('#names_' + model + '_' + id).append(` и еще <br>${count - 2} человк(а)`)
        }
    }

    function showComments(list, model)
    {
        console.log(list)
        let  commentsLists = $('#comments_list_' + model + list)
        commentsLists.slideToggle()
        if($('#comments_' + model + list + ' span').text() =='+'){
            $('#comments_' + model + list).html('Скрыть комментарии <span>-</span>')
            $('#write_comment_' + model + list).slideDown()
        } else {
            $('#comments_' + model + list).html('Показать комментарии <span>+</span>')
            $('#write_comment_' + model + list).slideUp()
        }

    }

    function writeComment(form, model)
    {
        console.log(form)
        let  commentForm = $('#write_comment_' + model + form)
        commentForm.slideToggle()
    }
</script>
</body>
</html>
