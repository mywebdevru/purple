$(document).ready(function() {
    $('#newsfeed-items-grid').on('click', '.dropdown_menu_item', function(e){
        e.preventDefault()
        if($(this).hasClass('edit_post')){
            editPost($(this).parents('.hentry'))
           $(this).parents('.more-dropdown').fadeOut(200)
        }
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
