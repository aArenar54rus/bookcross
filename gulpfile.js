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
/*
elixir(function(mix) {
    mix.sass('app.scss');
});*/
elixir.config.sourcemaps = true;

elixir(function(mix) {
    mix.less([
        //"responsive.less",
        "ie-fixes.less",
        "main.less",
    ]);

    mix.styles([
        "main.css",
        "style.css",
    ], 'public/css/main.css');
});