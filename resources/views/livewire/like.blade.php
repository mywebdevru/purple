<div class="inline-items">
<a href="#" wire:click.prevent="toogleLike" class="post-add-icon inline-items {{ !!$isMyLike ? 'like_it' : '' }}">
        <svg class="olymp-heart-icon">
            <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-heart-icon') }}"></use>
        </svg>
    <span>{{ count($likes) }}</span>
    </a>
    <ul class="friends-harmonic">
        @foreach ($likes->slice(-2) as $like)
        <li>
            <a href="{{ route('user.show', ['user' => $like->authorable['id']]) }}">
                <img src="{{ asset($like->authorable['avatar']) }}" alt="автор">
            </a>
        </li>
        @endforeach
    </ul>
    <div class="names-people-likes">
        @foreach ($likes->slice(-2) as $like)
            <a href="{{ route('user.show', ['user' => $like->authorable['id']]) }}">{{ $like->authorable['name'] }}</a>
        @endforeach
        @if (count($likes) > 2)
            и еще
            <br>{{ count($likes) - 2 }} человк(а)
        @endif
    </div>
</div>
