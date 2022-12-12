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


mix.js('resources/js/adm/scripts.js', 'public/adm/js')
mix.js('resources/js/adm/users.js', 'public/adm/js')
mix.js('resources/js/adm/roles.js', 'public/adm/js')
mix.js('resources/js/adm/userAdd.js', 'public/adm/js')
mix.js('resources/js/adm/programPhotos/main.js', 'public/adm/js/programPhotos')
