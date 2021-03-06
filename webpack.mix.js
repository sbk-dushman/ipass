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
    'resources/css/style.css',
    'resources/css/all.css',
], 'public/css/all.css');
mix.js(['resources/js/app.js',
        'resources/js/jquery-3.6.0.js',
         'resources/js/all.js'
    ],'public/js/app.js');
//     .sass('resources/sass/app.scss', 'public/css');
