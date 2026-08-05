import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js',  'resources/css/inspired-campus.css','resources/js/app.js', 'resources/css/prodi.css', 'resources/css/fisiotrapi.css', 'resources/css/ners.css', 'resources/css/dkv.css',
            'resources/css/bidan.css', 'resources/css/bisdig.css', 'resources/css/farmasi.css', 'resources/css/kwu.css', 'resources/css/pariwisata.css', 'resources/css/psikologi.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    });
