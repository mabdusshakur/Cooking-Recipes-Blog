import { createApp } from 'vue';
import router from './router';
import App from './App.vue';
import DefaultLayout from './layouts/DefaultLayout.vue';
import DashboardLayout from './layouts/DashboardLayout.vue';

createApp(App).component('default-layout', DefaultLayout).component('dashboard-layout', DashboardLayout).use(router).mount('#app');