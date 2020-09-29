$(document).ready(function() {
    $('#newsfeed-items-grid').on('click', '.likes', function(e){
        e.preventDefault()
        likeIt($(this))
    })
})
