let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');

mix.js('resources/assets/js/front/app.js', 'public/js/front.js')
    .sass('resources/assets/sass/front/material-kit.scss', 'public/css/front.css');

mix.js('resources/assets/js/admin/main.js', 'public/js/admin.js');
    // .sass('resources/assets/sass/admin/material-dashboard.scss', 'public/css/admin.css');