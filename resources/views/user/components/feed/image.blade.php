<div class="ui-block">
    <!-- Пост -->
    <article class="hentry post has-post-thumbnail shared-photo">

        <div class="post__author author vcard inline-items">
            <img src="{{ Str::startsWith($feed->feedable->imageable['avatar'], 'http') ? $feed->feedable->imageable['avatar'] : asset($feed->feedable->imageable['avatar'])}}" alt="author">

            <div class="author-date">
                <a class="h6 post__author-name fn" href="{{ route(Str::lower(class_basename($feed->feedable->imageable)).'.show', $feed->feedable->imageable['id']) }}">{{ $feed->feedable->imageable['full_name'] }}</a>
                {{-- shared
                <a href="#">spiegel</a>’s <a href="#">фото</a> --}}
                <div class="post__date">
                    <time class="published" datetime="{{ $feed->feedable['created_at'] }}">
                        {{ $feed->feedable['created_at'] }}
                    </time>
                </div>
            </div>
            @can('update', $feed->feedable)
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
            <img src="{{ Str::startsWith($feed->feedable['image'], 'http') ? $feed->feedable['image'] : asset($feed->feedable['image'])}}" alt="photo">
        </div>

        {{-- <ul class="children single-children">
            <li class="comment-item">
                <div class="post__author author vcard inline-items">
                    <img src="{{ asset('img/spiegel.jpg') }}" alt="author">
                    <div class="author-date">
                        <a class="h6 post__author-name fn" href="#">{{ $feed->feedable->imageable['full_name'] }}</a>
                        <div class="post__date">
                            <time class="published" datetime="{{ $feed->feedable['created_at'] }}">
                                {{ $feed->feedable['created_at'] }}
                            </time>
                        </div>
                    </div>
                </div>

                <p>spiegel spiegel spiegel spiegel spiegel spiegel spiegel</p>
            </li>
        </ul> --}}

        <div class="post-additional-info inline-items">

            <a href="#" id="like_image_{{ $feed->feedable['id'] }}" data-like_id="{{ $feed->feedable->likes->where('authorable_id', auth()->user()->id)->where('authorable_type', 'App\User')->isNotEmpty() ? $feed->feedable->likes->where('authorable_id', auth()->user()->id)->where('authorable_type', 'App\User')->first()->id : 0 }}" class="post-add-icon inline-items {{ $feed->feedable->likes->where('authorable_id', auth()->user()->id)->where('authorable_type', 'App\User')->isNotEmpty() ? 'like_it' : ''}}" onclick="event.preventDefault(); like_it({{ $feed->feedable['id'] }}, 'image');">
                <svg class="olymp-heart-icon">
                    <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-heart-icon') }}"></use>
                </svg>
                <span>{{ count($feed->feedable->likes) }}</span>
            </a>
            <form  method="POST" id="form_like_image_{{ $feed->feedable['id'] }}">
                @csrf
                <input type="hidden" name="likeable_type" value="App\Image">
                <input type="hidden" name="likeable_id" value="{{ $feed->feedable['id'] }}">
                <input type="hidden" name="authorable_type" value="App\User">
                <input type="hidden" name="authorable_id" value="{{ $comment_author->id }}">
            </form>
            <ul class="friends-harmonic" id="avatars_image_{{ $feed->feedable['id'] }}">
                @foreach ($feed->feedable->likes->slice(-2) as $item)
                <li>
                    <a href="{{ route('user.show', ['user' => $item->authorable['id']]) }}">
                        <img src="{{ asset($item->authorable['avatar']) }}" alt="{{ $item->authorable['full_name'] }}">
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="names-people-likes" id="names_image_{{ $feed->feedable['id'] }}">
                @foreach ($feed->feedable->likes->slice(-2) as $item)
                    <a href="{{ route('user.show', ['user' => $item->authorable['id']]) }}">{{ $item->authorable['name'] }}</a>
                @endforeach
                @if (count($feed->feedable->likes) > 2)
                    и еще
                    <br>{{ count($feed->feedable->likes) - 2 }} человк(а)
                @endif
            </div>
            <div class="comments-shared">
                <a href="#" class="post-add-icon inline-items" class="more-comments" onclick="event.preventDefault(); writeComment({{ $feed->feedable['id'] }}, 'image');">
                    <svg class="olymp-speech-balloon-icon">
                        <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-speech-balloon-icon') }}"></use>
                    </svg>
                    <span>{{ count($feed->feedable->comments) }}</span>
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
        <a href="#" id="comments_image{{ $feed->feedable['id'] }}" class="more-comments" onclick="event.preventDefault(); showComments({{ $feed->feedable['id'] }}, 'image');">Показать комментарии <span>+</span></a>
        @component('user.components.feed.comments',['comments' => $feed->feedable->comments, 'comment_author' => $comment_author,'feed' => 'image'.$feed->feedable['id']])@endcomponent
        @component('user.components.feed.write_comment',['comment_author' => $comment_author,'feed' => 'image'.$feed->feedable['id']])
        @slot('commentable_id')
         {{ $feed->feedable['id'] }}
        @endslot
        @slot('commentable_type')
        App\Image
        @endslot
        @endcomponent
    </article>
</div>
