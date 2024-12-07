import { createRouter, createWebHistory } from 'vue-router';
import Home from '../components/pages/HomePage.vue';
import About from '../components/pages/AboutPage.vue';
import Login from '../views/Login.vue';
import DefaultUserLayout from '../layouts/DefaultUserLayout.vue';
import DashboardLayout from '../layouts/DashboardLayout.vue';
import BlogPage from '../components/pages/BlogPage.vue';

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
                path: 'about',
                component: About,
            },
            {
                path: 'login',
                component: Login,
                name: 'login',
            },
        ]
    },
    {
        path: '/admin',
        component: DashboardLayout,
        children: [
            {
                path: 'blog',
                component: BlogPage,
                meta: { requiresAuth: true, roles: ['admin'] }
            },
        ]
    },
    {
        path: '/author',
        component: DashboardLayout,
        children: [
            {
                path: 'blog',
                component: BlogPage,
                meta: { requiresAuth: true, roles: ['author'] }
            },
        ]
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});


router.beforeEach((to, from, next) => {
    const user = JSON.parse(localStorage.getItem('user'));
    const token = localStorage.getItem('token');

    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!user || !token) {
            next({ path: '/login' });
        } else {
            const userRole = user.role;
            const allowedRoles = to.meta.roles;
            if (allowedRoles.includes(userRole)) {
                next();
            } else {
                next({ path: '/login' });
            }
        }
    } else {
        next();
    }
});

export default router;
