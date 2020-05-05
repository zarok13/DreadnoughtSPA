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
mix.setPublicPath('blade_components');

/* Admin styles/scripts */
// mix.js('resources/admin/js/app.js', 'admin/js')
    mix.js('resources/admin/js/main.js', 'admin/js')
    //.sass('resources/admin/sass/app.scss', 'admin/css')
    .sass('resources/admin/sass/main.scss', 'admin/css');

/* Frontend styles/scripts */
// mix.js('resources/js/app.js', 'js')
//     .sass('resources/sass/app.scss', 'css');
