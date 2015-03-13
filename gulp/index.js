/*global require */

/*===============================================
 * Load Config
 *=============================================*/
var config = require('./config.json');

/*===============================================
 * Load Modules
 *=============================================*/
var fs = require('fs');
var argv = require('minimist')(process.argv.slice(2), config.minimist);
// var setversion = require('./set-version');

/*===============================================
 * Load Gulp and Plugins
 *=============================================*/
var gulp = require('gulp');
var plugins = {};
var util = require('gulp-util');
var sass = require('gulp-sass');
var prefix = require('gulp-autoprefixer');
var bsync = require('browser-sync');
var browserify = require('browserify');
var transform = require('vinyl-transform');
var uglify = require('gulp-uglify');

/*===============================================
 * Register tasks
 *=============================================*/
gulp.task('sass', function () {
  if (argv.env !== 'prod') {
    return gulp.src(config.sass.paths.sass)
      .pipe(sass(config.sass.dev))
      .pipe(prefix())
      .pipe(gulp.dest(config.sass.paths.css))
      .pipe(bsync.reload({stream:true}));
  } else {
    return gulp.src(config.sass.paths.sass)
  		.pipe(sass(config.sass.prod))
  		.pipe(prefix())
  		.pipe(gulp.dest(config.sass.paths.css));
  }
});

gulp.task('javascript', function () {
  var browserified = transform(function(filename) {
    var b = browserify(filename);
    return b.bundle();
  });

  if (argv.env !== 'prod') {
    return gulp.src(config.js.paths.main)
      .pipe(browserified)
      .pipe(gulp.dest(config.js.paths.js));
  } else {
    return gulp.src(config.js.paths.main)
      .pipe(browserified)
      .pipe(uglify())
      .pipe(gulp.dest(config.js.paths.js));
  }
});

gulp.task('browser-sync', function () {
  bsync(config.bsync);
});

gulp.task('default', ['sass', 'javascript']);

gulp.task('watch', ['default', 'browser-sync'], function () {
	gulp.watch(config.sass.paths.sass, ['sass']);
  gulp.watch(config.js.paths.src, ['javascript']);
});
