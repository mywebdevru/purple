<!-- панель навигации по профиль Страница / Друзья / Фото / Видео -->
<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						<img src="{{ Str::startsWith($user->wallpaper, 'http') ? $user->wallpaper : asset($user->wallpaper)}}" alt="wallpaper" id="wallpaper">
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
                        <div class="control-block-button-left">
                            <div class="btn btn-control bg-red" title="Создать пост">
                                <svg class="olymp-blog-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-blog-icon') }}"></use></svg>
                                
                            </div>
                            
                            <div class="btn btn-control bg-green" title="Добавить маршрут">
                                <svg class="olymp-add-a-place-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-add-a-place-icon') }}"></use></svg>

                            </div>							
						</div>
						<div class="control-block-button">
                            @if (auth()->user()->requestedFriendships->where('user_id', $user->id)->isEmpty() && $user->id !=auth()->user()->id && auth()->user()->friends->where('friend_id', $user->id)->isEmpty() && auth()->user()->friendshipRequests->where('friend_id', $user->id)->isEmpty())
                            <div class="btn btn-control bg-blue more">
                                <svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
                                <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                                    <li>
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('request-{{ $user->id }}').submit();">
                                            <form id="request-{{ $user->id }}" action="{{ route('user.friendship_request.store') }}" method="POST" style="display: none;">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="friend_id" value="{{ $user->id }}">
                                            </form>
                                            Запросить Дружбу
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            @endif
                            @if (!auth()->user()->friendshipRequests->where('friend_id', $user->id)->isEmpty())
                            <div class="btn btn-control bg-yellow more">
                                <svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
                                <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                                    <li>
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('request-{{ $user->id }}').submit();">
                                            <form id="request-{{ $user->id }}" action="{{ route('user.friendship_request.destroy', ['friendship_request' => auth()->user()->friendshipRequests->where('friend_id', $user->id)->first()->id]) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            Отменить запрос на Дружбу
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            @endif
                            @if (!auth()->user()->requestedFriendships->where('user_id', $user->id)->isEmpty())
                                <div class="btn btn-control bg-orange more">
                                    <svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>

                                    <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                                        <li>
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('accept-request-{{ auth()->user()->requestedFriendships->where('user_id', $user->id)->first()->id }}').submit();">
                                                <form id="accept-request-{{ auth()->user()->requestedFriendships->where('user_id', $user->id)->first()->id }}" action="{{ route('user.friends.store') }}" method="POST" style="display: none;">
                                                    @csrf
                                                    <input type="hidden" name="requested_friendship" value="{{ auth()->user()->requestedFriendships->where('user_id', $user->id)->first() }}">
                                                </form>
                                                Принять Дружбу
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('request-del-{{ auth()->user()->requestedFriendships->where('user_id', $user->id)->first()->id }}').submit();">
                                                <form id="request-del-{{ auth()->user()->requestedFriendships->where('user_id', $user->id)->first()->id }}" action="{{ route('user.friendship_request.destroy', ['friendship_request' => auth()->user()->requestedFriendships->where('user_id', $user->id)->first()]) }}" method="POST" style="display: none;">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                                Отвергнуть Дружбу
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                            @if (!$user->friends->where('friend_id', auth()->user()->id)->isEmpty())
                            <div class="btn btn-control bg-green more">
                                <svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>

                                <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                                    <li>
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('request-del-{{ $user->friends->where('friend_id', auth()->user()->id)->first()->id }}').submit();">
                                            <form id="request-del-{{ $user->friends->where('friend_id', auth()->user()->id)->first()->id }}" action="{{ route('user.friends.destroy', ['friend' => $user->friends->where('friend_id', auth()->user()->id)->first()->id]) }}" method="POST" style="display: none;">
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
                            @can('update', $user)
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
                                            <a href="{{ route('user.edit', $user->id) }}">Настройки профиля</a>
                                        </li>
                                    </ul>
                                </div>
                            @endcan
						</div>
					</div>
					<div class="top-header-author">
						<a href="#" class="author-thumb revealator-zoomin">
							<img src="{{ Str::startsWith($user->avatar, 'http') ? $user->avatar : asset($user->avatar)}}" class="author-image" alt="author">
						</a>
						<div class="author-content">
							<a href="" class="h4 author-name">{{ $user->full_name }}</a>
							<div class="country">{{ $user->location }}</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ... окончание панели навигации -->
@component('user.components.wallpaper_block.modal_photo')@endcomponent
