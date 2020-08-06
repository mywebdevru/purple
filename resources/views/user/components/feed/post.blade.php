<div class="ui-block revealator-fade revealator-delay2 revealator-once">
    <!-- Пост -->
    <article class="hentry post">
        <div class="post__author author vcard inline-items">
            <img  src="{{ Str::startsWith($feed->postable['avatar'], 'http') ? $feed->postable['avatar'] : asset($feed->postable['avatar'])}}" alt="author">
            {{-- @dump($feed) --}}
            <div class="author-date">
            <a class="h6 post__author-name fn" href="{{ route(Str::lower(class_basename($feed->postable)).'.show', $feed->postable['id']) }}">{{ $feed->postable['full_name'] }}</a>
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
        <p>
            {!! $feed['text'] !!}
        </p>
        <div class="post-additional-info inline-items">
            <a href="#" class="post-add-icon inline-items">
                <svg class="olymp-heart-icon">
                    <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-heart-icon') }}"></use>
                </svg>
                <span>{{ count($feed->comments) }}</span>
            </a>
            <ul class="friends-harmonic">
                @foreach ($feed->comments->slice(-2) as $item)
                <li>
                    <a href="#">
                        <img src="{{ asset($item->authorable['avatar']) }}" alt="{{ $item->authorable['full_name'] }}">
                    </a>
                </li>
                @break($loop->index == 6)
                @endforeach
            </ul>
            <div class="names-people-likes">
                @foreach ($feed->comments->slice(-2) as $item)
                    <a href="#">{{ $item->authorable['name'] }}</a>
                @endforeach
                @if (count($feed->comments) > 2)
                    и еще
                    <br>{{ count($feed->comments) - 2 }} человк(а)
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
                    <span>4</span>
                </a>
            </div>
        </div>

        <div class="control-block-button post-control-button">

            <a href="#" class="btn btn-control featured-post">
                <svg class="olymp-trophy-icon">
                    <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-trophy-icon') }}"></use>
                </svg>
            </a>

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
         'App\Post'
        @endslot
        @endcomponent
        <a href="#" class="more-comments">Показать комментарии <span>+</span></a>


    </article>
</div><!-- .. окончание Поста -->
                {{-- <li class="comment-item has-children">
                    <div class="post__author author vcard inline-items">
                        <img src="{{ asset('img/spiegel.jpg') }}" alt="author">

                        <div class="author-date">
                            <a class="h6 post__author-name fn" href="#">spiegel</a>
                            <div class="post__date">
                                <time class="published" datetime="2017-03-24T18:18">
                                    1 час назад
                                </time>
                            </div>
                        </div>

                        <a href="#" class="more">
                            <svg class="olymp-three-dots-icon">
                                <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
                            </svg>
                        </a>

                    </div>

                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugiten, sed quia
                        consequuntur magni dolores eos qui ratione voluptatem sequi en lod nesciunt. Neque porro
                        quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur adipisci velit en lorem ipsum der.
                    </p>

                    <a href="#" class="post-add-icon inline-items">
                        <svg class="olymp-heart-icon">
                            <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-heart-icon') }}"></use>
                        </svg>
                        <span>5</span>
                    </a>
                    <a href="#" class="reply">Ответить</a>

                    <ul class="children">
                        <li class="comment-item">
                            <div class="post__author author vcard inline-items">
                                <img src="{{ asset('img/spiegel.jpg') }}" alt="author">

                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="#">spiegel</a>
                                    <div class="post__date">
                                        <time class="published" datetime="2017-03-24T18:18">
                                            39 минут назад
                                        </time>
                                    </div>
                                </div>

                                <a href="#" class="more">
                                    <svg class="olymp-three-dots-icon">
                                        <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
                                    </svg>
                                </a>

                            </div>

                            <p>spiegel spiegel spiegel spiegel spiegel spiegel spiegel</p>

                            <a href="#" class="post-add-icon inline-items">
                                <svg class="olymp-heart-icon">
                                    <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-heart-icon') }}"></use>
                                </svg>
                                <span>2</span>
                            </a>
                            <a href="#" class="reply">Ответить</a>
                        </li>
                        <li class="comment-item">
                            <div class="post__author author vcard inline-items">
                                <img src="{{ asset('img/spiegel.jpg') }}" alt="author">

                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="#">spiegel</a>
                                    <div class="post__date">
                                        <time class="published" datetime="2017-03-24T18:18">
                                            24 минут назад
                                        </time>
                                    </div>
                                </div>

                                <a href="#" class="more">
                                    <svg class="olymp-three-dots-icon">
                                        <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
                                    </svg>
                                </a>

                            </div>

                            <p>spiegel spiegel spiegel spiegel spiegel</p>

                            <a href="#" class="post-add-icon inline-items">
                                <svg class="olymp-heart-icon">
                                    <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-heart-icon') }}"></use>
                                </svg>
                                <span>0</span>
                            </a>
                            <a href="#" class="reply">Ответить</a>

                        </li>
                    </ul>

                </li> --}}



