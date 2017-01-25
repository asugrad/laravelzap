const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('app.scss','storage/app/public/css')
       .webpack('app.js','storage/app/public/js')
       .version( [ 'css/app.css', 'js/app.js' ] );
});

elixir( function ( mix ) {
  mix.copy( 'resources/assets/img/', 'storage/app/public/img/' );
} );