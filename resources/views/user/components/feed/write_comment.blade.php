<form class="comment-form inline-items" method="POST" action="{{ route('comment.store') }}" id="write_comment_{{ $feed }}" style="display:none;">
    @csrf
    <input type="hidden" name="commentable_type" value="{{ $commentable_type }}">
    <input type="hidden" name="commentable_id" value="{{ $commentable_id }}">
    <input type="hidden" name="authorable_type" value="App\Models\User">
    <input type="hidden" name="authorable_id" value="{{ $comment_author->id }}">
    <div class="post__author author vcard inline-items">
        <img src="{{ asset($comment_author->avatar) }}" alt="author">
        <div class="form-group with-icon-right">
            <textarea class="form-control" placeholder="" name="text"></textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-md-2 btn-primary">Запостить комментарий</button>
    <button class="cancel btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Отмена</button>
</form>
