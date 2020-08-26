const mix = require('laravel-mix');
require('laravel-mix-alias');

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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/admin/admin.js', 'public/js')
    .js('resources/js/edit.js', 'public/js')
    .scripts(['resources/js/libs/fm.revealator.jquery.js',
            'resources/js/libs/jquery.appear.js',
            'resources/js/libs/jquery.magnific-popup.js',
            'resources/js/libs/material.min.js',
            'resources/js/libs/perfect-scrollbar.js',
            'resources/js/main.js',
            'resources/js/libs-init/libs-init.js',
            'resources/js/owl.carousel.min.js'] ,'public/js/main.js')
    .sass('resources/sass/app.scss', 'public/css/app.css')
    .sass('resources/sass/main.scss', 'public/css/main.css')
    .sass('resources/sass/admin/bootstrap.scss', 'public/css') //admin-panel
    .sass('resources/sass/admin/icons.scss', 'public/css') //admin-panel
    .sass('resources/sass/admin/admin.sass', 'public/css'); //admin-panel

mix.copyDirectory('resources/assets/fonts', 'public/fonts');

mix.alias({
    '@fonts': '/resources/assets/fonts',
    '@images': '/resources/assets/images'
});

