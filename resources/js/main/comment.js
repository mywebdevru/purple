function showComments(feed)
{
    let commentsList = feed.find('.comments-list')
    let button = feed.find('.more-comments')
    let commentForm = feed.find('.write_comment')
    commentsList.slideToggle()
    if(button.children('span').text() =='+'){
        button.html('Скрыть комментарии <span>-</span>')
        writeComment(feed)
    } else {
        button.html('Показать комментарии <span>+</span>')
        commentForm.slideUp()
        commentForm.unbind('submit')
        commentForm.children('button').not('[type]').unbind('click')
    }
}

function writeComment(feed)
{
    let commentCount = 0
    let commentForm = feed.find('.write_comment')
    commentForm.slideToggle()
    commentForm.children('button').not('[type]').click(function (e){
        e.preventDefault()
        commentForm.find('textarea').val('')
        showComments(feed)
    })
    commentForm.submit(function (e) {
        e.preventDefault()
        commentCount = +feed.find('.comments_count').text()
        $(this).children('button').prop('disabled', true)
        $.ajax({
            type: "POST",
            url: `${document.location.origin}/comment`,
            data: $(this).serialize(),
            dataType: "JSON",
            success: function (response) {
                if(!!response){
                    renderComment(response, feed)
                    commentForm.find('textarea').val('')
                    commentForm.children('button').removeAttr("disabled")
                    feed.find('.comments_count').text(++commentCount)
                }
            }
        });
    })
}

function renderComment(response, feed)
{
    feed.find('.comments-list').append(response['comment'])
}

function editComment(href)
{
    let commentId = href.data('id')
    let comment = href.parents('.comment-item').find('p')
    if(comment.hasClass('can_edit')){
        comment.toggleClass('can_edit')
        commentText = comment.text()
        comment.html(`<form class="comment-form inline-items" method="POST" action=""
                        <div class="post__author author vcard inline-items">
                            <div class="form-group with-icon-right">
                                <textarea class="form-control" placeholder="" name="text">${commentText}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-md-2 btn-primary">Сохранить</button>
                        <button class="cancel btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Отмена</button>
                    </form>`)
        comment.find('.cancel').click(function(e){
            e.preventDefault()
            comment.html(commentText)
            comment.toggleClass('can_edit')
            href.parents('.more-dropdown').show()
        })
        comment.children('form').submit(function(e) {
            e.preventDefault()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "patch",
                url: `${document.location.origin}/comment/${commentId}`,
                data: $(this).serialize(),
                dataType: "JSON",
                success: function (response) {
                    if(!!response['text']){
                        comment.html(response['text'])
                        comment.toggleClass('can_edit')
                        href.parents('.more-dropdown').show()
                    }
                }
            })
        })
    }
}

function deleteComment(href)
{
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    let data = href.data()
    let comment = href.parents('.comment-item')
    let commentCount = +href.parents('.hentry').find('.comments_count').text()
    $.ajax({
        type: "delete",
        url: `${document.location.origin}/comment/${data.id}`,
        data: '',
        dataType: "JSON",
        success: function (response) {
            if(!!response['deleted']){
                comment.slideUp(300)
                href.parents('.hentry').find('.comments_count').text(--commentCount)
            }
        }
    });
}
