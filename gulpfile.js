const elixir = require('laravel-elixir');

var gulp = require('gulp');
var shell = require("gulp-shell");
var browserSync = require('browser-sync');
var livereload = require('gulp-livereload');

gulp.task('zapBuild', function() {
  return gulp.src("").pipe( shell( [
      "php artisan zap:build"
  ]));
});

elixir((mix) => {
    mix.sass('app.scss','storage/app/public/css')
        .copy( 'resources/assets/img/', 'storage/app/public/img/' )
        .webpack('app.js','storage/app/public/js')
        .task('zapBuild')
        .browserSync({
          proxy: 'laravelzapgithub.dev',
          port: 8080,
          notify: false,
          reloadOnRestart: true,
          reloadDelay: 1000,
          fn: function (event, file) {
            mix.task('zapBuild')
          },
          files: [
                'app/**/*',
                'public/**/*',
                'resources/**/*'
            ],
        })
});

gulp.watch("resources/**/*", ['browserSync']).on('change',
  function(mix) {
    gulp.src("").pipe( shell( [
        "php artisan zap:build"
    ]));
    browserSync.reload;
  }
);
