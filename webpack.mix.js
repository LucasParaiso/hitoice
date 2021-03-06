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

 mix
    .styles([
        'resources/css/main.css',
        'resources/css/dashboard.css'
    ], 'public/css/dashboard.css')

    .styles([
        'resources/css/main.css',
        'resources/css/sheet.css'
    ], 'public/css/sheet.css')

    .styles('resources/css/login.css', 'public/css/login.css')

    .scripts('node_modules/jquery/dist/jquery.js', 'public/js/jquery.js')

    .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/js/bootstrap.js')

    .scripts('resources/js/app.js', 'public/js/app.js')

    .sass('resources/scss/style.scss', 'public/css/bootstrap.css')

    .version();
