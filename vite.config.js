import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import legacy from '@vitejs/plugin-legacy'
import vue2 from '@vitejs/plugin-vue2'

export default defineConfig({
    plugins: [
        vue2(),
        legacy({
            targets: ['ie >= 11'],
            additionalLegacyPolyfills: ['regenerator-runtime/runtime']
        }),
        laravel({
            input: ['resources/css/style.css', 'resources/js/main.js'],
            refresh: true,
        }),
    ],
});
