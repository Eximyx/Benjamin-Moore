import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/css/style.css',
                'resources/js/filter.js',
                'resources/js/components/calculator.js',
                'resources/js/components/catalog-form.js',
                'resources/js/components/colors.js',
                'resources/js/components/lead-form.js',
                'resources/js/components/slider.js',
                'resources/js/components/universal-carousel.js',
                'resources/js/widgets/burger.js',
                'resources/js/widgets/custom-select.js',
                'resources/js/widgets/footer-accordion.js',
                'resources/js/widgets/modal-window.js',
                'resources/js/widgets/product-counter.js',
            ],
            refresh: true,
        }),
    ],
});
