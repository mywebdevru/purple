<template>
<div>
    <div class="modal-content">
        <div class="modal-header">
            <span class="icon-status online"></span>
            <h6 class="title" >Чат</h6>
            <div class="more">
                <svg class="olymp-three-dots-icon"><use href="/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                <svg class="olymp-little-delete js-chat-open" @click="$parent.chatClose"><use href="/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
            </div>
        </div>
        <div class="modal-body">
            <div v-if="messages === null" class="text-center py-3">Сообщения не загружены</div>
            <div v-else-if="messagesStatus === 'loading'" class="text-center py-3">Загрузка сообщений...</div>
            <div v-else-if="messagesStatus === 'success' && messages.data.length === 0" class="text-center py-3">Этот чат пуст</div>
            <div v-else-if="messagesStatus === 'success' && messages.data.length > 0" class="mCustomScrollbar">
                <ul class="notification-list chat-message chat-message-field">
                   <li class=""
                       v-for="(message,index) in messages.data"
                       :key="index"
                       :class="{ 'friend-message' : !message.data.attributes.user_message}">
                        <div class="author-thumb">
                            <img :src="message.data.attributes.sent_by.data.attributes.avatar" alt="author" class="mCS_img_loaded">
                        </div>
                        <div class="notification-event">
                            <span class="chat-message-item">{{ message.data.attributes.body }}</span>
                            <span class="notification-date">{{ message.data.attributes.sent_at }}</span>
                        </div>
                    </li>
                </ul>
            </div>

            <form class="need-validation" @keyup.enter="$parent.sendMessage">

                <div class="form-group">
                    <textarea class="form-control" placeholder="Введите сообщение..." v-model="$parent.message"></textarea>
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
</template>

<script>
import {mapGetters} from "vuex";

export default {
    name: "Chat",
    computed: {
        ...mapGetters({
            messages: "messages",
            messagesStatus: "messagesStatus",
        }),
    },
}
</script>

<style scoped lang="sass">
.popup-chat-responsive.open-chat .mCustomScrollbar
    overflow-y: scroll
.popup-chat .chat-message-field .friend-message .author-thumb
    float: right
.popup-chat .chat-message-field .friend-message .chat-message-item
    background-color: #7c5ac2
    color: #fff
</style>
