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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/consult-cep.js', 'public/js')
    .js('resources/js/data-table.js', 'public/js')
    .js('resources/js/validator.js', 'public/js')
    .js('resources/js/category-generate.js', 'public/js')
    .js('resources/js/address.js', 'public/js')
    .js('resources/js/numbers.js', 'public/js')
    .copyDirectory('resources/plugins', 'public/plugins')
    .sass('resources/sass/app.scss', 'public/css');
