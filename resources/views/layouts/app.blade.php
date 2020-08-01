<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'OffRoad Paradise') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

	<link rel="stylesheet" href="{{ asset('css/fm.revealator.jquery.css') }}">

	<!-- Main Styles CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

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
                @component('user.components.header.control_block_item',['count' => $user->friendship_requests_count])
                    @slot('icon')
                        <svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
                        <div class="label-avatar bg-blue">{{ $user->friendship_requests_count }}</div>
                    @endslot
                    @slot('title')
                        Они хотят дружить
                    @endslot
                    @slot('notification')
                        @each('user.components.header.friendship_request', $user->friendshipRequests, 'request')
                    @endslot
                    @slot('button')
                        <a class="view-all bg-blue" href="#" onclick="event.preventDefault(); document.getElementById('accept-all-friends').submit();">      Добавить всех
                        </a>
                        <form id="accept-all-friends" action="{{ route('friend.store') }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="requested_friendship" value="{{ $user->friendshipRequests }}">
                        </form>
                    @endslot
                @endcomponent
                @component('user.components.header.alert_chat_message') @endcomponent
                @component('user.components.header.alert_activity') @endcomponent
                @component('user.components.header.page_owner', ['full_name' => $user->full_name, 'creed' => $user->creed, 'avatar' => $user->avatar]) @endcomponent
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

<!-- Header под мобилу -->

<header class="header header-responsive" id="site-header-responsive">

	<div class="header-content-wrapper">
		<ul class="nav nav-tabs mobile-app-tabs" role="tablist">
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#request" role="tab">
					<div class="control-icon has-items">
						<svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
						<div class="label-avatar bg-blue">6</div>
					</div>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#chat" role="tab">
					<div class="control-icon has-items">
						<svg class="olymp-chat---messages-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-chat---messages-icon') }}"></use></svg>
						<div class="label-avatar bg-purple">2</div>
					</div>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#notification" role="tab">
					<div class="control-icon has-items">
						<svg class="olymp-thunder-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-thunder-icon') }}"></use></svg>
						<div class="label-avatar bg-primary">8</div>
					</div>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#search" role="tab">
					<svg class="olymp-magnifying-glass-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon') }}"></use></svg>
					<svg class="olymp-close-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-close-icon') }}"></use></svg>
				</a>
			</li>
		</ul>
	</div>

	<!-- Tab panes -->
	<div class="tab-content tab-content-responsive">

		<div class="tab-pane " id="request" role="tabpanel">

			<div class="mCustomScrollbar" data-mcs-theme="dark">
				<div class="ui-block-title ui-block-title-small">
					<h6 class="title">Запросы на добавление в друзья</h6>
					<a href="#">Найти друзей</a>
					<a href="#">Настройки</a>
				</div>
				<ul class="notification-list friend-requests">
					<li>
						<div class="author-thumb">
							<img src="{{ asset('img/spiegel.jpg') }}" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">spiegel</a>
							<span class="chat-message-item">spiegel spiegel spiegel</span>
						</div>
									<span class="notification-icon">
										<a href="#" class="accept-request">
											<span class="icon-add without-text">
												<svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
											</span>
										</a>

										<a href="#" class="accept-request request-del">
											<span class="icon-minus">
												<svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
											</span>
										</a>

									</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use></svg>
						</div>
					</li>
					<li>
						<div class="author-thumb">
							<img src="{{ asset('img/spiegel.jpg') }}" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">spiegel</a>
							<span class="chat-message-item">4 Друга</span>
						</div>
									<span class="notification-icon">
										<a href="#" class="accept-request">
											<span class="icon-add without-text">
												<svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
											</span>
										</a>

										<a href="#" class="accept-request request-del">
											<span class="icon-minus">
												<svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
											</span>
										</a>

									</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use></svg>
						</div>
					</li>
					<li class="accepted">
						<div class="author-thumb">
							<img src="{{ asset('img/spiegel.jpg') }}" alt="author">
						</div>
						<div class="notification-event">
							Вы и <a href="#" class="h6 notification-friend">spiegel</a> <a href="#" class="notification-link"></a>.
						</div>
									<span class="notification-icon">
										<svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
									</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-little-delete') }}"></use></svg>
						</div>
					</li>
					<li>
						<div class="author-thumb">
							<img src="{{ asset('img/spiegel.jpg') }}" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">spiegel</a>
							<span class="chat-message-item">9 Друга</span>
						</div>
									<span class="notification-icon">
										<a href="#" class="accept-request">
											<span class="icon-add without-text">
												<svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
											</span>
										</a>

										<a href="#" class="accept-request request-del">
											<span class="icon-minus">
												<svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
											</span>
										</a>

									</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use></svg>
						</div>
					</li>
				</ul>
				<a href="#" class="view-all bg-blue">Добавить всех</a>
			</div>

		</div>

		<div class="tab-pane " id="chat" role="tabpanel">

			<div class="mCustomScrollbar" data-mcs-theme="dark">
				<div class="ui-block-title ui-block-title-small">
					<h6 class="title">Чат / Сообщения</h6>
					<a href="#">Отметить прочитанным</a>
					<a href="#">Настройки</a>
				</div>

				<ul class="notification-list chat-message">
					<li class="message-unread">
						<div class="author-thumb">
							<img src="{{ asset('img/spiegel.jpg') }}" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">spiegel</a>
							<span class="chat-message-item">spiegel spiegel spiegel spiegel spiegel spiegel spiegel</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 часа назад</time></span>
						</div>
									<span class="notification-icon">
										<svg class="olymp-chat---messages-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-chat---messages-icon') }}"></use></svg>
									</span>
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use></svg>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="{{ asset('img/spiegel.jpg') }}" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">spiegel</a>
							<span class="chat-message-item">spiegel spiegel spiegel spiegel spiegel</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 часа назад</time></span>
						</div>
									<span class="notification-icon">
										<svg class="olymp-chat---messages-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-chat---messages-icon') }}"></use></svg>
									</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use></svg>
						</div>
					</li>
					<li>
						<div class="author-thumb">
							<img src="{{ asset('img/spiegel.jpg') }}" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">spiegel</a>
							<span class="chat-message-item"> spiegel spiegel spiegel spiegel spiegel</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Вчера at 9:56pm</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-chat---messages-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-chat---messages-icon') }}"></use></svg>
										</span>
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use></svg>
						</div>
					</li>

					<li class="chat-group">
						<div class="author-thumb">
							<img src="{{ asset('img/spiegel.jpg') }}" alt="author">
							<img src="{{ asset('img/spiegel.jpg') }}" alt="author">
							<img src="{{ asset('img/spiegel.jpg') }}" alt="author">
							<img src="{{ asset('img/spiegel.jpg') }}" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Вы, spiegel, spiegel &amp; Jet +3</a>
							<span class="last-message-author">Вы:</span>
							<span class="chat-message-item">spiegel spiegel spiegel</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 16th at 10:23am</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-chat---messages-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-chat---messages-icon') }}"></use></svg>
										</span>
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use></svg>
						</div>
					</li>
				</ul>

				<a href="#" class="view-all bg-purple">Показать все сообщения</a>
			</div>

		</div>

		<div class="tab-pane " id="notification" role="tabpanel">

			<div class="mCustomScrollbar" data-mcs-theme="dark">
				<div class="ui-block-title ui-block-title-small">
					<h6 class="title">Настройки</h6>
					<a href="#">Пометить как прочитанное</a>
					<a href="#">Настройки</a>
				</div>

				<ul class="notification-list">
					<li>
						<div class="author-thumb">
							<img src="{{ asset('img/spiegel.jpg') }}" alt="author">
						</div>
						<div class="notification-event">
							<div><a href="#" class="h6 notification-friend">spiegel</a> <a href="#" class="notification-link"></a>.</div>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 часа назад</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-comments-post-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-comments-post-icon') }}"></use></svg>
										</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-little-delete') }}"></use></svg>
						</div>
					</li>

					<li class="un-read">
						<div class="author-thumb">
							<img src="{{ asset('img/spiegel.jpg') }}" alt="author">
						</div>
						<div class="notification-event">
							<div>Вы и <a href="#" class="h6 notification-friend">spiegel</a> <a href="#" class="notification-link"></a>.</div>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">9 часов назад</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
										</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-little-delete') }}"></use></svg>
						</div>
					</li>

					<li class="with-comment-photo">
						<div class="author-thumb">
							<img src="{{ asset('img/spiegel.jpg') }}" alt="author">
						</div>
						<div class="notification-event">
							<div><a href="#" class="h6 notification-friend">spiegel</a> <a href="#" class="notification-link"></a>.</div>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Вчера at 5:32am</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-comments-post-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-comments-post-icon') }}"></use></svg>
										</span>

						<div class="comment-photo">
							<img src="{{ asset('img/comment-photo1.jpg') }}" alt="photo">
							<span>“”</span>
						</div>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-little-delete') }}"></use></svg>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="{{ asset('img/spiegel.jpg') }}" alt="author">
						</div>
						<div class="notification-event">
							<div><a href="#" class="h6 notification-friend">spiegel</a> <a href="#" class="notification-link"></a>.</div>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 5th at 6:43pm</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
										</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-little-delete') }}"></use></svg>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="{{ asset('img/spiegel.jpg') }}" alt="author">
						</div>
						<div class="notification-event">
							<div><a href="#" class="h6 notification-friend">spiegel</a> <a href="#" class="notification-link"></a>.</div>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 2nd at 8:29pm</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-heart-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-heart-icon') }}"></use></svg>
										</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-little-delete') }}"></use></svg>
						</div>
					</li>
				</ul>

				<a href="#" class="view-all bg-primary">Показать все уведомления</a>
			</div>

		</div>

		<div class="tab-pane " id="search" role="tabpanel">


				<form class="search-bar w-search notification-list friend-requests">
					<div class="form-group with-button">
						<input class="form-control js-user-search" placeholder="Поиск друзей или страниц..." type="text">
					</div>
				</form>


		</div>

	</div>

</header>

<!-- ... окончание Header под мобилу -->


@yield('content')

</body>
</html>
