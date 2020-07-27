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
		<h6>Ваша страница</h6>
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

			<div class="control-icon more has-items">
				<svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
				<div class="label-avatar bg-blue">6</div>

				<div class="more-dropdown more-with-triangle triangle-top-center">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">Запросы в друзья</h6>
						<a href="#">Найти друзей</a>
						<a href="#">Настройки</a>
					</div>

					<div class="mCustomScrollbar" data-mcs-theme="dark">
						<ul class="notification-list friend-requests">
							<li>
								<div class="author-thumb">
									<img src="{{ asset('img/spiegel.jpg') }}" alt="author">
								</div>
								<div class="notification-event">
									<a href="#" class="h6 notification-friend">spiegel</a>
									<span class="chat-message-item">spiegel</span>
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
									<span class="chat-message-item">4 друга </span>
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
									Вы и <a href="#" class="h6 notification-friend">spiegel</a> <a href="#" class="notification-link">spiegel</a>.
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
									<span class="chat-message-item"></span>
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
					</div>

					<a href="#" class="view-all bg-blue">Добавить всех</a>
				</div>
			</div>

			<div class="control-icon more has-items">
				<svg class="olymp-chat---messages-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-chat---messages-icon') }}"></use></svg>
				<div class="label-avatar bg-purple">2</div>

				<div class="more-dropdown more-with-triangle triangle-top-center">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">Чат / Сообщения</h6>
						<a href="#">Пометить всё о прочтении</a>
						<a href="#">Настройки</a>
					</div>

					<div class="mCustomScrollbar" data-mcs-theme="dark">
						<ul class="notification-list chat-message">
							<li class="message-unread">
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
									<span class="chat-message-item">spiegel spiegel spiegel spiegel spiegel</span>
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
									<a href="#" class="h6 notification-friend">spiegelspiegel &amp; Jet +3</a>
									<span class="last-message-author">spiegel:</span>
									<span class="chat-message-item">spiegelspiegelspiegel</span>
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
					</div>

					<a href="#" class="view-all bg-purple">Показать все сообщения</a>
				</div>
			</div>

			<div class="control-icon more has-items">
				<svg class="olymp-thunder-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-thunder-icon') }}"></use></svg>

				<div class="label-avatar bg-primary">8</div>

				<div class="more-dropdown more-with-triangle triangle-top-center">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">Оповещения</h6>
						<a href="#">Пометить все прочтено</a>
						<a href="#">Настройки</a>
					</div>

					<div class="mCustomScrollbar" data-mcs-theme="dark">
						<ul class="notification-list">
							<li>
								<div class="author-thumb">
									<img src="{{ asset('img/spiegel.jpg') }}" alt="author">
								</div>
								<div class="notification-event">
									<div><a href="#" class="h6 notification-friend">spiegel</a> Прокомментировал <a href="#" class="notification-link">статус</a>.</div>
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
									<div>Вы и <a href="#" class="h6 notification-friend">spiegel</a> Добавил друга <a href="#" class="notification-link">на странице</a>.</div>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">9 часа назад</time></span>
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
									<div><a href="#" class="h6 notification-friend">spiegel</a> Прокомментировал <a href="#" class="notification-link">фото</a>.</div>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Вчера at 5:32am</time></span>
								</div>
									<span class="notification-icon">
										<svg class="olymp-comments-post-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-comments-post-icon') }}"></use></svg>
									</span>

								<div class="comment-photo">
									<img src="{{ asset('img/comment-photo1.jpg') }}" alt="photo">
									<span>“Lorem”</span>
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
									<div><a href="#" class="h6 notification-friend">spiegel</a> spiegel spiegel spiegel spiegel <a href="#" class="notification-link">Gotham Bar</a>.</div>
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
									<div><a href="#" class="h6 notification-friend">spiegel</a> spiegel spiegel spiegel spiegel <a href="#" class="notification-link">profile status</a>.</div>
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
					</div>

					<a href="#" class="view-all bg-primary">Показать все оповещения</a>
				</div>
			</div>

			<div class="author-page author vcard inline-items more">
				<div class="author-thumb">
					<img alt="author" src="{{ asset('img/ii.jpg') }}" class="avatar">
					<span class="icon-status online"></span>
					<div class="more-dropdown more-with-triangle">
						<div class="mCustomScrollbar" data-mcs-theme="dark">
							<div class="ui-block-title ui-block-title-small">
								<h6 class="title">Your Account</h6>
							</div>

							<ul class="account-settings">
								<li>
									<a href="">

										<svg class="olymp-menu-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-menu-icon') }}"></use></svg>

										<span>Настройки профиля</span>
									</a>
								</li>
								<li>
									<a href="">
										<svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FAV PAGE"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-star-icon') }}"></use></svg>

										<span>Создать пост</span>
									</a>
								</li>
								<li>
									<a href="#">
										<svg class="olymp-logout-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-logout-icon') }}"></use></svg>

										<span>Выйти</span>
									</a>
								</li>
							</ul>

							<div class="ui-block-title ui-block-title-small">
								<h6 class="title">Настройки чата</h6>
							</div>

							<ul class="chat-settings">
								<li>
									<a href="#">
										<span class="icon-status online"></span>
										<span>Online</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="icon-status away"></span>
										<span>Отошел</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="icon-status disconected"></span>
										<span>Вне доступа</span>
									</a>
								</li>

								<li>
									<a href="#">
										<span class="icon-status status-invisible"></span>
										<span>Невидимка</span>
									</a>
								</li>
							</ul>

							<div class="ui-block-title ui-block-title-small">
								<h6 class="title">Индивидуальный статус</h6>
							</div>

							<form class="form-group with-button custom-status">
								<input class="form-control" placeholder="" type="text" value="Следопыт">

								<button class="bg-purple">
									<svg class="olymp-check-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-check-icon') }}"></use></svg>
								</button>
							</form>

							<div class="ui-block-title ui-block-title-small">
								<h6 class="title">Правила сайта</h6>
							</div>

							<ul>
								<li>
									<a href="#">
										<span>Термины и определения</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span>FAQs</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span>Полезная информация</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span>Контакты</span>
									</a>
								</li>
							</ul>
						</div>

					</div>
				</div>
				<a href="" class="author-name fn">
					<div class="author-title">
						Иванов Иван <svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon') }}"></use></svg>
					</div>
					<span class="author-subtitle">Следопыт</span>
				</a>
			</div>

		</div>
	</div>

</header>

<!-- ... окончание Header -->

@yield('content')

</body>
</html>
