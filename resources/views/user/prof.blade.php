@extends('layouts.app')

@section('content')

@component('user.components.wallpaper_block.main', ['user' => $user])@endcomponent

{{-- @dd($feed->first()->feedable()->first()->comments->first()->likes->first()->authorable->full_name) --}}
<div class="container">
	<div class="row">

		<!-- Главный контент -->

		<livewire:feed :feed="$feed" />

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
                            <span class="title">{{ $user->full_name }}</span>
                            <span class="text">{{ $user->creed }}</span>
                        </li>
                        <li>
							<span class="title">Пол:</span>
                            <span class="text">{{ $user->gender }}</span>
						</li>
						<li>
							<span class="title">Обитаю в:</span>
                            <span class="text">{{ $user->location }}</span>
                        </li>
                        <li>
							<span class="title">Рожден:</span>
                            <span class="text">{{ $user->birth_date }}</span>
						</li>
					</ul>
				</div>
            </div>

			<!-- Автомобили -->
            <div class="ui-block revealator-slideup revealator-once">
                @if ($user->usersVehicles->isEmpty())
                    <div class="ui-block-title">
                        <h6 class="title">Я хожу пешком</h6>
                    </div>
                @else
                    <div class="ui-block-title">
                        <h6 class="title">Я катаюсь на:</h6>
                    </div>
                @endif

				<ul class="widget w-friend-pages-added notification-list friend-requests js-zoom-gallery">
                    @forelse ($user->usersVehicles as $item)
                        <li class="inline-items">
                            <div class="author-thumb">
                                <img src="{{ $item->avatar }}" alt="author" class="avatar">
                            </div>
                            <div class="notification-event">
                            <a href="{{ $item->avatar }}" class="h6 notification-friend">{{ $item->type }}</a>
                                <span class="chat-message-item">{{ $item->full_vehicle_name }}</span>
                            </div>
                            <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
                                <a href="#">
                                    <svg class="olymp-star-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-star-icon') }}"></use></svg>
                                </a>
                            </span>
                        </li>
                    @empty
                    @endforelse
				</ul>
            </div>
            <!-- .. окончание Авто -->

			{{-- <div class="ui-block revealator-slideup revealator-once">
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
            </div> --}}

            <div class="ui-block revealator-slideup revealator-once">
				<div class="ui-block-title">
					<h6 class="title">Видео</h6>
				</div>
				<div class="ui-block-content">

					<!-- Видео -->

					<ul class="widget w-last-video">
						<li>
							<a href="https://www.youtube.com/watch?v=eFOvZojUJto" class="play-video play-video--small">
								<svg class="olymp-play-icon">
									<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-play-icon') }}"></use>
								</svg>
							</a>
							<img src="{{ asset('img/boss.png') }}" alt="video">
							<div class="video-content">
								<div class="title">Boss's dauther Pop Evil</div>
								<time class="published" datetime="2017-03-24T18:18">3:25</time>
							</div>
							<div class="overlay"></div>
						</li>
						<li>
							<a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video play-video--small">
								<svg class="olymp-play-icon">
									<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-play-icon') }}"></use>
								</svg>
							</a>
							<img src="{{ asset('img/video2.png') }}" alt="video">
							<div class="video-content">
								<div class="title">Kraftklub - Alles Wegen Dir</div>
								<time class="published" datetime="2017-03-24T18:18">5:48</time>
							</div>
							<div class="overlay"></div>
						</li>
					</ul>

					<!-- .. окончание Видео -->
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
								<img src="{{ asset('img/badge1.png') }}" alt="author">
								<div class="label-avatar bg-primary">2</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="{{ asset('img/badge4.png') }}" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="{{ asset('img/badge3.png') }}" alt="author">
								<div class="label-avatar bg-blue">4</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="{{ asset('img/badge6.png') }}" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="{{ asset('img/badge11.png') }}" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="{{ asset('img/badge8.png') }}" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="{{ asset('img/badge10.png') }}" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="{{ asset('img/badge13.png') }}" alt="author">
								<div class="label-avatar bg-breez">2</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="{{ asset('img/badge7.png') }}" alt="author">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="{{ asset('img/badge12.png') }}" alt="author">
							</a>
						</li>
					</ul>


				</div>
			</div>

			{{-- <div class="ui-block revealator-slideup revealator-once">
				<div class="ui-block-title">
					<h6 class="title">Плейлист</h6>
				</div>

				<!-- Плейлист -->

				<ol class="widget w-playlist">
					<li class="js-open-popup" data-popup-target=".playlist-popup">
						<div class="playlist-thumb">
							<img src="{{ asset('img/playlist8.jpg') }}" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big">
									<use xlink:href="{{ asset('svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big') }}"></use>
								</svg>
							</a>
						</div>



						<div class="composition-time">
							<time class="published" datetime="2017-03-24T18:18">3:22</time>
							<div class="more">
								<svg class="olymp-three-dots-icon">
									<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
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
							<img src="{{ asset('img/playlist8.jpg') }}" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big">
									<use xlink:href="{{ asset('svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big') }}"></use>
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
									<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
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
							<img src="{{ asset('img/playlist8.jpg') }}" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="https://www.youtube.com/watch?v=eFOvZojUJto" class="play-icon">
								<svg class="olymp-music-play-icon-big">
									<use xlink:href="{{ asset('svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big') }}"></use>
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
									<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
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
							<img src="{{ asset('img/playlist8.jpg') }}" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big">
									<use xlink:href="{{ asset('svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big') }}"></use>
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
									<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
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
							<img src="{{ asset('img/playlist8.jpg') }}" alt="thumb-composition">
							<div class="overlay"></div>
							<a href="#" class="play-icon">
								<svg class="olymp-music-play-icon-big">
									<use xlink:href="{{ asset('svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big') }}"></use>
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
									<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
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
			</div> --}}

			{{-- <div class="ui-block revealator-slideup revealator-once">
				<div class="ui-block-title">
					<h6 class="title">Твиты</h6>
				</div>

				<!-- Твиты -->

				<ul class="widget w-twitter">
					<li class="twitter-item">
						<div class="author-folder">
							<img src="{{ asset('img/twitter-avatar1.png') }}" alt="avatar">
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
							<img src="{{ asset('img/twitter-avatar1.png') }}" alt="avatar">
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
							<img src="{{ asset('img/twitter-avatar1.png') }}" alt="avatar">
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
			</div> --}}



		</div>

		<!-- ... окончание Левой колонки -->


		<!-- Правая Колонка -->

		<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">

            <x-friends-block :friends="$user->friends"/>
            <x-images-block :images="$user->images"/>

			<div class="ui-block revealator-slideup revealator-once">
				<div class="ui-block-title">
					<h6 class="title">Избранные карты</h6>
				</div>

				<!-- Избранные места -->

				<ul class="widget w-friend-pages-added notification-list friend-requests">
					<li class="inline-items">
						<div class="author-thumb">
							<img src="{{ asset('img/spiegel.jpg') }}" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">The Marina Bar</a>
							<span class="chat-message-item">Restaurant / Bar</span>
						</div>
						<span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-star-icon') }}"></use></svg>
							</a>
						</span>
                    </li>

					<li class="inline-items">
						<div class="author-thumb">
							<img src="{{ asset('img/spiegel.jpg') }}" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Tapronus Rock</a>
							<span class="chat-message-item">Rock Band</span>
						</div>
						<span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-star-icon') }}"></use></svg>
							</a>
						</span>

					</li>

					<li class="inline-items">
						<div class="author-thumb">
							<img src="{{ asset('img/spiegel.jpg') }}" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Pixel Digital Design</a>
							<span class="chat-message-item">Company</span>
						</div>
						<span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
							<a href="#">
								<svg class="olymp-star-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-star-icon') }}"></use></svg>
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
											<img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
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
											<img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
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
											<img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
										</a>
									</li>
									<li>
										<a href="#">
											<img src="{{ asset('img/spiegel.jpg') }}" alt="friend">
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

<!-- модалка плейлиста -->

<div class="window-popup playlist-popup" tabindex="-1" role="dialog" aria-labelledby="playlist-popup" aria-hidden="true">

	<a href="" class="icon-close js-close-popup">
		<svg class="olymp-close-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-close-icon') }}"></use></svg>
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
					<svg class="olymp-music-play-icon-big"><use xlink:href="{{ asset('svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big') }}"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="{{ asset('img/playlist8.jpg') }}" alt="thumb-composition">
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
					<svg class="olymp-close-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-close-icon') }}"></use></svg>
				</a>
			</td>
		</tr>

		<tr>
			<td class="play">
				<a href="#" class="play-icon">
					<svg class="olymp-music-play-icon-big"><use xlink:href="{{ asset('svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big') }}"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="{{ asset('img/playlist8.jpg') }}" alt="thumb-composition">
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
					<svg class="olymp-close-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-close-icon') }}"></use></svg>
				</a>
			</td>
		</tr>

		<tr>
			<td class="play">
				<a href="#" class="play-icon">
					<svg class="olymp-music-play-icon-big"><use xlink:href="{{ asset('svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big') }}"></use></svg>
				</a>
			</td>
			<td class="cover">
				<div class="playlist-thumb">
					<img src="{{ asset('img/playlist8.jpg') }}" alt="thumb-composition">
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
					<svg class="olymp-close-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-close-icon') }}"></use></svg>
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
	<img src="{{ asset('svg-icons/back-to-top.svg') }}" alt="arrow" class="back-icon">
</a>

@endsection
