<div class="control-icon more has-items">
    {{ $icon }}
    <div class="more-dropdown more-with-triangle triangle-top-center">
        <div class="ui-block-title ui-block-title-small">
            <h6 class="title">{{ $title }}</h6>
            @isset($ref1)
                {{ $ref1 }} {{-- <a href="#">Найти друзей</a> --}}
            @endisset
            @isset($ref2)
                {{ $ref2 }} {{-- <a href="#">Настройки</a> --}}
            @endisset
        </div>
        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <ul class="notification-list friend-requests">
                {{ $notification }}
            </ul>
        </div>
        {{ $button }}
    </div>
</div>
