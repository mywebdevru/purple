<ul class="comments-list"  x-bind:class="{'feed-hide' : !!!show_comments, 'feed-show' : !!show_comments}">
        @foreach ($comments as $comment)
           <livewire:feed.comment :comment="$comment" />
        @endforeach
</ul>
