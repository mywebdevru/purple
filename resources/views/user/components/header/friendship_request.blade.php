<li>
    <div class="author-thumb">
        <img src="{{ asset('img/spiegel.jpg') }}" alt="author">
    </div>
    <div class="notification-event">
    <a href="{{ route('user.show', ['user' => $request->user]) }}" class="h6 notification-friend">{{ $request->user->full_name }}</a>
        <span class="chat-message-item">{{ $request->user->location }}</span>
    </div>
    <span class="notification-icon">
        <a class="accept-request" href="#" onclick="event.preventDefault(); document.getElementById('accept-request-{{ $request->id }}').submit();">
            <form id="accept-request-{{ $request->id }}" action="{{ route('friend.store') }}" method="POST" style="display: none;">
                @csrf
                <input type="hidden" name="requested_friendship" value="{{ $request }}">
            </form>
            <span class="icon-add without-text">
                <svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
            </span>
        </a>
        <a class="accept-request request-del" href="#" onclick="event.preventDefault(); document.getElementById('request-del-{{ $request->id }}').submit();">
            <form id="request-del-{{ $request->id }}" action="{{ route('friendship_request.destroy', ['friendship_request' => $request]) }}" method="POST" style="display: none;">
                @method('DELETE')
                @csrf
            </form>
            <span class="icon-minus">
                <svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
            </span>
        </a>
    </span>
    <div class="more">
        <svg class="olymp-three-dots-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use></svg>
    </div>
</li>
