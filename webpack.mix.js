const mix = require('laravel-mix');


mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/admin.js', 'public/js')
    .js('resources/js/edit.js', 'public/js')
    .scripts(['resources/js/libs/fm.revealator.jquery.js',
            'resources/js/libs/jquery.appear.js',
            'resources/js/libs/jquery.magnific-popup.js',
            'resources/js/libs/material.min.js',
            'resources/js/libs/perfect-scrollbar.js',
            'resources/js/main.js',
            'resources/js/libs-init/libs-init.js'] ,'public/js/main.js')
    .sass('resources/sass/app.scss', 'public/css/main.css')
    .sass('resources/sass/admin.sass', 'public/css');