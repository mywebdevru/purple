<template>
    <div>
        <div class="user-box text-center">
            <img
                src="/admin/users/user-1.jpg"
                alt="user-img"
                class="rounded-circle img-thumbnail avatar-lg"
            >
            <div class="">
                <a
                    href="#"
                    class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                >{{user ? user.name : ''}}</a>
            </div>
            <p class="text-muted">Admin Head</p>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a
                        href="#"
                        class="text-muted"
                    >
                        <i class="mdi mdi-settings"></i>
                    </a>
                </li>

                <li class="list-inline-item">
                    <a
                        href="#"
                        class="text-custom"
                    >
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul
                id="side-menu"
                class="metismenu"
            >
                <li class="menu-title">Navigation</li>

                <li class="active">
                    <router-link
                        tag="a"
                        to="/"
                        class="active"
                    >
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Dashboard </span>
                    </router-link>
                </li>

                <li>
                    <a
                        href="javascript: void(0);"
                        class="waves-effect"
                    >
                        <i class="mdi mdi-share-variant"></i>
                        <span> Multi Level </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul
                        class="nav-second-level nav"
                        aria-expanded="false"
                    >
                        <li>
                            <a href="javascript: void(0);">Level 1.1</a>
                        </li>
                        <li>
                            <a
                                href="javascript: void(0);"
                                aria-expanded="false"
                            >Level 1.2
                                <span class="menu-arrow"></span>
                            </a>
                            <ul
                                class="nav-third-level nav"
                                aria-expanded="false"
                            >
                                <li>
                                    <a href="javascript: void(0);">Level 2.1</a>
                                </li>
                                <li>
                                    <a href="javascript: void(0);">Level 2.2</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- End Sidebar -->
    </div>
</template>

<script>
import { authComputed } from '../state/helpers'
import MetisMenu from 'metismenujs/dist/metismenujs'
export default {
    name: "SideNav",
    components: {},
    props: {
        user: {
            type: Object,
            required: false,
            default: () => ({}),
        },
    },
    computed: {
        ...authComputed,
    },
    mounted: function() {
        // eslint-disable-next-line no-unused-vars
        var menuRef = new MetisMenu('#side-menu');
    },
    methods: {},
}
</script>

<style lang="scss">
/*!
* metismenu - v2.7.9
* A jQuery menu plugin
* https://github.com/onokumus/metismenu#readme
*
* Made by Osman Nuri Okumus <onokumus@gmail.com> (https://github.com/onokumus)
* Under MIT License
*/
.metismenu .arrow {
    float: right;
    line-height: 1.42857;
}
*[dir="rtl"] .metismenu .arrow {
    float: left;
}

/*
 * Require Bootstrap 3.x
 * https://github.com/twbs/bootstrap
*/

.metismenu .glyphicon.arrow:before {
    content: "\e079";
}
.metismenu .active > a > .glyphicon.arrow:before {
    content: "\e114";
}

.metismenu .fa.arrow:before {
    content: "\f104";
}
.metismenu .active > a > .fa.arrow:before {
    content: "\f107";
}

/*
 * Require Ionicons
 * http://ionicons.com/
*/

.metismenu .ion.arrow:before {
    content: "\f3d2"
}
.metismenu .active > a > .ion.arrow:before {
    content: "\f3d0";
}
.metismenu .plus-times {
    float: right;
}
*[dir="rtl"] .metismenu .plus-times {
    float: left;
}
.metismenu .fa.plus-times:before {
    content: "\f067";
}
.metismenu .active > a > .fa.plus-times {
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
}
.metismenu .plus-minus {
    float: right;
}
*[dir="rtl"] .metismenu .plus-minus {
    float: left;
}
.metismenu .fa.plus-minus:before {
    content: "\f067";
}
.metismenu .active > a > .fa.plus-minus:before {
    content: "\f068";
}
.metismenu .collapse {
    display: none;
}
.metismenu .collapse.in {
    display: block;
}
.metismenu .collapsing {
    position: relative;
    height: 0;
    overflow: hidden;
    transition-timing-function: ease;
    transition-duration: .35s;
    transition-property: height, visibility;
}

.metismenu .has-arrow {
    position: relative;
}

.metismenu .has-arrow::after {
    position: absolute;
    content: '';
    width: .5em;
    height: .5em;
    border-width: 1px 0 0 1px;
    border-style: solid;
    border-color: initial;
    right: 1em;
    -webkit-transform: rotate(-45deg) translate(0, -50%);
    transform: rotate(-45deg) translate(0, -50%);
    -webkit-transform-origin: top;
    transform-origin: top;
    top: 50%;
    transition: all .3s ease-out;
}

*[dir="rtl"] .metismenu .has-arrow::after {
    right: auto;
    left: 1em;
    -webkit-transform: rotate(135deg) translate(0, -50%);
    transform: rotate(135deg) translate(0, -50%);
}

.metismenu .active > .has-arrow::after,
.metismenu .has-arrow[aria-expanded="true"]::after {
    -webkit-transform: rotate(-135deg) translate(0, -50%);
    transform: rotate(-135deg) translate(0, -50%);
}

*[dir="rtl"] .metismenu .active > .has-arrow::after,
*[dir="rtl"] .metismenu .has-arrow[aria-expanded="true"]::after {
    -webkit-transform: rotate(225deg) translate(0, -50%);
    transform: rotate(225deg) translate(0, -50%);
}
</style>
