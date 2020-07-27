<div class="control-block">
    @auth
        @component('user.components.header.alert_friendship_request',['count' => $user->friendship_requests_count, 'requests' => $user->friendshipRequests]) @endcomponent
        @component('user.components.header.alert_chat_message') @endcomponent
        @component('user.components.header.alert_activity') @endcomponent
        @component('user.components.header.page_owner', ['full_name' => $user->full_name]) @endcomponent
    @else
        <div class="nav-item text-light">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </div>
        @if (Route::has('register'))
            <div class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </div>
        @endif
    @endauth
</div>







