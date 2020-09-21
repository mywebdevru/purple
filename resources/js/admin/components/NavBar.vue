<template>
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">
            <li class="d-none d-sm-block">
                <form class="app-search">
                    <div class="app-search-box">
                        <div class="input-group">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Search..."
                            />
                            <div class="input-group-append">
                                <button
                                    class="btn"
                                    type="submit"
                                >
                                    <i class="fe-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </li>
            <b-nav-item-dropdown
                right
                class="notification-list"
            >
                <template
                    slot="button-content"
                    class="nav-link dropdown-toggle  waves-effect waves-light"
                >
                    <i class="fe-bell noti-icon"></i>
                    <span class="badge badge-danger noti-icon-badge" v-if="unreadNotificationsCount">{{ unreadNotificationsCount }}</span>
                </template>

                <b-dropdown-text
                    href="#"
                    class="dropdown-item noti-title"
                >
                    <h5 class="m-0">
                        <span class="float-right">
                          <a
                              href=""
                              class="text-dark"
                              @click.prevent="markAllNotificationsAsRead"
                              v-if="unreadNotificationsCount"
                          >
                            <small>Очистить все</small>
                          </a> </span>
                        Уведомления
                    </h5>
                </b-dropdown-text>

                <b-dropdown-text
                    href="#"
                    class="p-0"
                >
                    <div class="no-notifications-wrapper" v-if="!unreadNotificationsCount || unreadNotificationsLoading">
                        <Spinner v-if="unreadNotificationsLoading" class="notifications-spinner" />
                        <div class="no-notifications-text" v-else-if="!unreadNotificationsCount">
                            Нет новых уведомлнеий
                        </div>
                    </div>
                    <VuePerfectScrollbar
                        v-once
                        class="noti-scroll"
                        v-else
                    >
                        <!-- item-->
                        <a
                            :href=""
                            class="dropdown-item notify-item"
                            v-for="notification in unreadNotifications.data"
                            :key="notification.data.notification_id + unreadNotifications.count"
                        >
                            <div class="notify-icon">
                                <img
                                    :src="notification.data.attributes.data.image"
                                    class="img-fluid rounded-circle"
                                    alt="notification icon" />
                            </div>
                            <p class="notify-details">{{ notification.data.attributes.data.title }}
                                <small class="text-muted">{{ notification.data.attributes.created_at }}</small>
                            </p>
                        </a>
                    </VuePerfectScrollbar>

                    <a
                        href="javascript:void(0);"
                        class="dropdown-item text-center text-primary notify-item notify-all"
                    >
                        View all
                        <i class="fi-arrow-right"></i>
                    </a>
                </b-dropdown-text>
            </b-nav-item-dropdown>
            <b-nav-item-dropdown
                right
                class="notification-list"
                menu-class="profile-dropdown"
            >
                <template slot="button-content">
                    <Spinner v-if="authUserLoading" />
                    <div class="nav-user mr-0 waves-effect waves-light" v-else>
                        <img
                            :src="authUser.data.attributes.avatar"
                            alt="user-image"
                            class="rounded-circle"
                        />
                        <span class="pro-user-name ml-1">{{ authUser.data.attributes.full_name }} <i class="mdi mdi-chevron-down"></i></span>
                    </div>
                </template>

                <b-dropdown-item href="#">
                    <i class="fe-user mr-1"></i>
                    <span>My Account</span>
                </b-dropdown-item>

                <b-dropdown-item href="#">
                    <i class="fe-settings mr-1"></i>
                    <span>Settings</span>
                </b-dropdown-item>

                <b-dropdown-item href="#">
                    <i class="fe-lock mr-1"></i>
                    <span>Lock Screen</span>
                </b-dropdown-item>

                <b-dropdown-divider></b-dropdown-divider>
                <b-dropdown-item href="/logout">
                    <i class="fe-log-out mr-1"></i>
                    <span>Logout</span>
                </b-dropdown-item>
            </b-nav-item-dropdown>

            <li class="dropdown notification-list">
                <button
                    class="btn btn-link nav-link right-bar-toggle waves-effect waves-light"
                    @click="toggleRightSidebar"
                >
                    <i class="fe-settings noti-icon"></i>
                </button>
            </li>
        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <router-link :to="{name: 'dashboard'}" class="logo text-center">
                 <span class="logo-lg">
                    <img
                      src="/admin/logo-light.png"
                      alt=""
                      height="16"
                    />
                </span>
                <span class="logo-sm">
                    <img
                      src="/admin/logo-sm.png"
                      alt=""
                      height="24"
                    />
                </span>
            </router-link>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button
                    class="button-menu-mobile disable-btn waves-effect"
                    @click="toggleMenu"
                >
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li>
                <h4 class="page-title-main">{{title || ''}}</h4>
            </li>

        </ul>
    </div>
</template>

<script>
import VuePerfectScrollbar from 'vue-perfect-scrollbar';
import Spinner from "./Spinner";
import {mapGetters} from "vuex";

export default {
    name: "NavBar",
    components: { VuePerfectScrollbar, Spinner },
    computed: {
        ...mapGetters({
        }),
        showNotifications() {
            return this.unreadNotificationsCount = 0 ? false : true;
        }
    },
    props: {
        authUser: {
            type: Object,
            required: false,
            default: () => ({}),
        },
        authUserLoading: {
            type: Boolean,
            required: false,
            default: () => false,
        },
        unreadNotificationsCount: {
            type: Number,
            required: false,
            default: () => ({}),
        },
        unreadNotificationsCountLoading: {
            type: Boolean,
            required: false,
            default: () => false,
        },
        unreadNotifications: {
            type: Object,
            required: false,
            default: () => ({}),
        },
        unreadNotificationsLoading: {
            type: Boolean,
            required: false,
            default: () => false,
        },

        title: {
            type: String,
            required: false,
            default: 'Untitled Page',
        },
        isMenuOpened: {
            type: Boolean,
            required: false,
            default: false,
        },
    },
    methods: {
        toggleMenu() {
            this.$parent.toggleMenu()
        },
        toggleRightSidebar() {
            this.$parent.toggleRightSidebar()
        },
        async markAllNotificationsAsRead()
        {
            this.$store.commit("setUnreadNotificationsLoading", true);
            try {
                await axios.get('/api/notifications/all-read');
                 await this.$store.dispatch("fetchUnreadNotificationsCount");
                 await this.$store.dispatch("fetchUnreadNotifications");
            } catch (error) {
                console.log(error)
            } finally {
                this.$store.commit("setUnreadNotificationsLoading", false);
            }
        }
    },
}
</script>

<style lang="scss" scoped>
.noti-scroll {
    height: 220px;
}
.ps > .ps__scrollbar-y-rail {
    width: 8px !important;
    background-color: transparent !important;
}
.ps > .ps__scrollbar-y-rail > .ps__scrollbar-y,
.ps.ps--in-scrolling.ps--y > .ps__scrollbar-y-rail > .ps__scrollbar-y,
.ps > .ps__scrollbar-y-rail:active > .ps__scrollbar-y,
.ps > .ps__scrollbar-y-rail:hover > .ps__scrollbar-y {
    width: 6px !important;
}
.button-menu-mobile {
    outline: none !important;
}
.notification-list .noti-title {
    min-width: 300px;
}
.no-notifications-text {
    color: #adb5bd;
    text-align: center;
    margin: auto;
}
.no-notifications-wrapper {
    min-height: 260px;
    position: relative;
    display: flex;
}
.notifications-spinner {
    margin: auto;
}
</style>
