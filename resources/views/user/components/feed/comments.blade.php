<ul class="comments-list"  style="display:none;">
    @foreach ($comments as $item)
        @component('user.components.feed.comment_body', ['item' => $item])@endcomponent
    @endforeach
</ul>
