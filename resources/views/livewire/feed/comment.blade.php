<li class="comment-item" x-data="{ show_comment: 1 }" x-show.transition.out.duration.300ms="!!show_comment">
    <div class="comment__author author vcard inline-items">
        <img src="{{ asset($comment->authorable['avatar']) }}" alt="автор">
        <div class="author-date">
            <a class="h6 post__author-name fn" href="{{ route('user.show',['user' => $comment->authorable['id']]) }}">
                {{ $comment->authorable['full_name'] }}
            </a>
            <div class="comment__date">
                <time class="published" datetime="{{ $comment['created_at'] }}">
                    {{ $comment['created_at'] }}
                </time>
            </div>
        </div>
        {{-- @can('update', $comment) --}}
        <div class="more" x-data="{show_more: 1}" wire:loading.class="feed-load-scale-x" wire:target ="deleteComment">
            <svg class="olymp-three-dots-icon">
                <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
            </svg>
            <ul class="more-dropdown" x-show.transition.out="!!show_more">
                <li>
                    <a href="#" @click.prevent="show_more = 0" wire:click="setEditStatus">Редактировать коммент</a>
                </li>
                <li>
                    <a href="#" @click.prevent="show_comment = 0" wire:click="deleteComment">Удалить коммент</a>
                </li>
            </ul>
        </div>
        {{-- @endcan --}}
    </div>
    @if (!$nowEdit)
        <p>{{ $comment['text'] }}</p>
    @else
        <livewire:feed.write-comment :comment="$comment" />
    @endif
    <a href="#" data-model="{{ Comment::class }}" data-id="{{ $comment->likes->where('authorable_id', auth()->user()->id)->where('authorable_type', 'App\Models\User')->isNotEmpty() ? $comment->likes->where('authorable_id', auth()->user()->id)->where('authorable_type', 'App\Models\User')->first()->id : 0 }}" class="post-add-icon inline-items can_like {{ $comment->likes->where('authorable_id', auth()->user()->id)->where('authorable_type', 'App\Models\User')->isNotEmpty() ? 'like_it' : ''}} likes">
        <form  method="POST">
            @csrf
            <input type="hidden" name="likeable_type" value="App\Models\Comment">
            <input type="hidden" name="likeable_id" value="{{ $comment['id'] }}">
            <input type="hidden" name="authorable_type" value="App\Models\User">
            <input type="hidden" name="authorable_id" value="{{ auth()->user()->id }}">
        </form>
        <svg class="olymp-heart-icon">
            <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-heart-icon') }}"></use>
        </svg>
        <span>{{ count($comment->likes) }}</span>
    </a>
    <a href="#" class="reply">Ответить</a>
</li>

