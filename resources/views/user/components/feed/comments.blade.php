<ul class="comments-list">
    @foreach ($comments as $item)
        <li class="comment-item">
            <div class="post__author author vcard inline-items">
                <img src="{{ asset($item->authorable['avatar']) }}" alt="{{ $item->authorable['full_name'] }}">
                <div class="author-date">
                    <a class="h6 post__author-name fn" href="{{ route('user.show',['user' => $item->authorable['id']]) }}">
                        {{ $item->authorable['full_name'] }}
                    </a>
                    <div class="post__date">
                        <time class="published" datetime="{{ $item['created_at'] }}">
                            {{ $item['created_at'] }}
                        </time>
                    </div>
                </div>
                <a href="#" class="more">
                    <svg class="olymp-three-dots-icon">
                        <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
                    </svg>
                </a>
            </div>
            <p>{{ $item['text'] }}</p>
            <a href="#" class="post-add-icon inline-items">
                <svg class="olymp-heart-icon">
                    <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-heart-icon') }}"></use>
                </svg>
                <span>8</span>
            </a>
            <a href="#" class="reply">Ответить</a>
        </li>
    @endforeach
</ul>
