function likeIt(item)
    {
        let data =item.data()
        if(item.hasClass('can_like')){
            item.toggleClass('can_like')
            let route ='../like';
            if(item.hasClass('like_it')){
                route = `${route}/${data.id}`
                item.children('form').append('<input type="hidden" name="_method" value="DELETE">')
            }

            $.ajax({
                type: "POST",
                url: route,
                data: item.children('form').serialize(),
                dataType: "JSON",
                success: function (response) {
                    if(!!response['error']){
                        console.log(response['error'])
                    }
                    count = response['likes'].length
                    if (data.model != 'Comment'){
                        item.parents('.post-additional-info').find('.friends-harmonic').html('')
                        item.parents('.post-additional-info').find('.names-people-likes').html('')
                        renderLikedUsers(response, item, count)
                    }
                    if(!!response['like_id']){
                        item.toggleClass('like_it')
                            .data('id', response['like_id'])
                            .children('span').text(count)
                    }
                    if(!!response['delete']){
                        item.children('form').find('input[name="_method"]').detach()
                        item.toggleClass('like_it')
                            .data('id', 0)
                            .children('span').text(count)
                    }
                    item.toggleClass('can_like')
                }
            });
        }
    }
    function renderLikedUsers(response, item, count)
    {
        if(count > 2) {
            likes = response['likes'].slice(-2)
        } else {
            likes = response['likes']
        }
        likes.forEach(like => {
            item.parents('.post-additional-info').find('.friends-harmonic').append(`<li><a href="${document.location.origin}/user/${like['authorable']['id']}">
                <img src="${document.location.origin}/${like['authorable']['avatar']}" alt="автор">
            </a></li>`)
            item.parents('.post-additional-info').find('.names-people-likes').append(`<a href="${document.location.origin}/user/${like['authorable']['id']}">${like['authorable']['name']} </a>`)
        });
        if (count > 2) {
            item.parents('.post-additional-info').find('.names-people-likes').append(` и еще <br>${count - 2} человк(а)`)
        }
    }
