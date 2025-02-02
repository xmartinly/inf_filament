import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/css/login.css'],
            // refresh: true,
            refresh: [
                ...refreshPaths,
                'App/Livewire/**',
                'App/Filament/**',
            ],
        }),
    ],
});
