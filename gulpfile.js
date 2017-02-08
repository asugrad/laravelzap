const elixir = require('laravel-elixir');

//CHANGE THIS TO YOUR LOCAL DEVLOPMENT URL FOR THE SITE
var localsite = 'laravelzapgithub.dev';

var gulp = require('gulp');
var shell = require("gulp-shell");
var browserSync = require('browser-sync');
var livereload = require('gulp-livereload');

//gulp --production
var production = elixir.config.production;

gulp.task('zapBuild', function() {
  return gulp.src("").pipe( shell( [
      "php artisan zap:build"
  ]));
});

elixir((mix) => {

  if (production) {

    mix.sass('app.scss','storage/app/public/css')
    .copy( 'resources/assets/img/', 'storage/app/public/img/' )
    .copy( 'resources/assets/plugins/', 'storage/app/public/plugins/' )
    .webpack('app.js','storage/app/public/js');

  } else {

    mix.sass('app.scss','storage/app/public/css')
      .copy( 'resources/assets/img/', 'storage/app/public/img/' )
      .copy( 'resources/assets/plugins/', 'storage/app/public/plugins/' )
      .webpack('app.js','storage/app/public/js')
      .task('zapBuild')
      .browserSync({
        proxy: localsite,
        port: 8080,
        notify: false,
        reloadOnRestart: true,
        reloadDelay: 1000,
        fn: function (event, file) {
          gulp.src("").pipe( shell( [
            "php artisan zap:build"
          ]))
        },
        files: [
          'app/**/*',
          'public/**/*',
          'resources/**/*'
        ],
      });
  }

});

if (!production) {
  gulp.watch("resources/**/*", ['browserSync']).on('change',
    function(mix) {
      gulp.src("").pipe( shell( [
          "php artisan zap:build"
      ]));
      browserSync.reload;
    }
  );
}
