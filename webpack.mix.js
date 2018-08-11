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
    .extract(['vue', 'axios', 'material-dialog', 'material-datetime-picker', 'vue-tables-2', 'moment']);
// mix.js('resources/assets/js/reserve.js', 'public/js')
//      .extract(['vue', 'axios', 'material-dialog', 'material-datetime-picker']);
// mix.sass('resources/assets/sass/spinkit.scss', 'public/css');