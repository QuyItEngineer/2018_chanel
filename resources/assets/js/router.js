import VueRouter from 'vue-router';
import Vue from 'vue';

import Home from './pages/Home';
import About from './pages/About';

const routes = [
    {
        path: '/',
        component: Vue.component('Layout', require('./pages/Layout.vue')),
        children: [
            {path: '/', component: Home},
            {path: '/home', redirect: '/'},
            {path: '/about', component: About},
        ],
    },
];

const router = new VueRouter({
    routes,
});

export default router;
