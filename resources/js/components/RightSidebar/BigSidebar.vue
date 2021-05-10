<template>
<div class="fixed-sidebar-right sidebar--large" id="sidebar-right-1">

    <div class="mCustomScrollbar" data-mcs-theme="dark">

        <div class="ui-block-title ui-block-title-small">
            <a href="#" class="title">Друзья</a>
            <a href="#">Настройки</a>
        </div>

        <ul class="chat-users">
            <!--                    loop-->
            <li v-for="(friend, index) in friends" :key="index" class="inline-items js-chat-open">
                <div class="author-thumb">
                    <img alt="author" :src="friend.data.attributes.avatar" class="avatar" @click="$parent.startChat(friend.data.user_id)">
                    <span class="icon-status online"></span>
                </div>

                <div class="author-status">
                    <a :href="friend.links.self" class="h6 author-name">{{ friend.data.attributes.full_name }}</a>
                    <span class="status">ONLINE</span>
                </div>
                <!-- Если нужно будет активировать менюшку, заменить классы на more диву ниже-->
                <div @click="$parent.kickChatHandler(friend.data.user_id)" class="float-right mt-1"><svg class="olymp-close-icon"><use href="/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>

                    <ul class="more-icons">
                        <li @click="$parent.startChat(friend.data.user_id)">
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

        <a href="#" class="js-sidebar-open" @click.prevent="$parent.sidebarToggle">
            <svg class="olymp-close-icon"><use href="/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
        </a>
    </div>

    <a href="#" class="olympus-chat inline-items js-chat-open">

        <h6 class="olympus-chat-title">Чат</h6>
        <svg class="olymp-chat---messages-icon"><use href="/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
    </a>

</div>
</template>

<script>
export default {
    name: "BigSidebar",
    props: {
        friends: {
            type: Array,
            required: false,
        }
    },
}
</script>

<style scoped>

</style>
