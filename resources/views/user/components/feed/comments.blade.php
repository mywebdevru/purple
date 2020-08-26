<ul class="comments-list" id="comments_list_{{ $feed }}" style="display:none;">
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
            <a href="#" id="like_comment_{{ $item['id'] }}" data-like_id="{{ $item->likes->where('authorable_id', auth()->user()->id)->where('authorable_type', 'App\Models\User')->isNotEmpty() ? $item->likes->where('authorable_id', auth()->user()->id)->where('authorable_type', 'App\Models\User')->first()->id : 0 }}" class="post-add-icon inline-items can_like {{ $item->likes->where('authorable_id', auth()->user()->id)->where('authorable_type', 'App\Models\User')->isNotEmpty() ? 'like_it' : ''}}" onclick="event.preventDefault(); likeIt({{ $item['id'] }}, 'comment');">
                <form  method="POST" id="form_like_comment_{{ $item['id'] }}">
                    @csrf
                    <input type="hidden" name="likeable_type" value="App\Models\Comment">
                    <input type="hidden" name="likeable_id" value="{{ $item['id'] }}">
                    <input type="hidden" name="authorable_type" value="App\Models\User">
                    <input type="hidden" name="authorable_id" value="{{ $comment_author->id }}">
                </form>
                <svg class="olymp-heart-icon">
                    <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-heart-icon') }}"></use>
                </svg>
                <span>{{ count($item->likes) }}</span>
            </a>
            <a href="#" class="reply">Ответить</a>
        </li>
    @endforeach
</ul>
