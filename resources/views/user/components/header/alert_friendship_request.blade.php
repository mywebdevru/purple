<div class="control-icon more has-items">
    <svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
    <div class="label-avatar bg-blue">{{ $count }}</div>

    <div class="more-dropdown more-with-triangle triangle-top-center">
        <div class="ui-block-title ui-block-title-small">
            <h6 class="title">Запросы в друзья</h6>
            <a href="#">Найти друзей</a>
            <a href="#">Настройки</a>
        </div>

        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <ul class="notification-list friend-requests">
                @foreach ($requests as $request)
                    <li>
                        <div class="author-thumb">
                            <img src="{{ asset('img/spiegel.jpg') }}" alt="author">
                        </div>
                        <div class="notification-event">
                        <a href="{{ route('user.show', ['user' => $request->friend]) }}" class="h6 notification-friend">{{ $request->friend->full_name }}</a>
                            <span class="chat-message-item">{{ $request->friend->location }}</span>
                        </div>
                        <span class="notification-icon">
                            <a class="accept-request" href="#" onclick="event.preventDefault(); document.getElementById('accept-request-{{ $request->id }}').submit();">
                                <form id="accept-request-{{ $request->id }}" action="{{ route('friend.store') }}" method="POST" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $request->user_id }}">
                                    <input type="hidden" name="friend_id" value="{{ $request->friend_id }}">
                                    <input type="hidden" name="requested_friendship" value="{{ $request->id }}">
                                </form>
                                <span class="icon-add without-text">
                                    <svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
                                </span>
                            </a>
                            <a class="accept-request request-del" href="#" onclick="event.preventDefault(); document.getElementById('request-del-{{ $request->id }}').submit();">
                                <form id="request-del-{{ $request->id }}" action="{{ route('friendship_request.destroy', ['friendship_request' => $request]) }}" method="POST" style="display: none;">
                                    @method('DELETE')
                                    @csrf
                                </form>
                                <span class="icon-minus">
                                    <svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
                                </span>
                            </a>
                        </span>
                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use></svg>
                        </div>
                    </li>
                @endforeach
                {{-- <li>
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
                </li> --}}

            </ul>
        </div>
        <a href="#" class="view-all bg-blue">Добавить всех</a>
    </div>
</div>
