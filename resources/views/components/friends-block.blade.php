<div class="ui-block revealator-slideup revealator-once">
    <div class="ui-block-title">
        <h6 class="title">Друзья ({{ $friendsCount() }})</h6>
    </div>
    <div class="ui-block-content">
        <ul class="widget w-faved-page js-zoom-gallery">
            @foreach ($friends as $friend)
                <li>
                    <a href="#">
                        <img src="{{ $friend->user->avatar }}" alt="author">
                    </a>
                </li>
            @break($loop->iteration == 14)
            @endforeach
            @if ($friendsCount()-14 > 0)
                <li class="all-users">
                    <a href="#">+{{ $friendsCount()-14 }}</a>
                </li>
            @endif
        </ul>
    </div>
</div>
