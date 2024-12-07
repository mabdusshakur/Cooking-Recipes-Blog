import { createApp } from 'vue';
import router from './router';
import User from './components/user/User.vue';
import DefaultUserLayout from './layouts/DefaultUserLayout.vue';

createApp(User).component('default-layout', DefaultUserLayout).use(router).mount('#user');