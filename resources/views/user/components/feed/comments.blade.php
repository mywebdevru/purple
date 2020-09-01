<ul class="comments-list" id="comments_list_{{ $feed }}" style="display:none;">
    @foreach ($comments as $item)
        @component('user.components.feed.comment_body', ['item' => $item, 'feed' => $feed, 'comment_author' => auth()->user()])@endcomponent
    @endforeach
</ul>
