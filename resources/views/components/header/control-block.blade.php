<div class="control-block">
    <x-header.control-block-item>
        <x-slot name='icon'>
            <svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
            <div class="label-avatar bg-blue requests_count">{{ count($requestedFriendships) }}</div>
        </x-slot>
        <x-slot name='title'>
            Они хотят дружить
        </x-slot>
        @if ($isRequested())
            <x-slot name='notification'>
                @each('components.header.alert-requested-friendship', $requestedFriendships, 'request')
            </x-slot>
            <x-slot name='button'>
                <a class="view-all bg-blue requested_friendship_accept" href="#" data-id="all">Добавить всех</a>
            </x-slot>
        @else
            <x-slot name='notification'>
                <div class="text-center">Запросов нет</div>
            </x-slot>
            <x-slot name='button'></x-slot>
        @endif
    </x-header.control-block-item>
    @component('user.components.header.alert_chat_message') @endcomponent
    @component('user.components.header.alert_activity') @endcomponent
    @component('user.components.header.page_owner', ['full_name' => auth()->user()->full_name, 'creed' => auth()->user()->creed, 'avatar' => auth()->user()->avatar, 'id' => auth()->user()->id])
    @endcomponent
</div>
