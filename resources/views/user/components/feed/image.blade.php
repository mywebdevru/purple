<div class="ui-block revealator-slideup revealator-once">
    <!-- Пост -->

    <article class="hentry post has-post-thumbnail shared-photo">

        <div class="post__author author vcard inline-items">
            <img src="{{ Str::startsWith($feed->imageable['avatar'], 'http') ? $feed->imageable['avatar'] : asset($feed->imageable['avatar'])}}" alt="author">

            <div class="author-date">
                <a class="h6 post__author-name fn" href="{{ route(Str::lower(class_basename($feed->imageable)).'.show', $feed->imageable['id']) }}">{{ $feed->imageable['full_name'] }}</a>
                {{-- shared
                <a href="#">spiegel</a>’s <a href="#">фото</a> --}}
                <div class="post__date">
                    <time class="published" datetime="{{ $feed['created_at'] }}">
                        {{ $feed['created_at'] }}
                    </time>
                </div>
            </div>
            @can('update', $feed)
                <div class="more">
                    <svg class="olymp-three-dots-icon">
                        <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
                    </svg>
                    <ul class="more-dropdown">
                        <li>
                            <a href="#">Редактировать пост</a>
                        </li>
                        <li>
                            <a href="#">Удалить пост</a>
                        </li>
                    </ul>
                </div>
            @endcan
        </div>

        {{-- <p>spiegel spiegel spiegel spiegel spiegelspiegel spiegel spiegel spiegel spiegelspiegel spiegel spiegel spiegel spiegelspiegel spiegel spiegel spiegel spiegel</p> --}}

        <div class="post-thumb">
            <img src="{{ Str::startsWith($feed['image'], 'http') ? $feed['image'] : asset($feed['image'])}}" alt="photo">
        </div>

        {{-- <ul class="children single-children">
            <li class="comment-item">
                <div class="post__author author vcard inline-items">
                    <img src="{{ asset('img/spiegel.jpg') }}" alt="author">
                    <div class="author-date">
                        <a class="h6 post__author-name fn" href="#">{{ $feed->imageable['full_name'] }}</a>
                        <div class="post__date">
                            <time class="published" datetime="{{ $feed['created_at'] }}">
                                {{ $feed['created_at'] }}
                            </time>
                        </div>
                    </div>
                </div>

                <p>spiegel spiegel spiegel spiegel spiegel spiegel spiegel</p>
            </li>
        </ul> --}}

        <div class="post-additional-info inline-items">

            <a href="#" id="like_image_{{ $feed['id'] }}" data-like_id="{{ $feed->likes->where('authorable_id', auth()->user()->id)->where('authorable_type', 'App\User')->isNotEmpty() ? $feed->likes->where('authorable_id', auth()->user()->id)->where('authorable_type', 'App\User')->first()->id : 0 }}" class="post-add-icon inline-items {{ $feed->likes->where('authorable_id', auth()->user()->id)->where('authorable_type', 'App\User')->isNotEmpty() ? 'like_it' : ''}}" onclick="event.preventDefault(); like_it({{ $feed['id'] }}, 'image');">
                <svg class="olymp-heart-icon">
                    <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-heart-icon') }}"></use>
                </svg>
                <span>{{ count($feed->likes) }}</span>
            </a>
            <form  method="POST" id="form_like_image_{{ $feed['id'] }}">
                @csrf
                <input type="hidden" name="likeable_type" value="App\Image">
                <input type="hidden" name="likeable_id" value="{{ $feed['id'] }}">
                <input type="hidden" name="authorable_type" value="App\User">
                <input type="hidden" name="authorable_id" value="{{ $comment_author->id }}">
            </form>
            <ul class="friends-harmonic" id="avatars_image_{{ $feed['id'] }}">
                @foreach ($feed->likes->slice(-2) as $item)
                <li>
                    <a href="{{ route('user.show', ['user' => $item->authorable['id']]) }}">
                        <img src="{{ asset($item->authorable['avatar']) }}" alt="{{ $item->authorable['full_name'] }}">
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="names-people-likes" id="names_image_{{ $feed['id'] }}">
                @foreach ($feed->likes->slice(-2) as $item)
                    <a href="{{ route('user.show', ['user' => $item->authorable['id']]) }}">{{ $item->authorable['name'] }}</a>
                @endforeach
                @if (count($feed->likes) > 2)
                    и еще
                    <br>{{ count($feed->likes) - 2 }} человк(а)
                @endif
            </div>
            <div class="comments-shared">
                <a href="#" class="post-add-icon inline-items">
                    <svg class="olymp-speech-balloon-icon">
                        <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-speech-balloon-icon') }}"></use>
                    </svg>
                    <span>{{ count($feed->comments) }}</span>
                </a>

                <a href="#" class="post-add-icon inline-items">
                    <svg class="olymp-share-icon">
                        <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-share-icon') }}"></use>
                    </svg>
                    <span>16</span>
                </a>
            </div>

        </div>

        <div class="control-block-button post-control-button">

            <a href="#" class="btn btn-control">
                <svg class="olymp-like-post-icon">
                    <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-like-post-icon') }}"></use>
                </svg>
            </a>

            <a href="#" class="btn btn-control">
                <svg class="olymp-comments-post-icon">
                    <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-comments-post-icon') }}"></use>
                </svg>
            </a>

            <a href="#" class="btn btn-control">
                <svg class="olymp-share-icon">
                    <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-share-icon') }}"></use>
                </svg>
            </a>

        </div>
        @component('user.components.feed.comments',['comments' => $feed->comments])@endcomponent
        @component('user.components.feed.write_comment',['comment_author' => $comment_author])
        @slot('commentable_id')
         {{ $feed['id'] }}
        @endslot
        @slot('commentable_type')
        App\Image
        @endslot
        @endcomponent
        <a href="#" class="more-comments">Показать комментарии <span>+</span></a>
    </article>
</div>
