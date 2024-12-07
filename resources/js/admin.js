import { createApp } from 'vue';
import router from './router';
import Admin from './components/admin/Admin.vue';
import DashboardLayout from './layouts/DashboardLayout.vue';

createApp(Admin).component('dashboard-layout', DashboardLayout).use(router).mount('#admin');