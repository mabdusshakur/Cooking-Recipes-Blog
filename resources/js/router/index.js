import { createRouter, createWebHistory } from 'vue-router';
import Home from '../components/pages/HomePage.vue';
import About from '../components/pages/AboutPage.vue';
import Blog from '../components/pages/BlogPage.vue';

const routes = [
    { path: '/', component: Home },
    { path: '/about', component: About },
    { path: '/blog', component: Blog },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;