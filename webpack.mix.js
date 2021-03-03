const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.styles([
    'resources/views/admin/vendor/nucleo/css/nucleo.css',
    'resources/views/admin/css/argon.css',
], 'public/site/css/style.css')

.scripts([
    'resources/views/admin/vendor/jquery/dist/jquery.min.js',
    'resources/views/admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js',
    'resources/views/admin/vendor/js-cookie/js.cookie.js',
    'resources/views/admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js',
    'resources/views/admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js',
    'resources/views/admin/vendor/chart.js/dist/Chart.min.js',
    'resources/views/admin/vendor/chart.js/dist/Chart.extension.js',
    'resources/views/admin/js/argon.js'
], 'public/site/js/script.js')
.version();
