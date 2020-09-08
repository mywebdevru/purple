$(document).ready(function() {
    $('#newsfeed-items-grid').on('click', '.dropdown_menu_item', function(e){
        e.preventDefault()
        if($(this).hasClass('edit_comment')){
            editComment($(this))
            $(this).parents('.more-dropdown').fadeOut(200)
        }
        if($(this).hasClass('delete_comment')){
            deleteComment($(this))
            $(this).parents('.more-dropdown').fadeOut(200)
        }
        if($(this).hasClass('edit_post')){
            editPost($(this).parents('.hentry'))
           $(this).parents('.more-dropdown').fadeOut(200)
        }
        if($(this).hasClass('delete_post')){
            deletePost($(this).parents('.hentry'))
           $(this).parents('.more-dropdown').fadeOut(200)
        }
    })
    .on('click', '.show_comments', function(e){
        e.preventDefault()
        showComments($(this).parents('.hentry'))
    })
    .on('click', '.likes', function(e){
        e.preventDefault()
        likeIt($(this))
    })
    $('.create_post').click(function(e){
        e.preventDefault()
        let post = $('.new_post')
        if (!!!post.data('id')){
            createPost(post)
        }
    })
})
