<!-- Левый сайдбар -->


<div class="fixed-sidebar">
	<div class="fixed-sidebar-left sidebar--small" id="sidebar-left">

		<a href="#" class="logo">
			<div class="img-wrap">
				<img src="{{ asset('img/4x4_white.png') }}" alt="offroad">
			</div>
		</a>

		<div class="mCustomScrollbar" data-mcs-theme="dark">
			<ul class="left-menu">
				<li>
					<a href="#" class="js-sidebar-open">
						<svg class="olymp-menu-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Открыть меню"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-menu-icon') }}"></use></svg>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="Лента событий"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-newsfeed-icon') }}"></use></svg>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Избранное"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-star-icon') }}"></use></svg>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-happy-faces-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Группы"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-faces-icon') }}"></use></svg>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="olymp-calendar-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Календарь"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-calendar-icon') }}"></use></svg>
					</a>
				</li>
			</ul>
		</div>
	</div>

	<div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1">
		<a href="#" class="logo">
			<div class="img-wrap">
				<img src="{{ asset('img/4x4_white_small.png') }}" alt="offroad">
			</div>
			<div class="title-block">
				<h6 class="logo-title brand-name-small panel">Offroad Paradise</h6>
			</div>
		</a>

		<div class="mCustomScrollbar" data-mcs-theme="dark">
			<ul class="left-menu">
				<li>
					<a href="#" class="js-sidebar-open">
						<svg class="olymp-close-icon left-menu-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-close-icon') }}"></use></svg>
						<span class="left-menu-title">Закрыть меню</span>
					</a>
				</li>
				<li>
					<a href="">
						<svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="NEWSFEED"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-newsfeed-icon') }}"></use></svg>
						<span class="left-menu-title">Лента событий</span>
					</a>
				</li>
				<li>
					<a href="">
						<svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FAV PAGE"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-star-icon') }}"></use></svg>
						<span class="left-menu-title">Избранное</span>
					</a>
				</li>
				<li>
					<a href="">
						<svg class="olymp-happy-faces-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FRIEND GROUPS"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-faces-icon') }}"></use></svg>
						<span class="left-menu-title">Группы</span>
					</a>
				</li>
				<li>
					<a href="">
						<svg class="olymp-calendar-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="CALENDAR AND EVENTS"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-calendar-icon') }}"></use></svg>
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
			<img src="{{ asset('img/4x4_white.png') }}" alt="offroad">
		</a>

	</div>

	<div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1-responsive">
		<a href="#" class="logo">
			<div class="img-wrap">
				<img src="{{ asset('img/4x4_white_small.png') }}" alt="offroad">
			</div>
			<div class="title-block">
				<h6 class="logo-title brand-name-small panel">Offroad Paradise</h6>
			</div>
		</a>

		<div class="mCustomScrollbar" data-mcs-theme="dark">

			<div class="control-block">
				<div class="author-page author vcard inline-items">
					<div class="author-thumb">
						<img alt="author" src="{{ asset('img/i.jpg') }}" class="avatar">
						<span class="icon-status online"></span>
					</div>
					<a href="#" class="author-name fn">
						<div class="author-title">
							Иванов Иван <svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon') }}"></use></svg>
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
						<svg class="olymp-close-icon left-menu-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-close-icon') }}"></use></svg>
						<span class="left-menu-title">Закрыть меню</span>
					</a>
				</li>
				<li>
					<a href="">
						<svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="Лента событий"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-newsfeed-icon') }}"></use></svg>
						<span class="left-menu-title">Лента событий</span>
					</a>
				</li>
				<li>
					<a href="">
						<svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Избранное"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-star-icon') }}"></use></svg>
						<span class="left-menu-title">Избранное</span>
					</a>
				</li>
				<li>
					<a href="">
						<svg class="olymp-happy-faces-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Группы"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-faces-icon') }}"></use></svg>
						<span class="left-menu-title">Группы</span>
					</a>
				</li>
				<li>
					<a href="">
						<svg class="olymp-calendar-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Календарь"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-calendar-icon') }}"></use></svg>
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

						<svg class="olymp-menu-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-menu-icon') }}"></use></svg>

						<span>Настройки профиля</span>
					</a>
				</li>
				<li>
					<a href="#">
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
