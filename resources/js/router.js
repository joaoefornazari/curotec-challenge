import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        name: 'home',
        path: '/',
        component: () => import('./views/Home.vue'),
        meta: {
            title: 'Home',
        },
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});