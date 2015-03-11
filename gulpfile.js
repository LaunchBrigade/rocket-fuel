/*global require */

var gulp = require('gulp');
var util = require('gulp-util');
var sass = require('gulp-sass');
var prefix = require('gulp-autoprefixer');
var bsync = require('browser-sync');
var browserify = require('browserify');
var transform = require('vinyl-transform');
var uglify = require('gulp-uglify');

var fs = require('fs');
var argv = require('minimist')(process.argv.slice(3), {
  string: 'version',
  boolean: 'force',
  alias: {
    v: 'version',
    f: 'force'
  }
});

var paths = {
  srcJS: 'src/js/**/*.js',
  mainJS: './src/js/main.js',
  js: 'assets/js',
	sass: 'src/scss/**/*.scss',
	css: 'assets/css'
};

gulp.task('browser-sync', function() {
	bsync({
		/* Uncomment and change to domain */
		// proxy: "example.com",
    open: false
	});
});

gulp.task('sass-dev', function () {
	return gulp.src(paths.sass)
		.pipe(sass({
			errLogToConsole: true,
			sourceComments: 'map',
			includePaths: [
				'bower_components/foundation/scss'
			]
		}))
		.pipe(prefix())
		.pipe(gulp.dest(paths.css))
		.pipe(bsync.reload({stream:true}));
});

gulp.task('sass-prod', function () {
	return gulp.src(paths.sass)
		.pipe(sass({
			errLogToConsole: true,
			outputStyle: 'compressed',
			includePaths: [
				'bower_components/foundation/scss'
			]
		}))
		.pipe(prefix())
		.pipe(gulp.dest(paths.css));
});

gulp.task('js-dev', function () {
  var browserified = transform(function(filename) {
    var b = browserify(filename);
    return b.bundle();
  });

  return gulp.src(paths.mainJS)
    .pipe(browserified)
    .pipe(gulp.dest(paths.js));
});

gulp.task('js-prod', function () {
  var browserified = transform(function(filename) {
    var b = browserify(filename);
    return b.bundle();
  });

  return gulp.src(paths.mainJS)
    .pipe(browserified)
    .pipe(uglify())
    .pipe(gulp.dest(paths.js));
});

gulp.task('default', ['sass-dev', 'js-dev']);

gulp.task('watch', ['default', 'browser-sync'], function () {
	gulp.watch(paths.sass, ['sass-dev']);
  gulp.watch(paths.srcJS, ['js-dev']);
});

gulp.task('build', ['sass-prod', 'js-prod']);

gulp.task('set-version', function () {
  if (argv.version) {
    var npmConfig = require('./package.json');

    if (npmConfig.version === argv.version && !argv.force) {
      console.log('Error: Already set to version. Use -f to force.');
    } else if (npmConfig.version > argv.version && !argv.force ) {
      console.log('Error: Current version is greater. Use -f to force.');
    } else {
      var tabCount = 2;
      var bowerConfig = require('./bower.json');

      // Set Package.json version
      npmConfig.version = argv.version;
      fs.writeFile('./package.json', JSON.stringify(npmConfig, undefined, tabCount), function (err) {
        if (err) {
          throw err;
        } else {
          console.log('Success: Version set in package.json.');
        }
      });

      // Set Bower.json version
      bowerConfig.version = argv.version;
      fs.writeFile('./bower.json', JSON.stringify(bowerConfig, undefined, tabCount), function (err) {
        if (err) {
          throw err;
        } else {
          console.log('Success: Version set in bower.json.');
        }
      });

      // Set Style.css version
      fs.readFile('./style.css', 'utf8', function (err, data) {
        if (err) {
          throw err;
        } else {
          var start = data.indexOf('Version:') + 8;
          var end = data.indexOf('\n', start);

          var stylesheet = data.substring(0, start) + ' ' + argv.version + data.substring(end);
          fs.writeFile('./style.css', stylesheet, function (err) {
            if (err) {
              throw err;
            } else {
              console.log('Success: Version set in style.css.');
            }
          });
        }
      });
    }
  } else {
    console.log('Error: No version passed. Use -v or --version to set theme version.');
  }
});
