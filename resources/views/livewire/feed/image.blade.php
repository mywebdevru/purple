<div class="ui-block"  x-data="{'show_comments' : @entangle('commentsIsShown'), show_more:  @entangle('showMore')}" x-bind:class="{'feed-hide' : $wire.deleted}">
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
                <div class="more"  wire:loading.class="feed-load-scale-x">
                    <svg class="olymp-three-dots-icon" wire:loading.class="feed-load-scale-x">
                        <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
                    </svg>
                    <ul class="more-dropdown" x-show.transition.out="!!show_more">
                        <li>
                            <a href="#" @click.prevent="show_more = 0" wire:click="toggleEdit">Редактировать описание</a>
                        </li>
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
        <div>
            @if (!$editDescription)
                {!! $image->description !!}
            @else
                <div class="form-group" wire:ignore>
                    <label for="image{{ $image->id }}">Описание фото!</label>
                <div id="image{{ $image->id }}" class="form-control" name="text">{!! $description !!}</div>
                </div>
                <button type="submit" wire:click.prevent="saveDescription" class="btn btn-success" wire.loading.attr="disabled">
                    Сохранить
                </button>
            <script>
               let image_id = {{ $image->id }}
                const editor = $(`#image${image_id}`),
                    config = {
                        lang: 'ru-RU',
                        shortcuts: false,
                        airMode: false,
                        focus: false,
                        disableDragAndDrop: false,
                        toolbar: [
                            ['style', ['bold', 'italic', 'underline', 'strikethrough']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                        ],
                        callbacks: {
                            onChange: function(contents, $editable) {
                                @this.set('description',contents);
                            }
                        }
                    };
                editor.summernote(config);
            </script>
            @endif
        </div>
        <div class="post-additional-info inline-items">
            <livewire:like :item="$image"  :key="'likes'.$image->id" />
            <div class="comments-shared">
                <a href="#" class="post-add-icon inline-items" wire:click.prevent="toggleComments">
                    <svg class="olymp-speech-balloon-icon">
                        <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-speech-balloon-icon') }}"></use>
                    </svg>
                    <span>{{ $image->comments_count }}</span>
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
        @if (!!$image->comments_count)
            <div class="more-comments-wrapper">
                {!! $showCommentsButton !!}
            </div>
            @if ($commentsIsLoaded)
                <ul class="comments-list"  x-bind:class="{'feed-hide' : !!!show_comments, 'comments-show' : !!show_comments}">
                    @foreach ($image->comments->sortByDesc('created_at') as $comment)
                    <livewire:feed.comment :comment="$comment" :key="$comment->id"/>
                    @endforeach
                </ul>
            @endif
        @endif
        <livewire:feed.write-comment :feedItem="$image" :key="'create_image_comment'.$image->id"/>
    </article>
</div>

