const state = {
    messages: null,
    messagesStatus: null,
    chatId: null,
};
const getters = {
    messages: state => {
        return state.messages;
    },
    messagesStatus: state => {
        return state.messagesStatus;
    },
    chatId: state => {
        return state.chatId;
    }
};
const actions = {
    async fetchChatMessages({commit}, recipientId){
        commit("setMessagesStatus", "loading");
        try {
            const messages = (await axios.get('/api/messages', {params: {recipient_id: recipientId}})).data;
            commit("setMessages", messages);
            commit("setMessagesStatus", "success");
        } catch (error) {
            commit("setMessagesStatus", "error");
        }
    },
};
const mutations = {
    setMessages(state, messages) {
        state.messages = messages;
    },
    setMessagesStatus(state, status) {
        state.messagesStatus = status;
    },
    pushMessage(state, message) {
        state.messages.data.push(message);
    },
    setChatId(state, id) {
        state.chatId = id;
    }
};

export default { state, getters, actions, mutations };
