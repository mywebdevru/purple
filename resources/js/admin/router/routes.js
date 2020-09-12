import VueRouter from "vue-router";
import NotFound from "./views/NotFound";

const routes = [
    {
        path: '/admin/',
        name: 'dashboard',
        component: () => lazyLoadView(import('./views/Dashboard')),
        meta: {
            authRequired: true,
            title: 'Dashboard',
        },
        //props: (route) => ({ user: store.state.auth.currentUser || {}}),
    },
    {
        path: '/admin/404/',
        name: '404',
        component: NotFound,
        props: true,
    },
    {
        path: '/admin/*',
        redirect: '/admin/404/',
    },
];

const router = new VueRouter({
    mode: 'history',
    routes,
});

// Lazy-loads view components, but with better UX. A loading view
// will be used if the component takes a while to load, falling
// back to a timeout view in case the page fails to load. You can
// use this component to lazy-load a route with:
//
// component: () => lazyLoadView(import('@views/my-view'))
//
// NOTE: Components loaded with this strategy DO NOT have access
// to in-component guards, such as beforeRouteEnter,
// beforeRouteUpdate, and beforeRouteLeave. You must either use
// route-level guards instead or lazy-load the component directly:
//
// component: () => import('@views/my-view')
//
function lazyLoadView(AsyncView) {
    const AsyncHandler = () => ({
        component: AsyncView,
        // A component to use while the component is loading.
        loading: require('./views/Loading').default,
        // Delay before showing the loading component.
        // Default: 200 (milliseconds).
        delay: 400,
        // A fallback component in case the timeout is exceeded
        // when loading the component.
        error: require('./views/Timeout').default,
        // Time before giving up trying to load the component.
        // Default: Infinity (milliseconds).
        timeout: 10000,
    })

    return Promise.resolve({
        functional: true,
        render(h, { data, children }) {
            // Transparently pass any props or children
            // to the view component.
            return h(AsyncHandler, data, children)
        },
    })
}


export default router;
