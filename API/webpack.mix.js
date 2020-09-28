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
mix.setPublicPath('scripts');

/* Admin styles/scripts */
mix.js('resources/admin/js/app.js', 'admin/js')
    .js('resources/admin/js/main.js', 'admin/js')
    .sass('resources/admin/sass/app.scss', 'admin/css')
    .sass('resources/admin/sass/main.scss', 'admin/css');
    // .js('resources/js/app.js', 'js')
    // .js('resources/js/search.js', 'js')
    // .sass('resources/sass/app.scss', 'css');

/* Frontend styles/scripts */

