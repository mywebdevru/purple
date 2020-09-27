<div class="ui-block"  x-data="{'show_comments' : @entangle('commentsIsShown')}" x-bind:class="{'feed-hide' : $wire.deleted}">
    <!-- Пост -->
    <article class="hentry post has-post-thumbnail shared-photo">

        <div class="post__author author vcard inline-items">
            <img src="{{ Str::startsWith($image->imageable['avatar'], 'http') ? $image->imageable['avatar'] : asset($image->imageable['avatar'])}}" alt="author">

            <div class="author-date">
                <a class="h6 post__author-name fn" href="{{ route(Str::lower(class_basename($image->imageable)).'.show', $image->imageable['id']) }}">{{ $image->imageable['full_name'] }}</a>
                {{-- shared
                <a href="#">spiegel</a>’s <a href="#">фото</a> --}}
                <div class="post__date">
                    <time class="published" datetime="{{ $image['created_at'] }}">
                        {{ $image['created_at'] }}
                    </time>
                </div>
            </div>
            @can('update', $image)
                <div class="more" x-data="{show_more: 1}" wire:loading.class="feed-load-scale-x">
                    <svg class="olymp-three-dots-icon" wire:loading.class="feed-load-scale-x">
                        <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
                    </svg>
                    <ul class="more-dropdown" x-show.transition.out="!!show_more">
                        {{-- <li>
                            <a href="#">Редактировать пост</a>
                        </li> --}}
                        <li>
                            <a href="#" @click.prevent="show_more = 0" wire:click="deleteImage">Удалить фото</a>
                        </li>
                    </ul>
                </div>
            @endcan
        </div>
        <div class="post-thumb">
            <img src="{{ Str::startsWith($image['image'], 'http') ? $image['image'] : asset($image['image'])}}" alt="photo">
        </div>
        <div class="post-additional-info inline-items">
            <a href="#" data-model="{{ Image::class }}"  data-id="{{ $image->likes->where('authorable_id', auth()->user()->id)->where('authorable_type', 'App\Models\User')->isNotEmpty() ? $image->likes->where('authorable_id', auth()->user()->id)->where('authorable_type', 'App\Models\User')->first()->id : 0 }}" class="post-add-icon inline-items can_like {{ $image->likes->where('authorable_id', auth()->user()->id)->where('authorable_type', 'App\Models\User')->isNotEmpty() ? 'like_it' : ''}} likes">
                <svg class="olymp-heart-icon">
                    <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-heart-icon') }}"></use>
                </svg>
                <span>{{ count($image->likes) }}</span>
                <form  method="POST">
                    @csrf
                    <input type="hidden" name="likeable_type" value="App\Models\Image">
                    <input type="hidden" name="likeable_id" value="{{ $image['id'] }}">
                    <input type="hidden" name="authorable_type" value="App\Models\User">
                    <input type="hidden" name="authorable_id" value="{{ auth()->user()->id }}">
                </form>
            </a>
            <ul class="friends-harmonic">
                @foreach ($image->likes->slice(-2) as $item)
                <li>
                    <a href="{{ route('user.show', ['user' => $item->authorable['id']]) }}">
                        <img src="{{ asset($item->authorable['avatar']) }}" alt="{{ $item->authorable['full_name'] }}">
                    </a>
                </li>
                @endforeach
            </ul>
            <div class="names-people-likes">
                @foreach ($image->likes->slice(-2) as $item)
                    <a href="{{ route('user.show', ['user' => $item->authorable['id']]) }}">{{ $item->authorable['name'] }}</a>
                @endforeach
                @if (count($image->likes) > 2)
                    и еще
                    <br>{{ count($image->likes) - 2 }} человк(а)
                @endif
            </div>
            <div class="comments-shared">
                <a href="#" class="post-add-icon inline-items" wire:click.prevent="toggleComments">
                    <svg class="olymp-speech-balloon-icon">
                        <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-speech-balloon-icon') }}"></use>
                    </svg>
                    <span>{{ count($image->comments) }}</span>
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
        @if (!!$commentsCount)
            <div class="more-comments-wrapper">
                {!! $showCommentsButton !!}
            </div>
            @if ($commentsIsLoaded)
                <ul class="comments-list"  x-bind:class="{'feed-hide' : !!!show_comments, 'comments-show' : !!show_comments}">
                    @foreach ($image->comments as $comment)
                    <livewire:feed.comment :comment="$comment" :key="$comment->id"/>
                    @endforeach
                </ul>
            @endif
        @endif
        <livewire:feed.write-comment :feedItem="$image" :key="'create_image_comment'.$image->id"/>
    </article>
</div>

