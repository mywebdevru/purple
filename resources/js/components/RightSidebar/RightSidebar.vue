<template>
<div>
    <div class="fixed-sidebar right">
        <SmallSidebar class="fixed-sidebar-right sidebar--small" :friends="authUserFriends.data" />

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
                            <img alt="author" src="/img/spiegel.jpg" class="avatar">
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
    <Chat class="ui-block popup-chat popup-chat-responsive"
          :class="[{'popup-chat open-chat' : chatShow}]"
          tabindex="-1"
          role="dialog"
          aria-labelledby="popup-chat-responsive"
          aria-hidden="true"
          ref="chat" />
    <!-- Конец блока Чата -->
</div>
</template>

<script>
import {mapGetters} from "vuex";
import SmallSidebar from "./SmallSidebar";
import Chat from "./Chat";
import toastr from "toastr";

export default {
    name: "RightSidebar",
    components: {Chat, SmallSidebar},
    data: () => {
        return {
            chatShow: false,
            message: null,
            recipient: null,
        }
    },
    methods: {
        startChat(userId) {
            console.log(userId);
            this.chatClose();
            this.chatShow = true;
            this.recipient = userId;
            this.$store.dispatch("fetchChatMessages", this.recipient);
            this.$store.commit("setChatId", userId);
            this.$refs.chat.focus();
        },
        chatClose()
        {
            this.chatShow = false;
            this.recipient = null;
            this.message = null;
            this.$store.commit("setMessages", null);
            this.$store.commit("setChatId", null);

        },
        async sendMessage() {
            if(this.message === null || this.recipient === null) {
                return;
            }
            try {
                const message = (await axios.post('/api/messages', { recipient_id: this.recipient, body: this.message })).data;
                this.$store.commit("pushMessage", message);
            } catch (error) {
                console.log('Unable to fetch posts, ' + error.response);
            }
            this.message = null;
        }
    },
    computed: {
        ...mapGetters({
            authUser: "authUser",
            authUserFriends: "authUserFriends",
            messages: "messages",
            messagesStatus: "messagesStatus",
            chatId: "chatId",
        }),
    },
    mounted() {
        this.$store.dispatch("fetchAuthUser");
        this.$store.dispatch("fetchAuthUserFriends");
        Pusher.logToConsole = true;
        Echo.channel('chat-message')
            .listen('MessageSentEvent', async (e) => {
                let chatOpened = false;
                if (this.authUser.data.user_id !== e.message.data.attributes.sent_to.data.user_id) {
                    return;
                }
                if (this.chatId !== e.message.data.attributes.sent_by.data.user_id) {
                    this.startChat(e.message.data.attributes.sent_by.data.user_id);
                    chatOpened = true
                }
                if (!chatOpened && this.chatId === e.message.data.attributes.sent_by.data.user_id) {
                    this.$store.commit("pushMessage", e.message);
                }
            });
    },
}
</script>

<style scoped>

</style>
