var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    mix.sass('app.scss', 'resources/assets/css/app.css')
        .styles([
            'resources/assets/css/app.css',
            'resources/assets/css/magnific-popup.css',
            'resources/assets/css/select2.css',
            'resources/assets/css/railscasts.css'
        ], 'public/css/app.css')
        .scripts([
            'resources/assets/js/app.js',
            'resources/assets/js/lib/jquery.min.js',
            'resources/assets/js/lib/bootstrap.min.js',
            'resources/assets/js/lib/jquery.magnific-popup.js',
            'resources/assets/js/lib/select2.js',
            'resources/assets/js/lib/highlight.pack.js'
        ], 'public/js/main.js');
});
