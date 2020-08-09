@extends('layouts.app')
{{-- @dd($feed->first()->feedable->comments->find(2)->authorable['full_name']) --}}
@section('content')
@component('user.components.left.l_sidebar')@endcomponent
@component('user.components.right.r_sidebar')@endcomponent

<div class="header-spacer"></div>

@component('user.components.wallpaper_block.main', ['data' => $data, 'user' => $user])@endcomponent


<div class="container">
	<div class="row">

		<!-- Главный контент -->

		<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
			<div id="newsfeed-items-grid">

                @foreach ($feed as $item)
                {{-- @dd($item->feedable) --}}
                    @if($item['feedable_type'] == 'App\Post')
                        @component('user.components.feed.post',['feed' => $item->feedable, 'comment_author' => $user]) @endcomponent
                    @else
                        @component('user.components.feed.image',['feed' => $item->feedable, 'comment_author' => $user]) @endcomponent
                    @endif
                @endforeach



				<div class="ui-block">

					<!-- Пост -->

					<article class="hentry post video">

							<div class="post__author author vcard inline-items">
								<img src="{{ asset('img/ii.jpg') }}" alt="author">

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
										<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
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
									<img src="{{ asset('img/video5.jpg') }}" alt="photo">
									<a href="#" class="play-video">
										<svg class="olymp-play-icon">
											<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-play-icon') }}"></use>
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
										<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-heart-icon') }}"></use>
									</svg>
									<span>15</span>
								</a>

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
								</ul>

								<div class="names-people-likes">
									<a href="#">spiegel</a>, <a href="#">spiegel</a> and
									<br>13 поставили лайк
								</div>

								<div class="comments-shared">
									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-speech-balloon-icon">
											<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-speech-balloon-icon') }}"></use>
										</svg>
										<span>1</span>
									</a>

									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-share-icon">
											<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-share-icon') }}"></use>
										</svg>
										<span>16</span>
									</a>
								</div>


							</div>

							<div class="control-block-button post-control-button">

								<a href="#" class="btn btn-control">
									<svg class="olymp-like-post-icon">
										<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-like-post-icon') }}"></use>
									</svg>
								</a>

								<a href="#" class="btn btn-control">
									<svg class="olymp-comments-post-icon">
										<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-comments-post-icon') }}"></use>
									</svg>
								</a>

								<a href="#" class="btn btn-control">
									<svg class="olymp-share-icon">
										<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-share-icon') }}"></use>
									</svg>
								</a>

							</div>

						</article>

					</div> <!-- .. окончание Поста -->


				<div class="ui-block">
					<!-- Пост -->

					<article class="hentry post">

						<div class="post__author author vcard inline-items">
							<img src="{{ asset('img/ii.jpg') }}" alt="author">

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
									<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
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
									<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-heart-icon') }}"></use>
								</svg>
								<span>36</span>
							</a>

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
							</ul>

							<div class="names-people-likes">
								<a href="#">Вы</a>, <a href="#">spiegel</a> and
								<br>34 поставили лайк
							</div>


							<div class="comments-shared">
								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-speech-balloon-icon">
										<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-speech-balloon-icon') }}"></use>
									</svg>
									<span>17</span>
								</a>

								<a href="#" class="post-add-icon inline-items">
									<svg class="olymp-share-icon">
										<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-share-icon') }}"></use>
									</svg>
									<span>24</span>
								</a>
							</div>


						</div>

						<div class="control-block-button post-control-button">

							<a href="#" class="btn btn-control">
								<svg class="olymp-like-post-icon">
									<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-like-post-icon') }}"></use>
								</svg>
							</a>

							<a href="#" class="btn btn-control">
								<svg class="olymp-comments-post-icon">
									<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-comments-post-icon') }}"></use>
								</svg>
							</a>

							<a href="#" class="btn btn-control">
								<svg class="olymp-share-icon">
									<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-share-icon') }}"></use>
								</svg>
							</a>

						</div>

					</article>

					<!-- .. окончание Поста -->
					<!-- Комментариев блок -->

					<ul class="comments-list">
						<li class="comment-item">
							<div class="post__author author vcard inline-items">
								<img src="{{ asset('img/spiegel.jpg') }}" alt="author">

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
										<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
									</svg>
								</a>

							</div>

							<p>spiegel spiegel spiegel spiegel spiegel</p>

							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon">
									<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-heart-icon') }}"></use>
								</svg>
								<span>8</span>
							</a>
							<a href="#" class="reply">Ответить</a>
						</li>
						<li class="comment-item has-children">
							<div class="post__author author vcard inline-items">
								<img src="{{ asset('img/spiegel.jpg') }}" alt="author">

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
										<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
									</svg>
								</a>

							</div>

							<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugiten, sed quia
								consequuntur magni dolores eos qui ratione voluptatem sequi en lod nesciunt. Neque porro
								quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur adipisci velit en lorem ipsum der.
							</p>

							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon">
									<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-heart-icon') }}"></use>
								</svg>
								<span>5</span>
							</a>
							<a href="#" class="reply">Ответить</a>

							<ul class="children">
								<li class="comment-item">
									<div class="post__author author vcard inline-items">
										<img src="{{ asset('img/spiegel.jpg') }}" alt="author">

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
												<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
											</svg>
										</a>

									</div>

									<p>spiegel spiegel spiegel spiegel spiegel spiegel spiegel</p>

									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-heart-icon">
											<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-heart-icon') }}"></use>
										</svg>
										<span>2</span>
									</a>
									<a href="#" class="reply">Ответить</a>
								</li>
								<li class="comment-item">
									<div class="post__author author vcard inline-items">
										<img src="{{ asset('img/spiegel.jpg') }}" alt="author">

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
												<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
											</svg>
										</a>

									</div>

									<p>spiegel spiegel spiegel spiegel spiegel</p>

									<a href="#" class="post-add-icon inline-items">
										<svg class="olymp-heart-icon">
											<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-heart-icon') }}"></use>
										</svg>
										<span>0</span>
									</a>
									<a href="#" class="reply">Ответить</a>

								</li>
							</ul>

						</li>

						<li class="comment-item">
							<div class="post__author author vcard inline-items">
								<img src="{{ asset('img/spiegel.jpg') }}" alt="author">

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
										<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
									</svg>
								</a>

							</div>

							<p>spiegel spiegel spiegel spiegel spiegel spiegel</p>

							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon">
									<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-heart-icon') }}"></use>
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
							<img src="{{ asset('img/ii.jpg') }}" alt="author">

							<div class="form-group with-icon-right ">
								<textarea class="form-control" placeholder=""></textarea>
								<div class="add-options-message">
									<a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
										<svg class="olymp-camera-icon">
											<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-camera-icon') }}"></use>
										</svg>
									</a>
								</div>
							</div>
						</div>

						<button class="btn btn-md-2 btn-primary">Запостить комментарий</button>

						<button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Отмена</button>

					</form>

				</div><!-- ... окончание Блока для печатания текста комментария  -->

        </div>

			<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="" data-container="newsfeed-items-grid">
				<svg class="olymp-three-dots-icon">
					<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
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
                            <span class="title">{{ $data->full_name }}</span>
                            <span class="text">{{ $data->creed }}</span>
                        </li>
                        <li>
							<span class="title">Пол:</span>
                            <span class="text">{{ $data->gender }}</span>
						</li>
						<li>
							<span class="title">Обитаю в:</span>
                            <span class="text">{{ $data->location }}</span>
                        </li>
                        <li>
							<span class="title">Рожден:</span>
                            <span class="text">{{ $data->birth_date }}</span>
						</li>
					</ul>
				</div>
            </div>

			<!-- Автомобили -->
            <div class="ui-block revealator-fade revealator-once">
                @if ($data->usersVehicles->isEmpty())
                    <div class="ui-block-title">
                        <h6 class="title">Я хожу пешком</h6>
                    </div>
                @else
                    <div class="ui-block-title">
                        <h6 class="title">Я катаюсь на:</h6>
                    </div>
                @endif

				<ul class="widget w-friend-pages-added notification-list friend-requests js-zoom-gallery">
                    @forelse ($data->usersVehicles as $item)
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

			<div class="ui-block revealator-fade revealator-once">
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

			<div class="ui-block revealator-fade revealator-once">
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

			<div class="ui-block revealator-fade revealator-once">
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
			</div>

			<div class="ui-block revealator-fade revealator-once">
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
			</div>

			<div class="ui-block revealator-fade revealator-once">
				<div class="ui-block-title">
					<h6 class="title">Видео</h6>
				</div>
				<div class="ui-block-content">

					<!-- Видео -->

					<ul class="widget w-last-video">
						<li>
							<a href="https://vimeo.com/ondemand/viewfromabluemoon4k/147865858" class="play-video play-video--small">
								<svg class="olymp-play-icon">
									<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-play-icon') }}"></use>
								</svg>
							</a>
							<img src="{{ asset('img/video8.jpg') }}" alt="video">
							<div class="video-content">
								<div class="title">Видео...</div>
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
							<img src="{{ asset('img/video7.jpg') }}" alt="video">
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

            <div class="ui-block revealator-fade revealator-once">
				<div class="ui-block-title">
					<h6 class="title">Друзья ({{ count($data->friends) }}) Редактировать</h6>
				</div>
				<div class="ui-block-content">

					<!--друзья -->

					<ul class="widget w-faved-page js-zoom-gallery">
                        @foreach ($data->friends as $friend)
                            <li>
                                <a href="#">
                                    <img src="{{ $friend->user->avatar }}" alt="author">
                                </a>
                            </li>
                        @break($loop->iteration == 14)
                        @endforeach
                        @if (count($data->friends)-14 > 0)
                            <li class="all-users">
                                <a href="#">+{{ count($data->friends)-14 }}</a>
                            </li>
                        @endif
					</ul>

					<!-- .. окончание блока друзей -->
				</div>
			</div>

			<div class="ui-block revealator-fade revealator-delay3 revealator-once">
				<div class="ui-block-title">
					<h6 class="title">Фото ({{ count($data->images) }})</h6>
				</div>
				<div class="ui-block-content">

					<!-- Фото -->

					<ul class="widget w-last-photo js-zoom-gallery">
                        @foreach ($data->images as $item)
                        @if ($loop->iteration < 9)
                            <li>
                                <a href="{{ Str::startsWith($item->image, 'http') ? $item->image : asset($item->image)}}">
                                    <img src="{{ Str::startsWith($item->image, 'http') ? $item->image : asset($item->image)}}" alt="photo">
                                </a>
                            </li>
                        @else
                            <li style="display : none">
                                <a href="{{ Str::startsWith($item->image, 'http') ? $item->image : asset($item->image)}}"></a>
                            </li>
                        @endif
                        @endforeach
                        @if (count($data->images)-8 > 0)
                            <li class="all-users">
                                <a href="#">+{{ count($data->images)-8 }}</a>
                            </li>
                        @endif
					</ul>


					<!-- .. окончание Фото -->
				</div>
			</div>

			<div class="ui-block revealator-fade revealator-once">
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



			<div class="ui-block revealator-fade revealator-once">
				<div class="ui-block-title">
					<h6 class="title">Избранное</h6>
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

			<div class="ui-block revealator-fade revealator-once">
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
