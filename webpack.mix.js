const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// ADMIN

mix.styles([
    'resources/assets/admin/plugins/fontawesome-free/css/all.min.css',
    'resources/assets/admin/plugins/select2/css/select2.css',
    'resources/assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.css',
    'resources/assets/admin/css/adminlte.min.css',
], 'public/assets/admin/css/admin.css');

mix.scripts([
    'resources/assets/admin/plugins/jquery/jquery.min.js',
    'resources/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'resources/assets/admin/plugins/select2/js/select2.full.js',
    'resources/assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.js',
    'resources/assets/admin/js/adminlte.min.js',
    'resources/assets/admin/js/demo.js',
    'resources/assets/admin/js/adminlte-init-elements.js',
], 'public/assets/admin/js/admin.js');

// TASK

mix.styles([
    'resources/assets/front/tasks/css/style.css',
    'resources/assets/front/tasks/css/normalize.css',
], 'public/assets/front/tasks/css/front.css');

// BLOG

mix.styles([
    'resources/assets/front/blog/css/bootstrap.css',
    'resources/assets/front/blog/css/font-awesome.min.css',
    'resources/assets/front/blog/style.css',
    'resources/assets/front/blog/css/animate.css',
    'resources/assets/front/blog/css/responsive.css',
    'resources/assets/front/blog/css/colors.css',
    'resources/assets/front/blog/css/version/marketing.css',
], 'public/assets/front/blog/css/front.css');

mix.scripts([
    'resources/assets/front/blog/js/jquery.min.js',
    'resources/assets/front/blog/js/tether.min.js',
    'resources/assets/front/blog/js/bootstrap.js',
    'resources/assets/front/blog/js/animate.js',
    'resources/assets/front/blog/js/custom.js',

], 'public/assets/front/blog/js/front.js');
