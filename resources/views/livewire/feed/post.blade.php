<div class="ui-block" x-data x-bind:class="{'feed-hide' : $wire.deleted}">
    <!-- Пост -->
    <article  class="hentry post" data-id="{{ $post['id'] }}">
        <div class="post__author author vcard inline-items">
            <img  src="{{ Str::startsWith($post->postable['avatar'], 'http') ? $post->postable['avatar'] : asset($post->postable['avatar'])}}" alt="author">
            <div class="author-date">
            <a class="h6 post__author-name fn" href="{{ route(Str::lower(class_basename($post->postable)).'.show', $post->postable['id']) }}">{{ $post->postable['full_name'] }}</a>
                <div class="post__date">
                    <time class="published" datetime="{{ $post['created_at'] }}">
                        {{ $post['created_at'] }}
                    </time>
                </div>
            </div>
            @can('update', $post)
            <div class="more" x-data="{show_more: 1}" wire:loading.class="feed-load-scale-x">
                <svg class="olymp-three-dots-icon">
                    <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
                </svg>
                <ul class="more-dropdown" x-show.transition.out="!!show_more">
                    <li>
                        <a href="#"  class="edit_post dropdown_menu_item">Редактировать пост</a>
                    </li>
                    <li>
                        <a href="#" @click.prevent="show_more = 0" wire:click="deletePost">Удалить пост</a>
                    </li>
                </ul>
            </div>
            @endcan
        </div>
        <div class="can_edit post_body">
            {!! $post['text'] !!}
        </div>
        <div class="post-additional-info inline-items">
            <a href="#" data-model="{{ Post::class }}" data-id="{{ $post->likes->where('authorable_id', auth()->user()->id)->where('authorable_type', 'App\Models\User')->isNotEmpty() ? $post->likes->where('authorable_id', auth()->user()->id)->where('authorable_type', 'App\Models\User')->first()->id : 0 }}" class="post-add-icon inline-items can_like {{ $post->likes->where('authorable_id', auth()->user()->id)->where('authorable_type', 'App\Models\User')->isNotEmpty() ? 'like_it' : ''}} likes">
                <svg class="olymp-heart-icon">
                    <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-heart-icon') }}"></use>
                </svg>
                <span>{{ count($post->likes) }}</span>
                <form  method="POST">
                    @csrf
                    <input type="hidden" name="likeable_type" value="App\Models\Post">
                    <input type="hidden" name="likeable_id" value="{{ $post['id'] }}">
                    <input type="hidden" name="authorable_type" value="App\Models\User">
                    <input type="hidden" name="authorable_id" value="{{ auth()->user()->id }}">
                </form>
            </a>
            <ul class="friends-harmonic">
                @foreach ($post->likes->slice(-2) as $item)
                <li>
                    <a href="{{ route('user.show', ['user' => $item->authorable['id']]) }}">
                        <img src="{{ asset($item->authorable['avatar']) }}" alt="автор">
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="names-people-likes">
                @foreach ($post->likes->slice(-2) as $item)
                    <a href="{{ route('user.show', ['user' => $item->authorable['id']]) }}">{{ $item->authorable['name'] }}</a>
                @endforeach
                @if (count($post->likes) > 2)
                    и еще
                    <br>{{ count($post->likes) - 2 }} человк(а)
                @endif
            </div>
            <div class="comments-shared">
                <a href="#" class="post-add-icon inline-items show_comments">
                    <svg class="olymp-speech-balloon-icon">
                        <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-speech-balloon-icon') }}"></use>
                    </svg>
                    <span class="comments_count">{{ count($post->comments) }}</span>
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
        <a href="#" class="more-comments show_comments">Показать комментарии <span>+</span></a>
        @component('user.components.feed.comments',['comments' => $post->comments])@endcomponent
        @component('user.components.feed.write_comment')
            @slot('commentable_id')
            {{ $post['id'] }}
            @endslot
            @slot('commentable_type')
            App\Models\Post
            @endslot
        @endcomponent
    </article>
</div>
