import { createApp } from 'vue';
import router from './router';
import Author from './components/author/Author.vue';
import DashboardLayout from './layouts/DashboardLayout.vue';

createApp(Author).component('dashboard-layout', DashboardLayout).use(router).mount('#author');