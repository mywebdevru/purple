<template>
<div>
    <div class="mCustomScrollbar" data-mcs-theme="dark">
        <ul class="chat-users">
            <!--                    loop -->
            <li class="inline-items js-chat-open" @click="$parent.startChat(friend.data.user_id)" v-for="(friend, index) in friends" :key="index">
                <div class="author-thumb">
                    <img alt="author" :src="friend.data.attributes.avatar" class="avatar">
                    <span class="icon-status online"></span>
                    <span v-if="friend.data.chat.unread_messages_count" class="badge badge-danger">{{ friend.data.chat.unread_messages_count }}</span>
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
</template>

<script>
export default {
    name: "SmallSidebar",
    props: {
        friends: {
            type: Array,
            required: false,
        }
    },
}
</script>

<style scoped lang="sass">
.author-thumb
    position: relative
    .badge
        position: absolute
        top: -5px
        right: -5px
        z-index: 5
</style>
