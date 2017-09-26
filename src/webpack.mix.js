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

mix.autoload({
        jquery: ['$', 'window.jQuery',"jQuery","window.$","jquery","window.jquery"],
        tether: ['Tether', 'window.Tether']
    })
    .styles([
        'resources/assets/css/bootstrap.min.css',
        'resources/assets/css/font-awesome.min.css',
        'resources/assets/css/style.default.css',
        'resources/assets/css/itemchecker.css'
   ], 'public/css/app.css')
   .js([
        'resources/assets/js/bootstrap.min.js',
        'resources/assets/js/front.js',
        'resources/assets/js/jquery.validate.min.js',
        'resources/assets/js/jquery.cookie.js',
        'resources/assets/js/itemchecker_app.js'
   ], 'public/js/app.js')