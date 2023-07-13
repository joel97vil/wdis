import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            //Here goes the list of all resources to import (css and js)
            input: [
                    'resources/css/app.css',
                    'resources/js/app.js',
                    'resources/js/room.js'],
            refresh: true,
        }),
    ],
});
