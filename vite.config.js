import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    vitePlugins: [
        require('@tailwindcss/forms'),
        filamentVitePlugin({ theme: 'resources/css/filament/admin/theme.css' }),
    ]
});
