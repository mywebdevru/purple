<template>
<div>
    <div class="fixed-sidebar right">
        <div class="fixed-sidebar-right sidebar--small" id="sidebar-right">

            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <ul class="chat-users">
<!--                    loop -->
                    <li class="inline-items js-chat-open">
                        <div class="author-thumb">
                            <img alt="author" src="/img/spiegel.jpg" class="avatar">
                            <span class="icon-status online"></span>
                        </div>
                    </li>
<!--                    /loop -->
                </ul>
            </div>

            <div class="search-friend inline-items">
                <a href="#" class="js-sidebar-open">
                    <svg class="olymp-menu-icon"><use href="/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
                </a>
            </div>

            <a href="#" class="olympus-chat inline-items js-chat-open">
                <svg class="olymp-chat---messages-icon"><use href="/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
            </a>

        </div>

        <div class="fixed-sidebar-right sidebar--large" id="sidebar-right-1">

            <div class="mCustomScrollbar" data-mcs-theme="dark">

                <div class="ui-block-title ui-block-title-small">
                    <a href="#" class="title">Друзья</a>
                    <a href="#">Настройки</a>
                </div>

                <ul class="chat-users">
<!--                    loop-->
                    <li class="inline-items js-chat-open">
                        <div class="author-thumb">
                            <img alt="author" src="/img/spiegel.jpg" class="avatar">
                            <span class="icon-status online"></span>
                        </div>

                        <div class="author-status">
                            <a href="#" class="h6 author-name">Name</a>
                            <span class="status">ONLINE</span>
                        </div>
                        <div class="more"><svg class="olymp-three-dots-icon"><use href="/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>

                            <ul class="more-icons">
                                <li>
                                    <svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use href="/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
                                </li>

                                <li>
                                    <svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use href="/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use></svg>
                                </li>

                                <li>
                                    <svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use href="/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use></svg>
                                </li>
                            </ul>
                        </div>
                    </li>
<!-- /loop -->
                </ul>

            </div>

            <div class="search-friend inline-items">
                <form class="form-group" >
                    <input class="form-control" placeholder="Поиск друзей..." value="" type="text">
                </form>

                <a href="#" class="settings">
                    <svg class="olymp-settings-icon"><use href="/svg-icons/sprites/icons.svg#olymp-settings-icon"></use></svg>
                </a>

                <a href="#" class="js-sidebar-open">
                    <svg class="olymp-close-icon"><use href="/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                </a>
            </div>

            <a href="#" class="olympus-chat inline-items js-chat-open">

                <h6 class="olympus-chat-title">Чат</h6>
                <svg class="olymp-chat---messages-icon"><use href="/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
            </a>

        </div>
    </div>

    <!-- ... окончание правого сайдбара -->


    <!-- Правый сайдбар под мобилу -->

    <div class="fixed-sidebar right fixed-sidebar-responsive" id="sidebar-right-responsive">

        <div class="fixed-sidebar-right sidebar--small">
            <a href="#" class="js-sidebar-open">
                <svg class="olymp-menu-icon"><use href="/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
                <svg class="olymp-close-icon"><use href="/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
            </a>
        </div>

        <div class="fixed-sidebar-right sidebar--large">
            <div class="mCustomScrollbar" data-mcs-theme="dark">

                <div class="ui-block-title ui-block-title-small">
                    <a href="#" class="title">Друзья</a>
                    <a href="#">Настройки</a>
                </div>

                <ul class="chat-users">
                    <li class="inline-items js-chat-open">

                        <div class="author-thumb">
                            <img alt="author" src="/img/spiegel.jpg" class="avatar">
                            <span class="icon-status online"></span>
                        </div>

                        <div class="author-status">
                            <a href="#" class="h6 author-name">spiegel</a>
                            <span class="status">ONLINE</span>
                        </div>

                        <div class="more"><svg class="olymp-three-dots-icon"><use href="/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>

                            <ul class="more-icons">
                                <li>
                                    <svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use href="/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
                                </li>

                                <li>
                                    <svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use href="/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use></svg>
                                </li>

                                <li>
                                    <svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use href="/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use></svg>
                                </li>
                            </ul>

                        </div>

                    </li>
                    <li class="inline-items js-chat-open">

                        <div class="author-thumb">
                            <img alt="author" src="/img/spiegel.jpg" class="avatar">
                            <span class="icon-status online"></span>
                        </div>

                        <div class="author-status">
                            <a href="#" class="h6 author-name">spiegel</a>
                            <span class="status">AT WORK!</span>
                        </div>

                        <div class="more"><svg class="olymp-three-dots-icon"><use href="/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>

                            <ul class="more-icons">
                                <li>
                                    <svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use href="/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
                                </li>

                                <li>
                                    <svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use href="/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use></svg>
                                </li>

                                <li>
                                    <svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use href="/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use></svg>
                                </li>
                            </ul>

                        </div>

                    </li>

                    <li class="inline-items js-chat-open">


                        <div class="author-thumb">
                            <img alt="author" src="img/spiegel.jpg" class="avatar">
                            <span class="icon-status online"></span>
                        </div>

                        <div class="author-status">
                            <a href="#" class="h6 author-name">spiegel</a>
                            <span class="status">ONLINE</span>
                        </div>

                        <div class="more"><svg class="olymp-three-dots-icon"><use href="/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>

                            <ul class="more-icons">
                                <li>
                                    <svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use href="/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
                                </li>

                                <li>
                                    <svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use href="/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use></svg>
                                </li>

                                <li>
                                    <svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use href="/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use></svg>
                                </li>
                            </ul>

                        </div>


                    </li>

                    <li class="inline-items js-chat-open">


                        <div class="author-thumb">
                            <img alt="author" src="/img/spiegel.jpg" class="avatar">
                            <span class="icon-status away"></span>
                        </div>

                        <div class="author-status">
                            <a href="#" class="h6 author-name">spiegel</a>
                            <span class="status">AWAY</span>
                        </div>

                        <div class="more"><svg class="olymp-three-dots-icon"><use href="/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>

                            <ul class="more-icons">
                                <li>
                                    <svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use href="/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
                                </li>

                                <li>
                                    <svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use href="/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use></svg>
                                </li>

                                <li>
                                    <svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use href="/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use></svg>
                                </li>
                            </ul>

                        </div>


                    </li>

                    <li class="inline-items js-chat-open">


                        <div class="author-thumb">
                            <img alt="author" src="img/spiegel.jpg" class="avatar">
                            <span class="icon-status disconected"></span>
                        </div>

                        <div class="author-status">
                            <a href="#" class="h6 author-name">spiegel</a>
                            <span class="status">OFFLINE</span>
                        </div>

                        <div class="more"><svg class="olymp-three-dots-icon"><use href="/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>

                            <ul class="more-icons">
                                <li>
                                    <svg data-toggle="tooltip" data-placement="top" data-original-title="START CONVERSATION" class="olymp-comments-post-icon"><use href="/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
                                </li>

                                <li>
                                    <svg data-toggle="tooltip" data-placement="top" data-original-title="ADD TO CONVERSATION" class="olymp-add-to-conversation-icon"><use href="/svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use></svg>
                                </li>

                                <li>
                                    <svg data-toggle="tooltip" data-placement="top" data-original-title="BLOCK FROM CHAT" class="olymp-block-from-chat-icon"><use href="/svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use></svg>
                                </li>
                            </ul>

                        </div>


                    </li>
                </ul>

            </div>

            <div class="search-friend inline-items">
                <form class="form-group" >
                    <input class="form-control" placeholder="Поиск друзей..." value="" type="text">
                </form>

                <a href="" class="settings">
                    <svg class="olymp-settings-icon"><use href="/svg-icons/sprites/icons.svg#olymp-settings-icon"></use></svg>
                </a>

                <a href="#" class="js-sidebar-open">
                    <svg class="olymp-close-icon"><use href="/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                </a>
            </div>

            <a href="#" class="olympus-chat inline-items js-chat-open">

                <h6 class="olympus-chat-title">Чат</h6>
                <svg class="olymp-chat---messages-icon"><use href="/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
            </a>
        </div>

    </div>

    <!-- ... окончание правого сайдбара под мобилу -->
    <!-- Блок чата -->

    <div class="ui-block popup-chat popup-chat-responsive" tabindex="-1" role="dialog" aria-labelledby="popup-chat-responsive" aria-hidden="true">

        <div class="modal-content">
            <div class="modal-header">
                <span class="icon-status online"></span>
                <h6 class="title" >Чат</h6>
                <div class="more">
                    <svg class="olymp-three-dots-icon"><use href="/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                    <svg class="olymp-little-delete js-chat-open"><use href="/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                </div>
            </div>
            <div class="modal-body">
                <div class="mCustomScrollbar">
                    <ul class="notification-list chat-message chat-message-field">
                        <li>
                            <div class="author-thumb">
                                <img src="img/spiegel.jpg" alt="author" class="mCS_img_loaded">
                            </div>
                            <div class="notification-event">
                                <span class="chat-message-item">Lorem Lorem Lorem Lorem Lorem</span>
                                <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Вчера at 8:10pm</time></span>
                            </div>
                        </li>

                        <li>
                            <div class="author-thumb">
                                <img src="img/ii.jpg" alt="author" class="mCS_img_loaded">
                            </div>
                            <div class="notification-event">
                                <span class="chat-message-item">Lorem Lorem Lorem Lorem</span>
                                <span class="chat-message-item">Lorem Lorem Lorem Lorem</span>
                                <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Вчера at 8:29pm</time></span>
                            </div>
                        </li>

                        <li>
                            <div class="author-thumb">
                                <img src="/img/spiegel.jpg" alt="author" class="mCS_img_loaded">
                            </div>
                            <div class="notification-event">
                                <span class="chat-message-item">Lorem Lorem Lorem Lorem Lorem Lorem</span>
                                <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Вчера at 8:10pm</time></span>
                            </div>
                        </li>
                    </ul>
                </div>

                <form class="need-validation">

                    <div class="form-group">
                        <textarea class="form-control" placeholder="Введите сообщение..."></textarea>
                        <div class="add-options-message">
                            <a href="#" class="options-message">
                                <svg class="olymp-computer-icon"><use href="/svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>
                            </a>
                            <div class="options-message smile-block">

                                <svg class="olymp-happy-sticker-icon"><use href="/svg-icons/sprites/icons.svg#olymp-happy-sticker-icon"></use></svg>

                                <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat1.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat2.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat3.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat4.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat5.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat6.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat7.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat8.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat9.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat10.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat11.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat12.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat13.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat14.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat15.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat16.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat17.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat18.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat19.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat20.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat21.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat22.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat23.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat24.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat25.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat26.png" alt="icon">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/icon-chat27.png" alt="icon">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Конец блока Чата -->
</div>
</template>

<script>
export default {
    name: "RightSidebar"
}
</script>

<style scoped>

</style>
