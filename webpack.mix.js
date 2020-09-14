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
    .js('resources/js/map/map_constructor', 'public/js/map')
    .js('resources/js/map/map_edit', 'public/js/map')
    .js('resources/js/map/map_show', 'public/js/map')
    .scripts(['resources/js/main/like.js',
            'resources/js/main/comment.js',
            'resources/js/main/post.js',
            'resources/js/main/listener.js'], 'public/js/x3mart.js')
    .scripts(['resources/js/libs/fm.revealator.jquery.js',
            'resources/js/libs/jquery.appear.js',
            'resources/js/libs/jquery.magnific-popup.js',
            'resources/js/libs/material.min.js',
            'resources/js/libs/perfect-scrollbar.js',
            'resources/js/libs/owl.carousel.min.js',
            'resources/js/libs/jquery.lettering.js'], 'public/js/libs.js')
    .scripts(['resources/js/main/main.js',
            'resources/js/libs/libs-init.js',
            'resources/js/main/append.js',
            'resources/js/main/wheel.js'] ,'public/js/main.js')
    .sass('resources/sass/app.scss', 'public/css/app.css')
    .sass('resources/sass/main.scss', 'public/css/main.css')
    .sass('resources/sass/admin/bootstrap.scss', 'public/css') //admin-panel
    .sass('resources/sass/admin/icons.scss', 'public/css') //admin-panel
    .sass('resources/sass/admin/admin.sass', 'public/css')
    .sourceMaps(); //admin-panel

mix.copyDirectory('resources/assets/fonts', 'public/fonts');

mix.alias({
    '@fonts': '/resources/assets/fonts',
    '@images': '/resources/assets/images',
    '@modules': '/node_modules',
});

