import { createApp } from 'vue';
import router from './router';
import App from './App.vue';
import DefaultUserLayout from './layouts/DefaultLayout.vue';
import DashboardLayout from './layouts/DashboardLayout.vue';

createApp(App).component('default-layout', DefaultUserLayout).component('dashboard-layout', DashboardLayout).use(router).mount('#app');