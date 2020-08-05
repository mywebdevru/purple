<!-- панель навигации по профиль Страница / Друзья / Фото / Видео -->

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						<img src="{{ Str::startsWith($data->wallpaper, 'http') ? $data->wallpaper : asset($data->wallpaper)}}" alt="wallpaper" id="wallpaper">
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
                            @if ($user->requestedFriendships->where('user_id', $data->id)->isEmpty() && $data->id != $user->id && $user->friends->where('friend_id', $data->id)->isEmpty() && $user->friendshipRequests->where('friend_id', $data->id)->isEmpty())
                            <div class="btn btn-control bg-blue more">
                                <svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
                                <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                                    <li>
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('request-{{ $data->id }}').submit();">
                                            <form id="request-{{ $data->id }}" action="{{ route('user.friendship_request.store') }}" method="POST" style="display: none;">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                <input type="hidden" name="friend_id" value="{{ $data->id }}">
                                            </form>
                                            Запросить Дружбу
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            @endif
                            @if (!$user->friendshipRequests->where('friend_id', $data->id)->isEmpty())
                            <div class="btn btn-control bg-yellow more">
                                <svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
                                <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                                    <li>
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('request-{{ $data->id }}').submit();">
                                            <form id="request-{{ $data->id }}" action="{{ route('user.friendship_request.destroy', ['friendship_request' => $user->friendshipRequests->where('friend_id', $data->id)->first()->id]) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            Отменить запрос на Дружбу
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            @endif
                            @if (!$user->requestedFriendships->where('user_id', $data->id)->isEmpty())
                                <div class="btn btn-control bg-orange more">
                                    <svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>

                                    <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                                        <li>
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('accept-request-{{ $user->requestedFriendships->where('user_id', $data->id)->first()->id }}').submit();">
                                                <form id="accept-request-{{ $user->requestedFriendships->where('user_id', $data->id)->first()->id }}" action="{{ route('user.friends.store') }}" method="POST" style="display: none;">
                                                    @csrf
                                                    <input type="hidden" name="requested_friendship" value="{{ $user->requestedFriendships->where('user_id', $data->id)->first() }}">
                                                </form>
                                                Принять Дружбу
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('request-del-{{ $user->requestedFriendships->where('user_id', $data->id)->first()->id }}').submit();">
                                                <form id="request-del-{{ $user->requestedFriendships->where('user_id', $data->id)->first()->id }}" action="{{ route('user.friendship_request.destroy', ['friendship_request' => $user->requestedFriendships->where('user_id', $data->id)->first()]) }}" method="POST" style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                                Отвергнуть Дружбу
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                            @if (!$data->friends->where('friend_id', $user->id)->isEmpty())
                            <div class="btn btn-control bg-green more">
                                <svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>

                                <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                                    <li>
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('request-del-{{ $data->friends->where('friend_id', $user->id)->first()->id }}').submit();">
                                            <form id="request-del-{{ $data->friends->where('friend_id', $user->id)->first()->id }}" action="{{ route('user.friends.destroy', ['friend' => $data->friends->where('friend_id', $user->id)->first()->id]) }}" method="POST" style="display: none;">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                            Разорвать Дружбу
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            @endif
							<a href="#" class="btn btn-control bg-purple">
								<svg class="olymp-chat---messages-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-chat---messages-icon') }}"></use></svg>
							</a>
                            @can('update', $data)
                                <div class="btn btn-control bg-primary more">
                                    <svg class="olymp-settings-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-settings-icon') }}"></use></svg>

                                    <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                                        <li>
                                            <a href="#" class="profile-photo-modal-link" data-toggle="modal" data-target="#update-header-photo" data-upload-type="avatar">Фото профиля</a>
                                        </li>
                                        <li>
                                            <a href="#" class="profile-photo-modal-link" data-toggle="modal" data-target="#update-header-photo" data-upload-type="wallpaper">Главное Фото</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.edit', $data->id) }}">Настройки профиля</a>
                                        </li>
                                    </ul>
                                </div>
                            @endcan
						</div>
					</div>
					<div class="top-header-author">
						<a href="#" class="author-thumb revealator-zoomin">
							<img src="{{ Str::startsWith($data->avatar, 'http') ? $data->avatar : asset($data->avatar)}}" class="author-image" alt="author">
						</a>
						<div class="author-content">
							<a href="" class="h4 author-name">{{ $data->full_name }}</a>
							<div class="country">{{ $data->location }}</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ... окончание панели навигации -->
@component('user.components.wallpaper_block.modal_photo')@endcomponent
