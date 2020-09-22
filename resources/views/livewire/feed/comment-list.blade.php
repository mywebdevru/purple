<ul class="comments-list"  x-bind:class="{'feed-hide' : !!!show_comments}">
        @foreach ($comments as $item)
            @component('user.components.feed.comment_body', ['item' => $item])@endcomponent
        @endforeach
</ul>
