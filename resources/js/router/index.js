import { createRouter, createWebHistory } from 'vue-router';
import Home from '../components/pages/HomePage.vue';
import About from '../components/pages/AboutPage.vue';
import Blog from '../components/pages/BlogPage.vue';
import Login from '../views/Login.vue';
import DefaultUserLayout from '../layouts/DefaultUserLayout.vue';
import DashboardLayout from '../layouts/DashboardLayout.vue';

const routes = [
    {
        path: '/',
        component: DefaultUserLayout,
        children: [
            {
                path: '/',
                component: Home,
            },
            {
                path: '/about',
                component: About,
            },
            {
                path: '/login',
                component: Login,
                name: 'login',
            },
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
