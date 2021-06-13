<template>
<div>
    <div class="fixed-sidebar right" :class="[{'open' : sidebarOpen}]">
        <SmallSidebar class="fixed-sidebar-right sidebar--small" :friends="chats.data" />
        <BigSidebar class="fixed-sidebar-right sidebar--small" :friends="showFriends ? authUserFriends.data : chats.data" />
    </div>

    <!-- ... окончание правого сайдбара -->

    <!--  Компонент нефункционален. Просто спрятал лапшу html   -->
    <MobileSidebar />
    <!-- ... окончание правого сайдбара под мобилу -->
    <!-- Блок чата -->
    <Chat class="ui-block popup-chat popup-chat-responsive popup-chat open-chat"
          v-if="chatShow"
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
import BigSidebar from "./BigSidebar";
import Chat from "./Chat";
import MobileSidebar from "./MobileSidebar";

export default {
    name: "RightSidebar",
    components: {BigSidebar, MobileSidebar, Chat, SmallSidebar},
    data: () => {
        return {
            chatShow: false,
            message: '',
            recipient: null,
            sidebarOpen: false,
        }
    },
    methods: {
        async startChat(userId) {
            this.chatClose();
            this.sidebarOpen = false;
            this.chatShow = true;
            this.recipient = userId;
            await this.$store.dispatch("fetchChatMessages", this.recipient);
            await this.$store.dispatch("markChatIsRead",  this.recipient);
            this.$store.commit("setChatId", userId);
            await this.$store.dispatch("fetchChats");
            this.$refs.chat.focus();
        },
        chatClose() {
            this.chatShow = false;
            this.recipient = null;
            this.message = '';
            this.$store.commit("setMessages", null);
            this.$store.commit("setChatId", null);
        },
        async kickChatHandler(chatId) {
            await this.$store.dispatch("kickChat", chatId);
        },
        sidebarToggle() {
            this.chatClose();
            this.sidebarOpen = !this.sidebarOpen;
        },
        async sendMessage() {
            if(this.message === null || this.recipient === null) {
                return;
            }
            try {
                const message = (await axios.post('/api/messages', { recipient_id: this.recipient, body: this.message })).data;
                this.$store.commit("pushMessage", message);
                await this.$store.dispatch("markChatIsRead", this.recipient);
                await this.$store.dispatch("fetchChats");
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
            chats: "chats",
            chatsStatus: "chatsStatus",
            showFriends: "showFriends"
        }),
    },
    mounted() {
        this.$store.dispatch("fetchAuthUser");
        this.$store.dispatch("fetchAuthUserFriends");
        this.$store.dispatch("fetchChats");
        Pusher.logToConsole = false;
        Echo.private('chat-message')
            .listen('MessageSentEvent', async (e) => {
                let chatOpened = false;
                if (this.authUser.data.user_id !== e.message.data.attributes.sent_to.data.user_id) {
                    return;
                }
                if (document.hidden || this.chatId !== e.message.data.attributes.sent_by.data.user_id) {
                    await this.$store.dispatch("fetchChats");
                    return;
                }
                if (document.hidden && this.chatId === e.message.data.attributes.sent_by.data.user_id) {
                    this.$store.commit("pushMessage", e.message);
                }
                if (!chatOpened && this.chatId === e.message.data.attributes.sent_by.data.user_id) {
                    e.message.data.attributes.user_message = false;
                    this.$store.commit("pushMessage", e.message);
                }
            })
            .listen('ChatStartRequestEvent', async (e) => {
                if (this.authUser.data.user_id !== e.user.id) {
                    return;
                }
                if(document.hidden) {
                    await this.$store.dispatch("fetchAuthUserFriends");
                    await this.$store.dispatch("fetchChats");
                    return;
                }
                if (this.chatId !== e.alien.id) {
                    await this.startChat(e.alien.id);
                }
            });
    },
}
</script>

<style scoped>

</style>
