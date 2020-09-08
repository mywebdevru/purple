<div class="control-block">
    @auth
       <x-header.control-block-item>
            <x-slot name='icon'>
                <svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
                <div class="label-avatar bg-blue">{{ count(auth()->user()->requestedFriendships) }}</div>
            </x-slot>
            <x-slot name='title'>
                Они хотят дружить
            </x-slot>
            <x-slot name='notification'>
                @each('user.components.header.friendship_request', auth()->user()->requestedFriendships, 'request')
            </x-slot>
            @if (count(auth()->user()->requestedFriendships) > 0)
                <x-slot name='button'>
                    <a class="view-all bg-blue" href="#" onclick="event.preventDefault(); document.getElementById('accept-all-friends').submit();">Добавить всех</a>
                    <form id="accept-all-friends" action="{{ route('user.friends.store') }}" method="POST" style="display: none;">
                        @csrf
                        <input type="hidden" name="requested_friendship" value="{{ auth()->user()->requestedFriendships }}">
                    </form>
                </x-slot>
            @else
                <x-slot name='button'></x-slot>
            @endif
       </x-header.control-block-item>
        @component('user.components.header.alert_chat_message') @endcomponent
        @component('user.components.header.alert_activity') @endcomponent
        @component('user.components.header.page_owner', ['full_name' => auth()->user()->full_name, 'creed' => auth()->user()->creed, 'avatar' => auth()->user()->avatar, 'id' => auth()->user()->id])
        @endcomponent
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
