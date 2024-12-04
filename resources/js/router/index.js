import { createRouter, createWebHistory } from 'vue-router';
import Home from '../components/pages/HomePage.vue';
import About from '../components/pages/AboutPage.vue';
import Blog from '../components/pages/BlogPage.vue';
import DefaultLayout from '../layouts/DefaultLayout.vue';
import DashboardLayout from '../layouts/DashboardLayout.vue';

const routes = [
    {
        path: '/',
        component: DefaultLayout,
        children: [
            {
                path: '/',
                component: Home,
            },
            {
                path: '/about',
                component: About,
            }
        ]
    },
    {
        path: '/dashboard',
        component: DashboardLayout,
        children: [
            {
                path: 'blog',
                component: Blog,
            },
        ]
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;