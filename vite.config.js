import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite'; // Importe le nouveau plugin

export default defineConfig({
    css: {
        postcss: false, // Force la désactivation pour éviter le conflit @layer base
    },
    plugins: [
        tailwindcss(), // Ajoute le plugin Tailwind CSS
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
