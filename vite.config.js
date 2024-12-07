import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/user.css',
                'resources/css/author.css', 
                'resources/css/admin.css',
                'resources/js/user.js', 
                'resources/js/author.js',
                'resources/js/admin.js'
            ],
            refresh: true,
        }),
        vue(),
    ],
});