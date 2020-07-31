<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Профиль</title>
    <!-- Подключаю скрипты и CDN на всякий случай -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
    <!-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- Локальные стили, чтобы точно всё работало -->
	<link rel="stylesheet" href="css/fm.revealator.jquery.css">


    <!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-grid.css">

	<!-- Main Styles CSS -->
	<link rel="stylesheet" type="text/css" href="css/fonts.min.css">
	<link rel="stylesheet" type="text/css" href="css/app.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
</head>

<body class="page-has-left-panels page-has-right-panels">


<!-- Левый сайдбар -->


<div class="fixed-sidebar">
	<div class="fixed-sidebar-left sidebar--small" id="sidebar-left">

		<a href="#" class="logo">
			<div class="img-wrap">
				<img src="img/4x4_white.png" alt="offroad">
			</div>
		</a>

		<div class="mCustomScrollbar" data-mcs-theme="dark">
			<ul class="left-menu">
				<li>
					<a href="#" class="js-sidebar-open">
						<svg class="olymp-menu-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Открыть меню"><use xlink:href="svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="Лента событий"><use xlink:href="svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use></svg>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Избранное"><use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-happy-faces-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Группы"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-faces-icon"></use></svg>
					</a>
				</li>				
				<li>
					<a href="#">
						<svg class="olymp-calendar-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Календарь"><use xlink:href="svg-icons/sprites/icons.svg#olymp-calendar-icon"></use></svg>
					</a>
				</li>				
			</ul>
		</div>
	</div>

	<div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1">
		<a href="#" class="logo">
			<div class="img-wrap">
				<img src="img/4x4_white_small.png" alt="offroad">
			</div>
			<div class="title-block">
				<h6 class="logo-title">Offroad</h6>
			</div>
		</a>

		<div class="mCustomScrollbar" data-mcs-theme="dark">
			<ul class="left-menu">
				<li>
					<a href="#" class="js-sidebar-open">
						<svg class="olymp-close-icon left-menu-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
						<span class="left-menu-title">Закрыть меню</span>
					</a>
				</li>
				<li>
					<a href="">
						<svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="NEWSFEED"><use xlink:href="svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use></svg>
						<span class="left-menu-title">Лента событий</span>
					</a>
				</li>
				<li>
					<a href="">
						<svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FAV PAGE"><use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
						<span class="left-menu-title">Избранное</span>
					</a>
				</li>
				<li>
					<a href="">
						<svg class="olymp-happy-faces-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FRIEND GROUPS"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-faces-icon"></use></svg>
						<span class="left-menu-title">Группы</span>
					</a>
				</li>				
				<li>
					<a href="">
						<svg class="olymp-calendar-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="CALENDAR AND EVENTS"><use xlink:href="svg-icons/sprites/icons.svg#olymp-calendar-icon"></use></svg>
						<span class="left-menu-title">Календарь</span>
					</a>
				</li>				
			</ul>

			<div class="profile-completion">

				<div class="skills-item">
					<div class="skills-item-info">
						<span class="skills-item-title">Профиль заполнен</span>
						<span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="76" data-from="0"></span><span class="units">76%</span></span>
					</div>
					<div class="skills-item-meter">
						<span class="skills-item-meter-active bg-primary" style="width: 76%"></span>
					</div>
				</div>

				<span>Заполните <a href="#">свой профиль</a> чтобы пользователи больше о вас узнали</span>

			</div>
		</div>
	</div>
</div>

<!-- ... окончание левого сайдбара -->


<!-- Левый сайдбар под мобилу -->

<div class="fixed-sidebar fixed-sidebar-responsive">

	<div class="fixed-sidebar-left sidebar--small" id="sidebar-left-responsive">
		<a href="#" class="logo js-sidebar-open">
			<img src="img/4x4_white.png" alt="offroad">
		</a>

	</div>

	<div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1-responsive">
		<a href="#" class="logo">
			<div class="img-wrap">
				<img src="img/4x4_white_small.png" alt="offroad">
			</div>
			<div class="title-block">
				<h6 class="logo-title">Offroad</h6>
			</div>
		</a>

		<div class="mCustomScrollbar" data-mcs-theme="dark">

			<div class="control-block">
				<div class="author-page author vcard inline-items">
					<div class="author-thumb">
						<img alt="author" src="img/ii.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>
					<a href="#" class="author-name fn">
						<div class="author-title">
							Иванов Иван <svg class="olymp-dropdown-arrow-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
						</div>
						<span class="author-subtitle">Следопыт</span>
					</a>
				</div>
			</div>

			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">Главное меню</h6>
			</div>

			<ul class="left-menu">
				<li>
					<a href="#" class="js-sidebar-open">
						<svg class="olymp-close-icon left-menu-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
						<span class="left-menu-title">Закрыть меню</span>
					</a>
				</li>
				<li>
					<a href="">
						<svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="Лента событий"><use xlink:href="svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use></svg>
						<span class="left-menu-title">Лента событий</span>
					</a>
				</li>
				<li>
					<a href="">
						<svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Избранное"><use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
						<span class="left-menu-title">Избранное</span>
					</a>
				</li>
				<li>
					<a href="">
						<svg class="olymp-happy-faces-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Группы"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-faces-icon"></use></svg>
						<span class="left-menu-title">Группы</span>
					</a>
				</li>				
				<li>
					<a href="">
						<svg class="olymp-calendar-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Календарь"><use xlink:href="svg-icons/sprites/icons.svg#olymp-calendar-icon"></use></svg>
						<span class="left-menu-title">Календарь</span>
					</a>
				</li>				
			</ul>

			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">Ваш профиль</h6>
			</div>

			<ul class="account-settings">
				<li>
					<a href="#">

						<svg class="olymp-menu-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>

						<span>Настройки профиля</span>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FAV PAGE"><use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>

						<span>Создать пост</span>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-logout-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-logout-icon"></use></svg>

						<span>Выйти</span>
					</a>
				</li>
			</ul>

			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">Правила сайта</h6>
			</div>

			<ul class="about-olympus">
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

<!-- ... окончание левого сайдбара под мобилу -->


<!-- Правый сайдбар -->

<div class="fixed-sidebar right">
	<div class="fixed-sidebar-right sidebar--small" id="sidebar-right">

		<div class="mCustomScrollbar" data-mcs-theme="dark">
			<ul class="chat-users">
				<li class="inline-items js-chat-open">
					<div class="author-thumb">
						<img alt="author" src="img/spiegel.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>
				</li>
				<li class="inline-items js-chat-open">
					<div class="author-thumb">
						<img alt="author" src="img/spiegel.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>
				</li>

				<li class="inline-items js-chat-open">
					<div class="author-thumb">
						<img alt="author" src="img/spiegel.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>
				</li>

				<li class="inline-items js-chat-open">
					<div class="author-thumb">
						<img alt="author" src="img/spiegel.jpg" class="avatar">
						<span class="icon-status away"></span>
					</div>
				</li>

				<li class="inline-items js-chat-open">
					<div class="author-thumb">
						<img alt="author" src="img/spiegel.jpg" class="avatar">
						<span class="icon-status disconected"></span>
					</div>
				</li>
			</ul>
		</div>

		<div class="search-friend inline-items">
			<a href="#" class="js-sidebar-open">
				<svg class="olymp-menu-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
			</a>
		</div>

		<a href="#" class="olympus-chat inline-items js-chat-open">
			<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
		</a>

	</div>

	<div class="fixed-sidebar-right sidebar--large" id="sidebar-right-1">

		<div class="mCustomScrollbar" data-mcs-theme="dark">

			<div class="ui-block-title ui-block-title-small">
				<a href="#" class="title">Друзья</a>
				<a href="#">Настройки</a>
			</div>

			<ul class="chat-users">
				<li class="inline-items js-chat-open">

					<div class="author-thumb">
						<img alt="author" src="img/spiegel.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>

					<div class="author-status">
						<a href="#" class="h6 author-name">spiegel</a>
						<span class="status">ONLINE</span>
					</div>

					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>

						<ul class="more-icons">
							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use></svg>
							</li>
						</ul>

					</div>

				</li>
				<li class="inline-items js-chat-open">

					<div class="author-thumb">
						<img alt="author" src="img/spiegel.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>

					<div class="author-status">
						<a href="#" class="h6 author-name">spiegel</a>
						<span class="status">AT WORK!</span>
					</div>

					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>

						<ul class="more-icons">
							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use></svg>
							</li>
						</ul>

					</div>

				</li>

				<li class="inline-items js-chat-open">


					<div class="author-thumb">
						<img alt="author" src="img/spiegel.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>

					<div class="author-status">
						<a href="#" class="h6 author-name">spiegel</a>
						<span class="status">ONLINE</span>
					</div>

					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>

						<ul class="more-icons">
							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use></svg>
							</li>
						</ul>

					</div>


				</li>

				<li class="inline-items js-chat-open">


					<div class="author-thumb">
						<img alt="author" src="img/spiegel.jpg" class="avatar">
						<span class="icon-status away"></span>
					</div>

					<div class="author-status">
						<a href="#" class="h6 author-name">spiegel</a>
						<span class="status">AWAY</span>
					</div>

					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>

						<ul class="more-icons">
							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use></svg>
							</li>
						</ul>

					</div>


				</li>

				<li class="inline-items js-chat-open">


					<div class="author-thumb">
						<img alt="author" src="img/spiegel.jpg" class="avatar">
						<span class="icon-status disconected"></span>
					</div>

					<div class="author-status">
						<a href="#" class="h6 author-name">spiegel</a>
						<span class="status">OFFLINE</span>
					</div>

					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>

						<ul class="more-icons">
							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use></svg>
							</li>
						</ul>

					</div>


				</li>
			</ul>			

		</div>

		<div class="search-friend inline-items">
			<form class="form-group" >
				<input class="form-control" placeholder="Поиск друзей..." value="" type="text">
			</form>

			<a href="#" class="settings">
				<svg class="olymp-settings-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-settings-icon"></use></svg>
			</a>

			<a href="#" class="js-sidebar-open">
				<svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
			</a>
		</div>

		<a href="#" class="olympus-chat inline-items js-chat-open">

			<h6 class="olympus-chat-title">Чат</h6>
			<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
		</a>

	</div>
</div>

<!-- ... окончание правого сайдбара -->


<!-- Правый сайдбар под мобилу -->

<div class="fixed-sidebar right fixed-sidebar-responsive" id="sidebar-right-responsive">

	<div class="fixed-sidebar-right sidebar--small">
		<a href="#" class="js-sidebar-open">
			<svg class="olymp-menu-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
			<svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
		</a>
	</div>

	<div class="fixed-sidebar-right sidebar--large">
		<div class="mCustomScrollbar" data-mcs-theme="dark">

			<div class="ui-block-title ui-block-title-small">
				<a href="#" class="title">Друзья</a>
				<a href="#">Настройки</a>
			</div>

			<ul class="chat-users">
				<li class="inline-items js-chat-open">

					<div class="author-thumb">
						<img alt="author" src="img/spiegel.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>

					<div class="author-status">
						<a href="#" class="h6 author-name">spiegel</a>
						<span class="status">ONLINE</span>
					</div>

					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>

						<ul class="more-icons">
							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use></svg>
							</li>
						</ul>

					</div>

				</li>
				<li class="inline-items js-chat-open">

					<div class="author-thumb">
						<img alt="author" src="img/spiegel.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>

					<div class="author-status">
						<a href="#" class="h6 author-name">spiegel</a>
						<span class="status">AT WORK!</span>
					</div>

					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>

						<ul class="more-icons">
							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use></svg>
							</li>
						</ul>

					</div>

				</li>

				<li class="inline-items js-chat-open">


					<div class="author-thumb">
						<img alt="author" src="img/spiegel.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>

					<div class="author-status">
						<a href="#" class="h6 author-name">spiegel</a>
						<span class="status">ONLINE</span>
					</div>

					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>

						<ul class="more-icons">
							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use></svg>
							</li>
						</ul>

					</div>


				</li>

				<li class="inline-items js-chat-open">


					<div class="author-thumb">
						<img alt="author" src="img/spiegel.jpg" class="avatar">
						<span class="icon-status away"></span>
					</div>

					<div class="author-status">
						<a href="#" class="h6 author-name">spiegel</a>
						<span class="status">AWAY</span>
					</div>

					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>

						<ul class="more-icons">
							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use></svg>
							</li>
						</ul>

					</div>


				</li>

				<li class="inline-items js-chat-open">


					<div class="author-thumb">
						<img alt="author" src="img/spiegel.jpg" class="avatar">
						<span class="icon-status disconected"></span>
					</div>

					<div class="author-status">
						<a href="#" class="h6 author-name">spiegel</a>
						<span class="status">OFFLINE</span>
					</div>

					<div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>

						<ul class="more-icons">
							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use></svg>
							</li>

							<li>
								<svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use></svg>
							</li>
						</ul>

					</div>


				</li>
			</ul>			

		</div>

		<div class="search-friend inline-items">
			<form class="form-group" >
				<input class="form-control" placeholder="Поиск друзей..." value="" type="text">
			</form>

			<a href="" class="settings">
				<svg class="olymp-settings-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-settings-icon"></use></svg>
			</a>

			<a href="#" class="js-sidebar-open">
				<svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
			</a>
		</div>

		<a href="#" class="olympus-chat inline-items js-chat-open">

			<h6 class="olympus-chat-title">Чат</h6>
			<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
		</a>
	</div>

</div>

<!-- ... окончание правого сайдбара под мобилу -->


<!-- Header -->

<header class="header" id="site-header">

	<div class="page-title">
		<h6>Ваша страница</h6>
	</div>

	<div class="header-content-wrapper">
		<form class="search-bar w-search notification-list friend-requests">
			<div class="form-group with-button">
				<input class="form-control js-user-search" placeholder="Поиск друзей или информации . . . " type="text">
				<!-- <button>
					<svg class="olymp-magnifying-glass-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use></svg>
				</button> -->
			</div>
		</form>

		<!-- <a href="#" class="link-find-friend">Поиск друзей</a> -->

		<div class="control-block">

			<div class="control-icon more has-items">
				<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
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
									<img src="img/spiegel.jpg" alt="author">
								</div>
								<div class="notification-event">
									<a href="#" class="h6 notification-friend">spiegel</a>
									<span class="chat-message-item">spiegel</span>
								</div>
								<span class="notification-icon">
									<a href="#" class="accept-request">
										<span class="icon-add without-text">
											<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
										</span>
									</a>

									<a href="#" class="accept-request request-del">
										<span class="icon-minus">
											<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
										</span>
									</a>

								</span>

								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
								</div>
							</li>

							<li>
								<div class="author-thumb">
									<img src="img/spiegel.jpg" alt="author">
								</div>
								<div class="notification-event">
									<a href="#" class="h6 notification-friend">spiegel</a>
									<span class="chat-message-item">4 друга </span>
								</div>
								<span class="notification-icon">
									<a href="#" class="accept-request">
										<span class="icon-add without-text">
											<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
										</span>
									</a>

									<a href="#" class="accept-request request-del">
										<span class="icon-minus">
											<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
										</span>
									</a>

								</span>

								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
								</div>
							</li>

							<li class="accepted">
								<div class="author-thumb">
									<img src="img/spiegel.jpg" alt="author">
								</div>
								<div class="notification-event">
									Вы и <a href="#" class="h6 notification-friend">spiegel</a> <a href="#" class="notification-link">spiegel</a>.
								</div>
								<span class="notification-icon">
									<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
								</span>

								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
									<svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
								</div>
							</li>

							<li>
								<div class="author-thumb">
									<img src="img/spiegel.jpg" alt="author">
								</div>
								<div class="notification-event">
									<a href="#" class="h6 notification-friend">spiegel</a>
									<span class="chat-message-item"></span>
								</div>
								<span class="notification-icon">
									<a href="#" class="accept-request">
										<span class="icon-add without-text">
											<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
										</span>
									</a>

									<a href="#" class="accept-request request-del">
										<span class="icon-minus">
											<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
										</span>
									</a>

								</span>

								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
								</div>
							</li>

						</ul>
					</div>

					<a href="#" class="view-all bg-blue">Добавить всех</a>
				</div>
			</div>

			<div class="control-icon more has-items">
				<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
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
									<img src="img/spiegel.jpg" alt="author">
								</div>
								<div class="notification-event">
									<a href="#" class="h6 notification-friend">spiegel</a>
									<span class="chat-message-item">spiegel spiegel spiegel spiegel spiegel</span>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 часа назад</time></span>
								</div>
								<span class="notification-icon">
									<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
								</span>
								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
								</div>
							</li>

							<li>
								<div class="author-thumb">
									<img src="img/spiegel.jpg" alt="author">
								</div>
								<div class="notification-event">
									<a href="#" class="h6 notification-friend">spiegel</a>
									<span class="chat-message-item">spiegel spiegel spiegel spiegel spiegel</span>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 часа назад</time></span>
								</div>
								<span class="notification-icon">
									<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
								</span>

								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
								</div>
							</li>
							<li>
								<div class="author-thumb">
									<img src="img/spiegel.jpg" alt="author">
								</div>
								<div class="notification-event">
									<a href="#" class="h6 notification-friend">spiegel</a>
									<span class="chat-message-item">spiegel spiegel spiegel spiegel spiegel</span>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Вчера at 9:56pm</time></span>
								</div>
									<span class="notification-icon">
										<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
									</span>
								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
								</div>
							</li>

							<li class="chat-group">
								<div class="author-thumb">
									<img src="img/spiegel.jpg" alt="author">
									<img src="img/spiegel.jpg" alt="author">
									<img src="img/spiegel.jpg" alt="author">
									<img src="img/spiegel.jpg" alt="author">
								</div>
								<div class="notification-event">
									<a href="#" class="h6 notification-friend">spiegelspiegel &amp; Jet +3</a>
									<span class="last-message-author">spiegel:</span>
									<span class="chat-message-item">spiegelspiegelspiegel</span>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 16th at 10:23am</time></span>
								</div>
									<span class="notification-icon">
										<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
									</span>
								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
								</div>
							</li>
						</ul>
					</div>

					<a href="#" class="view-all bg-purple">Показать все сообщения</a>
				</div>
			</div>

			<div class="control-icon more has-items">
				<svg class="olymp-thunder-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-thunder-icon"></use></svg>

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
									<img src="img/spiegel.jpg" alt="author">
								</div>
								<div class="notification-event">
									<div><a href="#" class="h6 notification-friend">spiegel</a> Прокомментировал <a href="#" class="notification-link">статус</a>.</div>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 часа назад</time></span>
								</div>
									<span class="notification-icon">
										<svg class="olymp-comments-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
									</span>

								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
									<svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
								</div>
							</li>

							<li class="un-read">
								<div class="author-thumb">
									<img src="img/spiegel.jpg" alt="author">
								</div>
								<div class="notification-event">
									<div>Вы и <a href="#" class="h6 notification-friend">spiegel</a> Добавил друга <a href="#" class="notification-link">на странице</a>.</div>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">9 часа назад</time></span>
								</div>
									<span class="notification-icon">
										<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
									</span>

								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
									<svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
								</div>
							</li>

							<li class="with-comment-photo">
								<div class="author-thumb">
									<img src="img/spiegel.jpg" alt="author">
								</div>
								<div class="notification-event">
									<div><a href="#" class="h6 notification-friend">spiegel</a> Прокомментировал <a href="#" class="notification-link">фото</a>.</div>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Вчера at 5:32am</time></span>
								</div>
									<span class="notification-icon">
										<svg class="olymp-comments-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
									</span>

								<div class="comment-photo">
									<img src="img/comment-photo1.jpg" alt="photo">
									<span>“Lorem”</span>
								</div>

								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
									<svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
								</div>
							</li>

							<li>
								<div class="author-thumb">
									<img src="img/spiegel.jpg" alt="author">
								</div>
								<div class="notification-event">
									<div><a href="#" class="h6 notification-friend">spiegel</a> spiegel spiegel spiegel spiegel <a href="#" class="notification-link">Gotham Bar</a>.</div>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 5th at 6:43pm</time></span>
								</div>
									<span class="notification-icon">
										<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
									</span>

								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
									<svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
								</div>
							</li>

							<li>
								<div class="author-thumb">
									<img src="img/spiegel.jpg" alt="author">
								</div>
								<div class="notification-event">
									<div><a href="#" class="h6 notification-friend">spiegel</a> spiegel spiegel spiegel spiegel <a href="#" class="notification-link">profile status</a>.</div>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 2nd at 8:29pm</time></span>
								</div>
									<span class="notification-icon">
										<svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
									</span>

								<div class="more">
									<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
									<svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
								</div>
							</li>
						</ul>
					</div>

					<a href="#" class="view-all bg-primary">Показать все оповещения</a>
				</div>
			</div>

			<div class="author-page author vcard inline-items more">
				<div class="author-thumb">
					<img alt="author" src="img/ii.jpg" class="avatar">
					<span class="icon-status online"></span>
					<div class="more-dropdown more-with-triangle">
						<div class="mCustomScrollbar" data-mcs-theme="dark">
							<div class="ui-block-title ui-block-title-small">
								<h6 class="title">Your Account</h6>
							</div>

							<ul class="account-settings">
								<li>
									<a href="">

										<svg class="olymp-menu-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>

										<span>Настройки профиля</span>
									</a>
								</li>
								<li>
									<a href="">
										<svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FAV PAGE"><use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>

										<span>Создать пост</span>
									</a>
								</li>
								<li>
									<a href="#">
										<svg class="olymp-logout-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-logout-icon"></use></svg>

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
									<svg class="olymp-check-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-check-icon"></use></svg>
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
						Иванов Иван <svg class="olymp-dropdown-arrow-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
					</div>
					<span class="author-subtitle">Следопыт</span>
				</a>
			</div>

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
						<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
						<div class="label-avatar bg-blue">6</div>
					</div>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#chat" role="tab">
					<div class="control-icon has-items">
						<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
						<div class="label-avatar bg-purple">2</div>
					</div>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#notification" role="tab">
					<div class="control-icon has-items">
						<svg class="olymp-thunder-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-thunder-icon"></use></svg>
						<div class="label-avatar bg-primary">8</div>
					</div>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#search" role="tab">
					<svg class="olymp-magnifying-glass-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use></svg>
					<svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
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
							<img src="img/spiegel.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">spiegel</a>
							<span class="chat-message-item">spiegel spiegel spiegel</span>
						</div>
									<span class="notification-icon">
										<a href="#" class="accept-request">
											<span class="icon-add without-text">
												<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
											</span>
										</a>

										<a href="#" class="accept-request request-del">
											<span class="icon-minus">
												<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
											</span>
										</a>

									</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
						</div>
					</li>
					<li>
						<div class="author-thumb">
							<img src="img/spiegel.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">spiegel</a>
							<span class="chat-message-item">4 Друга</span>
						</div>
									<span class="notification-icon">
										<a href="#" class="accept-request">
											<span class="icon-add without-text">
												<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
											</span>
										</a>

										<a href="#" class="accept-request request-del">
											<span class="icon-minus">
												<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
											</span>
										</a>

									</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
						</div>
					</li>
					<li class="accepted">
						<div class="author-thumb">
							<img src="img/spiegel.jpg" alt="author">
						</div>
						<div class="notification-event">
							Вы и <a href="#" class="h6 notification-friend">spiegel</a> <a href="#" class="notification-link"></a>.
						</div>
									<span class="notification-icon">
										<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
									</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
						</div>
					</li>
					<li>
						<div class="author-thumb">
							<img src="img/spiegel.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">spiegel</a>
							<span class="chat-message-item">9 Друга</span>
						</div>
									<span class="notification-icon">
										<a href="#" class="accept-request">
											<span class="icon-add without-text">
												<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
											</span>
										</a>

										<a href="#" class="accept-request request-del">
											<span class="icon-minus">
												<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
											</span>
										</a>

									</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
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
							<img src="img/spiegel.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">spiegel</a>
							<span class="chat-message-item">spiegel spiegel spiegel spiegel spiegel spiegel spiegel</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 часа назад</time></span>
						</div>
									<span class="notification-icon">
										<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
									</span>
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="img/spiegel.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">spiegel</a>
							<span class="chat-message-item">spiegel spiegel spiegel spiegel spiegel</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 часа назад</time></span>
						</div>
									<span class="notification-icon">
										<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
									</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
						</div>
					</li>
					<li>
						<div class="author-thumb">
							<img src="img/spiegel.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">spiegel</a>
							<span class="chat-message-item"> spiegel spiegel spiegel spiegel spiegel</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Вчера at 9:56pm</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
										</span>
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
						</div>
					</li>

					<li class="chat-group">
						<div class="author-thumb">
							<img src="img/spiegel.jpg" alt="author">
							<img src="img/spiegel.jpg" alt="author">
							<img src="img/spiegel.jpg" alt="author">
							<img src="img/spiegel.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Вы, spiegel, spiegel &amp; Jet +3</a>
							<span class="last-message-author">Вы:</span>
							<span class="chat-message-item">spiegel spiegel spiegel</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 16th at 10:23am</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
										</span>
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
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
							<img src="img/spiegel.jpg" alt="author">
						</div>
						<div class="notification-event">
							<div><a href="#" class="h6 notification-friend">spiegel</a> <a href="#" class="notification-link"></a>.</div>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 часа назад</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-comments-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
										</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
						</div>
					</li>

					<li class="un-read">
						<div class="author-thumb">
							<img src="img/spiegel.jpg" alt="author">
						</div>
						<div class="notification-event">
							<div>Вы и <a href="#" class="h6 notification-friend">spiegel</a> <a href="#" class="notification-link"></a>.</div>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">9 часов назад</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
										</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
						</div>
					</li>

					<li class="with-comment-photo">
						<div class="author-thumb">
							<img src="img/spiegel.jpg" alt="author">
						</div>
						<div class="notification-event">
							<div><a href="#" class="h6 notification-friend">spiegel</a> <a href="#" class="notification-link"></a>.</div>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Вчера at 5:32am</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-comments-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
										</span>

						<div class="comment-photo">
							<img src="img/comment-photo1.jpg" alt="photo">
							<span>“”</span>
						</div>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="img/spiegel.jpg" alt="author">
						</div>
						<div class="notification-event">
							<div><a href="#" class="h6 notification-friend">spiegel</a> <a href="#" class="notification-link"></a>.</div>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 5th at 6:43pm</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
										</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="img/spiegel.jpg" alt="author">
						</div>
						<div class="notification-event">
							<div><a href="#" class="h6 notification-friend">spiegel</a> <a href="#" class="notification-link"></a>.</div>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 2nd at 8:29pm</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
										</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
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
<div class="header-spacer"></div>



<!-- панель навигации по профиль Страница / Друзья / Фото / Видео -->

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						<img src="img/moto.jpg" alt="nature">
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">									
									<li>
										<a href="#">Моя страница</a>
									</li>
									<li>
										<a href="#">Друзья</a>
									</li>
								</ul>
							</div>
							<div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="#">Фото</a>
									</li>
									<li>
										<a href="#">Видео</a>
									</li>									
								</ul>
							</div>
						</div>

						<div class="control-block-button">
							<a href="" class="btn btn-control bg-blue">
								<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control bg-purple">
								<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
							</a>

							<div class="btn btn-control bg-primary more">
								<svg class="olymp-settings-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-settings-icon"></use></svg>

								<ul class="more-dropdown more-with-triangle triangle-bottom-right">
									<li>
										<a href="#" data-toggle="modal" data-target="#update-header-photo">Фото профиля</a>
									</li>
									<li>
										<a href="#" data-toggle="modal" data-target="#update-header-photo">Главное Фото</a>
									</li>
									<li>
										<a href="">Настройки профиля</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="top-header-author">
						<a href="#" class="author-thumb revealator-zoomin">
							<img src="img/i.jpg" alt="author">
						</a>
						<div class="author-content">
							<a href="" class="h4 author-name">Иванов Иван</a>
							<div class="country">Самара</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ... окончание панели навигации -->


<div class="container">
	<div class="row">

		<!-- Главный контент -->

		<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
			<div id="newsfeed-items-grid">

				<div class="ui-block revealator-fade revealator-delay2 revealator-once">
					<!-- Пост -->
					
					<article class="hentry post">
					
							<div class="post__author author vcard inline-items">
								<img src="img/ii.jpg" alt="author">
					
								<div class="author-date">
									<a class="h6 post__author-name fn" href="">Иванов Иван</a>
									<div class="post__date">
										<time class="published" datetime="2017-03-24T18:18">
											19 часов назад
										</time>
									</div>
								</div>
					
								<div class="more">
									<svg class="olymp-three-dots-icon">
										<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
									</svg>
									<ul class="more-dropdown">
										<li>
											<a href="#">Редактировать пост</a>
										</li>
										<li>
											<a href="#">Удалить пост</a>
										</li>										
									</ul>
								</div>
					
							</div>
					
							<p>Iron Maiden Iron Maiden Iron Maiden Iron Maiden Iron Maiden
							</p>
					
							<div class="post-additional-info inline-items">
					
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-heart-icon">
										<use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
									</svg>
									<span>8</span>
								</a>
					
								<ul class="friends-harmonic">
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
								</ul>
					
								<div class="names-people-likes">
									<a href="#">spiegel</a>, <a href="#">spiegel</a> and
									<br>6 лайков
								</div>
					
					
								<div class="comments-shared">
									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-speech-balloon-icon">
											<use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
										</svg>
										<span>17</span>
									</a>
					
									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-share-icon">
											<use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use>
										</svg>
										<span>24</span>
									</a>
								</div>
					
					
							</div>
					
							<div class="control-block-button post-control-button">
					
								<a href="#" class="btn btn-control featured-post">
									<svg class="olymp-trophy-icon">
										<use xlink:href="svg-icons/sprites/icons.svg#olymp-trophy-icon"></use>
									</svg>
								</a>
					
								<a href="#" class="btn btn-control">
									<svg class="olymp-like-post-icon">
										<use xlink:href="svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
									</svg>
								</a>
					
								<a href="#" class="btn btn-control">
									<svg class="olymp-comments-post-icon">
										<use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</a>
					
								<a href="#" class="btn btn-control">
									<svg class="olymp-share-icon">
										<use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use>
									</svg>
								</a>
					
							</div>
					
						</article>
					
					</div><!-- .. окончание Поста -->


				<div class="ui-block revealator-slideup revealator-once">
					
					<!-- Пост -->
					
					<article class="hentry post video">
					
							<div class="post__author author vcard inline-items">
								<img src="img/ii.jpg" alt="author">
					
								<div class="author-date">
									<a class="h6 post__author-name fn" href="">Иванов Иван</a> поделился 
									<a href="#">ссылкой</a>
									<div class="post__date">
										<time class="published" datetime="2017-03-24T18:18">
											7 часов назад
										</time>
									</div>
								</div>
					
								<div class="more">
									<svg class="olymp-three-dots-icon">
										<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
									</svg>
									<ul class="more-dropdown">
										<li>
											<a href="#">Редактировать пост</a>
										</li>
										<li>
											<a href="#">Удалить пост</a>
										</li>										
									</ul>
								</div>
					
							</div>
					
							<p>Редактировать пост Редактировать пост Редактировать пост Редактировать пост Редактировать пост</p>
					
							<div class="post-video">
								<div class="video-thumb">
									<img src="img/video5.jpg" alt="photo">
									<a href="#" class="play-video">
										<svg class="olymp-play-icon">
											<use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
										</svg>
									</a>
								</div>
					
								<div class="video-content">
									<a href="#" class="h4 title">Видео</a>
									<p>Lorem ipsum dolor sit amet, consectetur ipisicing elit, sed do eiusmod tempo incididunt ut labore..</p>
									<a href="#" class="link-site">YOUTUBE.COM</a>
								</div>
							</div>
					
							<div class="post-additional-info inline-items">
					
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-heart-icon">
										<use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
									</svg>
									<span>15</span>
								</a>
					
								<ul class="friends-harmonic">
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
								</ul>
					
								<div class="names-people-likes">
									<a href="#">spiegel</a>, <a href="#">spiegel</a> and
									<br>13 поставили лайк
								</div>
					
								<div class="comments-shared">
									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-speech-balloon-icon">
											<use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
										</svg>
										<span>1</span>
									</a>
					
									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-share-icon">
											<use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use>
										</svg>
										<span>16</span>
									</a>
								</div>
					
					
							</div>
					
							<div class="control-block-button post-control-button">
					
								<a href="#" class="btn btn-control">
									<svg class="olymp-like-post-icon">
										<use xlink:href="svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
									</svg>
								</a>
					
								<a href="#" class="btn btn-control">
									<svg class="olymp-comments-post-icon">
										<use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</a>
					
								<a href="#" class="btn btn-control">
									<svg class="olymp-share-icon">
										<use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use>
									</svg>
								</a>
					
							</div>
					
						</article>
					
					</div> <!-- .. окончание Поста -->


				<div class="ui-block revealator-slideup revealator-once">
					<!-- Пост -->
					
					<article class="hentry post">
					
						<div class="post__author author vcard inline-items">
							<img src="img/ii.jpg" alt="author">
					
							<div class="author-date">
								<a class="h6 post__author-name fn" href="">Иванов Иван</a>
								<div class="post__date">
									<time class="published" datetime="2017-03-24T18:18">
										2 часа назад
									</time>
								</div>
							</div>
					
							<div class="more">
								<svg class="olymp-three-dots-icon">
									<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
								</svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Редактировать пост</a>
									</li>
									<li>
										<a href="#">Удалить пост</a>
									</li>
								</ul>
							</div>
					
						</div>
					
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo incididunt ut labore et
							dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris consequat.
						</p>
					
						<div class="post-additional-info inline-items">
					
							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon">
									<use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
								</svg>
								<span>36</span>
							</a>
					
							<ul class="friends-harmonic">
								<li>
									<a href="#">
										<img src="img/spiegel.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="img/spiegel.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="img/spiegel.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="img/spiegel.jpg" alt="friend">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="img/spiegel.jpg" alt="friend">
									</a>
								</li>
							</ul>
					
							<div class="names-people-likes">
								<a href="#">Вы</a>, <a href="#">spiegel</a> and
								<br>34 поставили лайк
							</div>
					
					
							<div class="comments-shared">
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-speech-balloon-icon">
										<use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
									</svg>
									<span>17</span>
								</a>
					
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-share-icon">
										<use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use>
									</svg>
									<span>24</span>
								</a>
							</div>
					
					
						</div>
					
						<div class="control-block-button post-control-button">
					
							<a href="#" class="btn btn-control">
								<svg class="olymp-like-post-icon">
									<use xlink:href="svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
								</svg>
							</a>
					
							<a href="#" class="btn btn-control">
								<svg class="olymp-comments-post-icon">
									<use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
								</svg>
							</a>
					
							<a href="#" class="btn btn-control">
								<svg class="olymp-share-icon">
									<use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use>
								</svg>
							</a>
					
						</div>
					
					</article>
					
					<!-- .. окончание Поста -->					
					<!-- Комментариев блок -->
					
					<ul class="comments-list">
						<li class="comment-item">
							<div class="post__author author vcard inline-items">
								<img src="img/spiegel.jpg" alt="author">
					
								<div class="author-date">
									<a class="h6 post__author-name fn" href="#">spiegel</a>
									<div class="post__date">
										<time class="published" datetime="2017-03-24T18:18">
											5 минут назад
										</time>
									</div>
								</div>
					
								<a href="#" class="more">
									<svg class="olymp-three-dots-icon">
										<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
									</svg>
								</a>
					
							</div>
					
							<p>spiegel spiegel spiegel spiegel spiegel</p>
					
							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon">
									<use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
								</svg>
								<span>8</span>
							</a>
							<a href="#" class="reply">Ответить</a>
						</li>
						<li class="comment-item has-children">
							<div class="post__author author vcard inline-items">
								<img src="img/spiegel.jpg" alt="author">
					
								<div class="author-date">
									<a class="h6 post__author-name fn" href="#">spiegel</a>
									<div class="post__date">
										<time class="published" datetime="2017-03-24T18:18">
											1 час назад
										</time>
									</div>
								</div>
					
								<a href="#" class="more">
									<svg class="olymp-three-dots-icon">
										<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
									</svg>
								</a>
					
							</div>
					
							<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugiten, sed quia
								consequuntur magni dolores eos qui ratione voluptatem sequi en lod nesciunt. Neque porro
								quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur adipisci velit en lorem ipsum der.
							</p>
					
							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon">
									<use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
								</svg>
								<span>5</span>
							</a>
							<a href="#" class="reply">Ответить</a>
					
							<ul class="children">
								<li class="comment-item">
									<div class="post__author author vcard inline-items">
										<img src="img/spiegel.jpg" alt="author">
					
										<div class="author-date">
											<a class="h6 post__author-name fn" href="#">spiegel</a>
											<div class="post__date">
												<time class="published" datetime="2017-03-24T18:18">
													39 минут назад
												</time>
											</div>
										</div>
					
										<a href="#" class="more">
											<svg class="olymp-three-dots-icon">
												<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
											</svg>
										</a>
					
									</div>
					
									<p>spiegel spiegel spiegel spiegel spiegel spiegel spiegel</p>
					
									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-heart-icon">
											<use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
										</svg>
										<span>2</span>
									</a>
									<a href="#" class="reply">Ответить</a>
								</li>
								<li class="comment-item">
									<div class="post__author author vcard inline-items">
										<img src="img/spiegel.jpg" alt="author">
					
										<div class="author-date">
											<a class="h6 post__author-name fn" href="#">spiegel</a>
											<div class="post__date">
												<time class="published" datetime="2017-03-24T18:18">
													24 минут назад
												</time>
											</div>
										</div>
					
										<a href="#" class="more">
											<svg class="olymp-three-dots-icon">
												<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
											</svg>
										</a>
					
									</div>
					
									<p>spiegel spiegel spiegel spiegel spiegel</p>
					
									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-heart-icon">
											<use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
										</svg>
										<span>0</span>
									</a>
									<a href="#" class="reply">Ответить</a>
					
								</li>
							</ul>
					
						</li>
					
						<li class="comment-item">
							<div class="post__author author vcard inline-items">
								<img src="img/spiegel.jpg" alt="author">
					
								<div class="author-date">
									<a class="h6 post__author-name fn" href="#">spiegel</a>
									<div class="post__date">
										<time class="published" datetime="2017-03-24T18:18">
											1 Час назад
										</time>
									</div>
								</div>
					
								<a href="#" class="more">
									<svg class="olymp-three-dots-icon">
										<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
									</svg>
								</a>
					
							</div>
					
							<p>spiegel spiegel spiegel spiegel spiegel spiegel</p>
					
							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon">
									<use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
								</svg>
								<span>7</span>
							</a>
							<a href="#" class="reply">Ответить</a>
					
						</li>
					</ul>
					
					<!-- ... окончание блока комментариев -->
					<a href="#" class="more-comments">Показать комментарии <span>+</span></a>
					
					<!-- Блок для печатания текста комментария  -->
					
					<form class="comment-form inline-items">
					
						<div class="post__author author vcard inline-items">
							<img src="img/ii.jpg" alt="author">
					
							<div class="form-group with-icon-right ">
								<textarea class="form-control" placeholder=""></textarea>
								<div class="add-options-message">
									<a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
										<svg class="olymp-camera-icon">
											<use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
										</svg>
									</a>
								</div>
							</div>
						</div>
					
						<button class="btn btn-md-2 btn-primary">Запостить комментарий</button>
					
						<button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Отмена</button>
					
					</form>
					
					</div><!-- ... окончание Блока для печатания текста комментария  -->
				<div class="ui-block revealator-slideup revealator-once">
					<!-- Пост -->
					
					<article class="hentry post has-post-thumbnail shared-photo">
					
							<div class="post__author author vcard inline-items">
								<img src="img/ii.jpg" alt="author">
					
								<div class="author-date">
									<a class="h6 post__author-name fn" href="">Иванов Иван</a> shared
									<a href="#">spiegel</a>’s <a href="#">фото</a>
									<div class="post__date">
										<time class="published" datetime="2017-03-24T18:18">
											7 часов назад
										</time>
									</div>
								</div>
					
								<div class="more">
									<svg class="olymp-three-dots-icon">
										<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
									</svg>
									<ul class="more-dropdown">
										<li>
											<a href="#">Редактировать пост</a>
										</li>
										<li>
											<a href="#">Удалить пост</a>
										</li>
									</ul>
								</div>
					
							</div>
					
							<p>spiegel spiegel spiegel spiegel spiegelspiegel spiegel spiegel spiegel spiegelspiegel spiegel spiegel spiegel spiegelspiegel spiegel spiegel spiegel spiegel</p>
					
							<div class="post-thumb">
								<img src="img/post-photo6.jpg" alt="photo">
							</div>
					
							<ul class="children single-children">
								<li class="comment-item">
									<div class="post__author author vcard inline-items">
										<img src="img/spiegel.jpg" alt="author">
										<div class="author-date">
											<a class="h6 post__author-name fn" href="#">spiegel</a>
											<div class="post__date">
												<time class="published" datetime="2017-03-24T18:18">
													16 часов назад
												</time>
											</div>
										</div>
									</div>
					
									<p>spiegel spiegel spiegel spiegel spiegel spiegel spiegel</p>
								</li>
							</ul>
					
							<div class="post-additional-info inline-items">
					
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-heart-icon">
										<use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
									</svg>
									<span>15</span>
								</a>
					
								<ul class="friends-harmonic">
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
								</ul>
					
								<div class="names-people-likes">
									<a href="#">spiegel</a>, <a href="#">spiegel</a> и
									<br>13 лайков
								</div>
					
								<div class="comments-shared">
									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-speech-balloon-icon">
											<use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
										</svg>
										<span>0</span>
									</a>
					
									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-share-icon">
											<use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use>
										</svg>
										<span>16</span>
									</a>
								</div>
					
							</div>
					
							<div class="control-block-button post-control-button">
					
								<a href="#" class="btn btn-control">
									<svg class="olymp-like-post-icon">
										<use xlink:href="svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
									</svg>
								</a>
					
								<a href="#" class="btn btn-control">
									<svg class="olymp-comments-post-icon">
										<use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
									</svg>
								</a>
					
								<a href="#" class="btn btn-control">
									<svg class="olymp-share-icon">
										<use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use>
									</svg>
								</a>
					
							</div>
					
						</article>
					
					</div>
			</div>

			<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="" data-container="newsfeed-items-grid">
				<svg class="olymp-three-dots-icon">
					<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
				</svg>
			</a>
		</div>

		<!-- ... окончание Главного контента -->


		<!-- Лева колонка -->

		<div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">

			<div class="ui-block revealator-fade revealator-delay1 revealator-once">
				<div class="ui-block-title">
					<h6 class="title">Профиль</h6>
				</div>
				<div class="ui-block-content">

					<!-- Обо мне -->
					
					<ul class="widget w-personal-info item-block">
						<li>
							<span class="title">Обо мне:</span>
							<span class="text">Обо мне Обо мне Обо мне Обо мне Обо мне Обо мне Обо мне.</span>
						</li>
						<li>
							<span class="title">Увлечения:</span>
							<span class="text">Увлечения Увлечения Увлечения Увлечения Увлечения Увлечения Увлечения Увлечения.</span>
						</li>						
					</ul>
					
					
				</div>
			</div>

			<div class="ui-block revealator-slideup revealator-once">
				<div class="ui-block-content">

					<!-- Соцсети -->

					<div class="widget w-socials">
							<h6 class="title">Социальные сети:</h6>
							<a href="#" class="social-item bg-facebook">
								<i class="fab fa-facebook-f" aria-hidden="true"></i>
								Facebook
							</a>
							<a href="#" class="social-item bg-twitter">
								<i class="fab fa-twitter" aria-hidden="true"></i>
								Twitter
							</a>
							<a href="#" class="social-item bg-dribbble">
								<i class="fab fa-vkontakte" aria-hidden="true"></i>
								VKontakte
							</a>
					</div>
				</div>
			</div>

			<div class="ui-block revealator-slideup revealator-once">
				<div class="ui-block-title">
					<h6 class="title">Регалии</h6>
				</div>
				<div class="ui-block-content">

					<!-- Регалии -->
					
					<ul class="widget w-badges">
						<li>
							<a href="">
								<img src="img/badge1.png" alt="author">
								<div class="label-avatar bg-primary">2</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/badge4.png" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/badge3.png" alt="author">
								<div class="label-avatar bg-blue">4</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/badge6.png" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/badge11.png" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/badge8.png" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/badge10.png" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/badge13.png" alt="author">
								<div class="label-avatar bg-breez">2</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/badge7.png" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/badge12.png" alt="author">
							</a>
						</li>
					</ul>
					
					
				</div>
			</div>

			<div class="ui-block revealator-slideup revealator-once">
				<div class="ui-block-title">
					<h6 class="title">Плейлист</h6>
				</div>

				<!-- Плейлист -->
				
				<ol class="widget w-playlist">
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb">
							<img src="img/playlist8.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big">
									<use xlink:href="svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use>
								</svg>
							</a>
						</div>
				
						
				
						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">3:22</time>
							<div class="more">
								<svg class="olymp-three-dots-icon">
									<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
								</svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Добавить песню</a>
									</li>
									<li>
										<a href="#">Добавить плейлист</a>
									</li>
								</ul>
							</div>
						</div>
				
					</li>
				
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb">
							<img src="img/playlist8.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big">
									<use xlink:href="svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use>
								</svg>
							</a>
						</div>
				
						<div class="composition">
							<a href="#" class="composition-name">Iron Maiden</a>
							<a href="#" class="composition-author">Iron Maiden</a>
						</div>
				
						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">5:48</time>
							<div class="more">
								<svg class="olymp-three-dots-icon">
									<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
								</svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Добавить песню</a>
									</li>
									<li>
										<a href="#">Добавить плейлист</a>
									</li>
								</ul>
							</div>
						</div>
				
					</li>
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb">
							<img src="img/playlist8.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big">
									<use xlink:href="svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use>
								</svg>
							</a>
						</div>
				
						<div class="composition">
							<a href="#" class="composition-name">Iron Maiden</a>
							<a href="#" class="composition-author">Iron Maiden</a>
						</div>
				
						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">3:06</time>
							<div class="more">
								<svg class="olymp-three-dots-icon">
									<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
								</svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Добавить песню</a>
									</li>
									<li>
										<a href="#">Добавить плейлист</a>
									</li>
								</ul>
							</div>
						</div>
				
					</li>
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb">
							<img src="img/playlist8.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big">
									<use xlink:href="svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use>
								</svg>
							</a>
						</div>
				
						<div class="composition">
							<a href="#" class="composition-name">Iron Maiden</a>
							<a href="#" class="composition-author">Iron Maiden</a>
						</div>
				
						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">6:17</time>
							<div class="more">
								<svg class="olymp-three-dots-icon">
									<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
								</svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Добавить песню</a>
									</li>
									<li>
										<a href="#">Добавить плейлист</a>
									</li>
								</ul>
							</div>
						</div>
				
					</li>
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb">
							<img src="img/playlist8.jpg" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big">
									<use xlink:href="svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use>
								</svg>
							</a>
						</div>
				
						<div class="composition">
							<a href="#" class="composition-name">Iron Maiden</a>
							<a href="#" class="composition-author">Iron Maiden</a>
						</div>
				
						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">5:40</time>
							<div class="more">
								<svg class="olymp-three-dots-icon">
									<use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
								</svg>
								<ul class="more-dropdown">
									<li>
										<a href="#">Добавить песню</a>
									</li>
									<li>
										<a href="#">Добавить плейлист</a>
									</li>
								</ul>
							</div>
						</div>
				
					</li>
				</ol>
				
				<!-- .. окончание плейлиста -->
			</div>

			<div class="ui-block revealator-slideup revealator-once">
				<div class="ui-block-title">
					<h6 class="title">Твиты</h6>
				</div>

				<!-- Твиты -->
				
				<ul class="widget w-twitter">
					<li class="twitter-item">
						<div class="author-folder">
							<img src="img/twitter-avatar1.png" alt="avatar">
							<div class="author">
								<a href="#" class="author-name">Следопыт</a>
								<a href="#" class="group">@james_spiegelOK</a>
							</div>
						</div>
						<p>Tomorrow with the agency we will run 5 km for charity. Come and give us your support!
							<a href="#" class="link-post">#Daydream5K</a></p>
						<span class="post__date">
							<time class="published" datetime="2017-03-24T18:18">
								2 часа назад
							</time>
						</span>
					</li>
					<li class="twitter-item">
						<div class="author-folder">
							<img src="img/twitter-avatar1.png" alt="avatar">
							<div class="author">
								<a href="#" class="author-name">Следопыт</a>
								<a href="#" class="group">@james_spiegelOK</a>
							</div>
						</div>
						<p>Tomorrow with the agency we will run 5 km for charity. Come and give us your support!<a href="#" class="link-post">#Daydream5K</a></p>
						<span class="post__date">
							<time class="published" datetime="2017-03-24T18:18">
								16 часов назад
							</time>
						</span>
					</li>
					<li class="twitter-item">
						<div class="author-folder">
							<img src="img/twitter-avatar1.png" alt="avatar">
							<div class="author">
								<a href="#" class="author-name">Следопыт</a>
								<a href="#" class="group">@james_spiegelOK</a>
							</div>
						</div>
						<p>Tomorrow with the agency we will run 5 km for charity. Come and give us your support!
							<a href="#" class="link-post">#Daydream5K</a></p>
						<span class="post__date">
							<time class="published" datetime="2017-03-24T18:18">
								Вчера
							</time>
						</span>
					</li>
				</ul>
				
				
				<!-- .. окончание твитов -->
			</div>

			<div class="ui-block revealator-slideup revealator-once">
				<div class="ui-block-title">
					<h6 class="title">Видео</h6>
				</div>
				<div class="ui-block-content">

					<!-- Видео -->
					
					<ul class="widget w-last-video">
						<li>
							<a href="https://vimeo.com/ondemand/viewfromabluemoon4k/147865858" class="play-video play-video--small">
								<svg class="olymp-play-icon">
									<use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
								</svg>
							</a>
							<img src="img/video8.jpg" alt="video">
							<div class="video-content">
								<div class="title">Видео...</div>
								<time class="published" datetime="2017-03-24T18:18">3:25</time>
							</div>
							<div class="overlay"></div>
						</li>
						<li>
							<a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video play-video--small">
								<svg class="olymp-play-icon">
									<use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
								</svg>
							</a>
							<img src="img/video7.jpg" alt="video">
							<div class="video-content">
								<div class="title">Видео</div>
								<time class="published" datetime="2017-03-24T18:18">5:48</time>
							</div>
							<div class="overlay"></div>
						</li>
					</ul>
					
					<!-- .. окончание Видео -->
				</div>
			</div>

		</div>

		<!-- ... окончание Левой колонки -->


		<!-- Правая Колонка -->

		<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">

			<div class="ui-block revealator-fade revealator-delay3 revealator-once">
				<div class="ui-block-title">
					<h6 class="title">Фото</h6>
				</div>
				<div class="ui-block-content">

					<!-- Фото -->
					
					<ul class="widget w-last-photo js-zoom-gallery">
						<li>
							<a href="img/last-photo10-large.jpg">
								<img src="img/last-photo10-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="img/last-phot11-large.jpg">
								<img src="img/last-phot11-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="img/last-phot12-large.jpg">
								<img src="img/last-phot12-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="img/last-phot13-large.jpg">
								<img src="img/last-phot13-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="img/last-phot14-large.jpg">
								<img src="img/last-phot14-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="img/last-phot15-large.jpg">
								<img src="img/last-phot15-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="img/last-phot16-large.jpg">
								<img src="img/last-phot16-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="img/last-phot17-large.jpg">
								<img src="img/last-phot17-large.jpg" alt="photo">
							</a>
						</li>
						<li>
							<a href="img/last-phot18-large.jpg">
								<img src="img/last-phot18-large.jpg" alt="photo">
							</a>
						</li>
					</ul>
					
					
					<!-- .. окончание Фото -->
				</div>
			</div>

			<div class="ui-block revealator-slideup revealator-once">
				<div class="ui-block-title">
					<h6 class="title">Посты</h6>
				</div>
				<!-- ПОСТЫ -->
				
				<ul class="widget w-blog-posts">
					<li>
						<article class="hentry post">
				
							<a href="#" class="h4">Lorem ipsum dolor sit amet</a>
				
							<p>Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod por incidid ut labore et.</p>
				
							<div class="post__date">
								<time class="published" datetime="2017-03-24T18:18">
									7 часов назад
								</time>
							</div>
				
						</article>
					</li>
					<li>
						<article class="hentry post">
				
							<a href="#" class="h4">Lorem ipsum dolor sit amet</a>
				
							<p>Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod por incidid ut labore et.</p>
				
							<div class="post__date">
								<time class="published" datetime="2017-03-24T18:18">
									March 18th, at 6:52pm
								</time>
							</div>
				
						</article>
					</li>
				</ul>
				
				<!-- .. окончание постов -->
			</div>

			<div class="ui-block revealator-slideup revealator-once">
				<div class="ui-block-title">
					<h6 class="title">Друзья (86)</h6>
				</div>
				<div class="ui-block-content">

					<!--друзья -->
					
					<ul class="widget w-faved-page js-zoom-gallery">
						<li>
							<a href="#">
								<img src="img/spiegel.jpg" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/spiegel.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/spiegel.jpg" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/spiegel.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/spiegel.jpg" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/spiegel.jpg" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/spiegel.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/spiegel.jpg" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/spiegel.jpg" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/spiegel.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/spiegel.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/spiegel.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/spiegel.jpg" alt="user">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/spiegel.jpg" alt="user">
							</a>
						</li>
						<li class="all-users">
							<a href="#">+74</a>
						</li>
					</ul>
					
					<!-- .. окончание блока друзей -->
				</div>
			</div>

			<div class="ui-block revealator-slideup revealator-once">
				<div class="ui-block-title">
					<h6 class="title">Избранное</h6>
				</div>

				<!-- Избранные места -->
				
				<ul class="widget w-friend-pages-added notification-list friend-requests">
					<li class="inline-items">
						<div class="author-thumb">
							<img src="img/spiegel.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">The Marina Bar</a>
							<span class="chat-message-item">Restaurant / Bar</span>
						</div>
						<span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
							</a>
						</span>
				
					</li>
				
					<li class="inline-items">
						<div class="author-thumb">
							<img src="img/spiegel.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Tapronus Rock</a>
							<span class="chat-message-item">Rock Band</span>
						</div>
						<span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
							</a>
						</span>
				
					</li>
				
					<li class="inline-items">
						<div class="author-thumb">
							<img src="img/spiegel.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Pixel Digital Design</a>
							<span class="chat-message-item">Company</span>
						</div>
						<span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
							</a>
						</span>
					</li>					
				
					
				</ul>
				
				<!-- .. окончание избранных мест -->
			</div>

			<div class="ui-block revealator-slideup revealator-once">
				<div class="ui-block-title">
					<h6 class="title">Опрос</h6>
				</div>
				<div class="ui-block-content">

					<!-- голосовалка -->
					
					<ul class="widget w-pool">
						<li>
							<p>Lorem ipsum dolor sit amet</p>
						</li>
						<li>
							<div class="skills-item">
								<div class="skills-item-info">
									<span class="skills-item-title">
										<span class="radio">
											<label>
												<input type="radio" name="optionsRadios">
												Thomas Bale
											</label>
										</span>
									</span>
									<span class="skills-item-count">
										<span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="62" data-from="0"></span>
										<span class="units">62%</span>
									</span>
								</div>
								<div class="skills-item-meter">
									<span class="skills-item-meter-active bg-primary" style="width: 62%"></span>
								</div>
					
								<div class="counter-friends">12 друзей проголосовали</div>
					
								<ul class="friends-harmonic">
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#" class="all-users">+3</a>
									</li>
								</ul>
							</div>
						</li>
					
						<li>
							<div class="skills-item">
								<div class="skills-item-info">
									<span class="skills-item-title">
										<span class="radio">
											<label>
												<input type="radio" name="optionsRadios">
												Thomas Bale
											</label>
										</span>
									</span>
									<span class="skills-item-count">
										<span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="27" data-from="0"></span>
										<span class="units">27%</span>
									</span>
								</div>
								<div class="skills-item-meter">
									<span class="skills-item-meter-active bg-primary" style="width: 27%"></span>
								</div>
								<div class="counter-friends">7 друзей проголосовали</div>
					
								<ul class="friends-harmonic">
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
								</ul>
							</div>
						</li>
					
						<li>
							<div class="skills-item">
								<div class="skills-item-info">
									<span class="skills-item-title">
										<span class="radio">
											<label>
												<input type="radio" name="optionsRadios">
												Thomas Bale
											</label>
										</span>
									</span>
									<span class="skills-item-count">
										<span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="11" data-from="0"></span>
										<span class="units">11%</span>
									</span>
								</div>
								<div class="skills-item-meter">
									<span class="skills-item-meter-active bg-primary" style="width: 11%"></span>
								</div>
					
								<div class="counter-friends">2 друзей проголосовали</div>
					
								<ul class="friends-harmonic">
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="img/spiegel.jpg" alt="friend">
										</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
					
					<!-- .. окончание Голосовалки -->
					<a href="#" class="btn btn-md-2 btn-border-think custom-color c-grey full-width">Голосовать</a>
				</div>
			</div>

		</div>

		<!-- ... окончание правой колонки -->

	</div>
</div>

<!-- всплывающее окно для смены фото -->

<div class="modal fade" id="update-header-photo" tabindex="-1" role="dialog" aria-labelledby="update-header-photo" aria-hidden="true">
	<div class="modal-dialog window-popup update-header-photo" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
			</a>

			<div class="modal-header">
				<h6 class="title">Обновить главное фото</h6>
			</div>

			<div class="modal-body">
				<a href="#" class="upload-photo-item">
				<svg class="olymp-computer-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>

				<h6>Загрузить фото</h6>
				<span>С компьютера</span>
			</a>

				<a href="#" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">

			<svg class="olymp-photos-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-photos-icon"></use></svg>

			<h6>Выбрать фото</h6>
			<span>Выбрать из загруженных</span>
		</a>
			</div>
		</div>
	</div>
</div>


<!-- ... окончание всплывающего окна по смене фото -->

<!-- всплывающее окно по смене фото -->

<div class="modal fade" id="choose-from-my-photo" tabindex="-1" role="dialog" aria-labelledby="choose-from-my-photo" aria-hidden="true">
	<div class="modal-dialog window-popup choose-from-my-photo" role="document">

		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
			</a>
			<div class="modal-header">
				<h6 class="title">Выбрать из моих фото</h6>

				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">
							<svg class="olymp-photos-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-photos-icon"></use></svg>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-expanded="false">
							<svg class="olymp-albums-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-albums-icon"></use></svg>
						</a>
					</li>
				</ul>
			</div>

			<div class="modal-body">
				<div class="tab-content">
					<div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">

						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="img/choose-photo1.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="img/choose-photo2.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="img/choose-photo3.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>

						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="img/choose-photo4.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="img/choose-photo5.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="img/choose-photo6.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>

						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="img/choose-photo7.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="img/choose-photo8.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="img/choose-photo9.jpg" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>


						<a href="#" class="btn btn-secondary btn-lg btn--half-width">Отмена</a>
						<a href="#" class="btn btn-primary btn-lg btn--half-width">Выбрать</a>

					</div>
					<div class="tab-pane" id="profile" role="tabpanel" aria-expanded="false">

						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="img/choose-photo10.jpg" alt="photo">
								<figcaption>
									<a href="#">lorem</a>
									<span>Добавлено: 2 часа назад</span>
								</figcaption>
							</figure>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="img/choose-photo11.jpg" alt="photo">
								<figcaption>
									<a href="#">lorem 2016</a>
									<span>Добавлено: 5 недель назад</span>
								</figcaption>
							</figure>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="img/choose-photo12.jpg" alt="photo">
								<figcaption>
									<a href="#">lorem 2018</a>
									<span>Добавлено: 6 минут назад</span>
								</figcaption>
							</figure>
						</div>

						
						
						


						<a href="#" class="btn btn-secondary btn-lg btn--half-width">Отмена</a>
						<a href="#" class="btn btn-primary btn-lg disabled btn--half-width">Добавить</a>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<!-- ... окончание всплывающего окна по смене фото -->

<!-- модалка плейлиста -->

<div class="window-popup playlist-popup" tabindex="-1" role="dialog" aria-labelledby="playlist-popup" aria-hidden="true">

	<a href="" class="icon-close js-close-popup">
		<svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
	</a>

	<div class="mCustomScrollbar">
		<table class="playlist-popup-table">

		<thead>

		<tr>

			<th class="play">
				PLAY
			</th>

			<th class="cover">
				COVER
			</th>

			<th class="song-artist">
				SONG AND ARTIST
			</th>

			<th class="album">
				ALBUM
			</th>

			<th class="released">
				RELEASED
			</th>

			<th class="duration">
				DURATION
			</th>

			<th class="spotify">
				GET IT ON SPOTIFY
			</th>

			<th class="remove">
				REMOVE
			</th>
		</tr>

		</thead>

		<tbody>
		<tr>
			<td class="play">
				<a href="#" class="play-icon">
					<svg class="olymp-music-play-icon-big"><use xlink:href="svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="img/playlist8.jpg" alt="thumb-composition">
				</div>
			</td>
			<td class="song-artist">
				<div class="composition">
					<a href="#" class="composition-name">Iron Maiden</a>
					<a href="#" class="composition-author">Iron Maiden</a>
				</div>
			</td>
			<td class="album">
				<a href="#" class="album-composition">Iron Maiden</a>
			</td>
			<td class="released">
				<div class="release-year">2014</div>
			</td>
			<td class="duration">
				<div class="composition-time">
					<time class="published" datetime="2017-03-24T18:18">6:17</time>
				</div>
			</td>
			<td class="spotify">
				<i class="fab fa-spotify composition-icon" aria-hidden="true"></i>
			</td>
			<td class="remove">
				<a href="#" class="remove-icon">
					<svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
				</a>
			</td>
		</tr>

		<tr>
			<td class="play">
				<a href="#" class="play-icon">
					<svg class="olymp-music-play-icon-big"><use xlink:href="svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="img/playlist8.jpg" alt="thumb-composition">
				</div>
			</td>
			<td class="song-artist">
				<div class="composition">
					<a href="#" class="composition-name">Iron Maiden</a>
					<a href="#" class="composition-author">Iron Maiden</a>
				</div>
			</td>
			<td class="album">
				<a href="#" class="album-composition">Iron Maiden</a>
			</td>
			<td class="released">
				<div class="release-year">2014</div>
			</td>
			<td class="duration">
				<div class="composition-time">
					<time class="published" datetime="2017-03-24T18:18">6:17</time>
				</div>
			</td>
			<td class="spotify">
				<i class="fab fa-spotify composition-icon" aria-hidden="true"></i>
			</td>
			<td class="remove">
				<a href="#" class="remove-icon">
					<svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
				</a>
			</td>
		</tr>

		<tr>
			<td class="play">
				<a href="#" class="play-icon">
					<svg class="olymp-music-play-icon-big"><use xlink:href="svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="img/playlist8.jpg" alt="thumb-composition">
				</div>
			</td>
			<td class="song-artist">
				<div class="composition">
					<a href="#" class="composition-name">Iron Maiden</a>
					<a href="#" class="composition-author">Iron Maiden</a>
				</div>
			</td>
			<td class="album">
				<a href="#" class="album-composition">Iron Maiden</a>
			</td>
			<td class="released">
				<div class="release-year">2014</div>
			</td>
			<td class="duration">
				<div class="composition-time">
					<time class="published" datetime="2017-03-24T18:18">6:17</time>
				</div>
			</td>
			<td class="spotify">
				<i class="fab fa-spotify composition-icon" aria-hidden="true"></i>
			</td>
			<td class="remove">
				<a href="#" class="remove-icon">
					<svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
				</a>
			</td>
		</tr>
		</tbody>
	</table>
	</div>

	<audio id="mediaplayer" data-showplaylist="true">
		<source src="" title="Track 1" data-poster="track1.png" type="audio/mpeg">
		<source src="" title="Track 2" data-poster="track2.png" type="audio/mpeg">
		<source src="" title="Track 3" data-poster="track3.png" type="audio/mpeg">
		<source src="" title="Track 4" data-poster="track4.png" type="audio/mpeg">
	</audio>

</div>

<!-- ... окончание модалки плейлиста -->


<a class="back-to-top" href="#">
	<img src="svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
</a>




<!-- Блок чата -->

<div class="ui-block popup-chat popup-chat-responsive" tabindex="-1" role="dialog" aria-labelledby="popup-chat-responsive" aria-hidden="true">

	<div class="modal-content">
		<div class="modal-header">
			<span class="icon-status online"></span>
			<h6 class="title" >Чат</h6>
			<div class="more">
				<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
				<svg class="olymp-little-delete js-chat-open"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
			</div>
		</div>
		<div class="modal-body">
			<div class="mCustomScrollbar">
				<ul class="notification-list chat-message chat-message-field">
					<li>
						<div class="author-thumb">
							<img src="img/spiegel.jpg" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Lorem Lorem Lorem Lorem Lorem</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Вчера at 8:10pm</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="img/ii.jpg" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Lorem Lorem Lorem Lorem</span>
							<span class="chat-message-item">Lorem Lorem Lorem Lorem</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Вчера at 8:29pm</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="img/spiegel.jpg" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Lorem Lorem Lorem Lorem Lorem Lorem</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Вчера at 8:10pm</time></span>
						</div>
					</li>
				</ul>
			</div>

	<form class="need-validation">

		<div class="form-group">
			<textarea class="form-control" placeholder="Введите сообщение..."></textarea>
			<div class="add-options-message">
				<a href="#" class="options-message">
					<svg class="olymp-computer-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>
				</a>
				<div class="options-message smile-block">

					<svg class="olymp-happy-sticker-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-sticker-icon"></use></svg>

					<ul class="more-dropdown more-with-triangle triangle-bottom-right">
						<li>
							<a href="#">
								<img src="img/icon-chat1.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat2.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat3.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat4.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat5.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat6.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat7.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat8.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat9.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat10.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat11.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat12.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat13.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat14.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat15.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat16.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat17.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat18.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat19.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat20.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat21.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat22.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat23.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat24.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat25.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat26.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/icon-chat27.png" alt="icon">
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

	</form>
	</div>
	</div>
</div>
<!-- Конец блока Чата -->


<!-- js скрипты -->
<script src="js/jQuery/jquery-3.4.1.js"></script>

<!-- js библиотека прогресс бара (бегущий прогресс)-->
<script src="js/libs/jquery.appear.js"></script>

<!-- js библиотека прокручивания scrollbar -->
<script src="js/libs/perfect-scrollbar.js"></script>

<!-- js библиотека преобразование объекта при нажатии -->
<script src="js/libs/material.min.js"></script>

<!-- js библиотека галереи и проигрывание видео -->
<script src="js/libs/jquery.magnific-popup.js"></script>

<!-- Старые скрипты + новые -->
<script src="js/main.js"></script>

<!-- js библиотека paralax эффектов -->
<script src="js/libs/fm.revealator.jquery.js"></script>

<!-- Шрифты / Иконки -->
<script defer src="fonts/fontawesome-all.js"></script>

<!-- Инициализация js библиотек к объектам -->
<script src="js/libs-init/libs-init.js"></script>



</body>
</html>