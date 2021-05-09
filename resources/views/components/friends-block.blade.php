<div class="ui-block revealator-slideup revealator-once">
    <div class="ui-block-title">
        <h6 class="title">Друзья ({{ $friendsCount() }})</h6>
    </div>
    <div class="ui-block-content">
        <ul class="widget w-faved-page">
            @foreach ($friends as $friend)
                <li>
                    <a href="{{route('user.show', $friend->user->id)}}">
                        <img src="{{ $friend->user->avatar }}" alt="author">
                    </a>
                </li>
            @break($loop->iteration == 14)
            @endforeach
            @if ($friendsCount()-14 > 0)
                <li class="all-users">
                    <a href="#">+{{ $friendsCount()-14 }}</a> {{-- TODO: Поставить ссылку на страницу со списком друзей --}}
                </li>
            @endif
        </ul>
    </div>
</div>
