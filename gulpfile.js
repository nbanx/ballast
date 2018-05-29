'use strict';

var gulp = require('gulp'),

    // SASS / CSS Processing
    bourbon = require('bourbon').includePaths,
    neat = require('bourbon-neat').includePaths,
    sass = require('gulp-sass'),
    autoprefixer = require('autoprefixer'),
    postcss = require('gulp-postcss'),
    cssminify = require('gulp-cssnano'),
    sourcemaps = require('gulp-sourcemaps'),
    sasslint = require('gulp-sass-lint'),

    // JS Uglify

    uglify = require('gulp-uglify'),
    pump = require('pump'),
    concat = require('gulp-concat'),

    // Utilities
    notify = require('gulp-notify'),
    plumber = require('gulp-plumber'),
    rename = require('gulp-rename');

// Error Handling

function handleError() {
    var args = Array.prototype.slice.call(arguments);

    notify.onError({
        title: 'Task Failed [<%= error.message %>',
        message: 'See console.',
        sound: 'Sosumi'
    }).apply(this,args);

    gutil.beep();

    this.emit('end');
}

// Post CSS
gulp.task('postcss', function(){

    return gulp.src('assets/sass/style.scss')

        .pipe(plumber({
            errorHandler: handleError
        }))

        .pipe( sourcemaps.init())

        .pipe( sass({
            includePaths: [].concat( bourbon, neat ),
            errLogToConsole: true,
            outputStyle: 'expanded' // Options: nested, expanded, compact, compressed
        }))

        .pipe(postcss([
            autoprefixer({
                browsers: ['last 2 versions']
            })
        ]))

        .pipe(sourcemaps.write())

        .pipe( gulp.dest('./'))

        .pipe(notify({
            message: 'Styles are built.'
        }));
});

// Minify
gulp.task('cssminify', function() {
    return gulp.src('style.css')

    .pipe(plumber({
        errorHandler: handleError
    }))

    .pipe( cssminify({
        safe: true
    }))

    .pipe(rename('style.min.css'))

    .pipe(gulp.dest('./'))

    .pipe(notify({
        message: 'Stylesheet minified.'
    }));
});

// SASS Lint

gulp.task('sass-lint', function() {
    return gulp.src([
        'assets/sass/style.scss',
        '!assets/sass/base/html5-reset/_normalize.scss',
        '!assets/sass/base/utilities/animate/_animate.scss'
    ])
    .pipe(sasslint())
    .pipe(sasslint.format())
    .pipe(sasslint.failOnError())

    .pipe(notify({
        message: 'Linter complete.'
    }));
});

// Run Post CSS & Minify
gulp.task('styles', gulp.series('postcss', 'cssminify', 'sass-lint'));

// Watch Post CSS & Minify
gulp.task('watch', function () {
	gulp.watch('assets/sass/**/*.scss', gulp.series('styles'));
});

// Post CSS
gulp.task('woocss', function(){

    return gulp.src('assets/sass/plugins/woocommerce/index.scss')

        .pipe(plumber({
            errorHandler: handleError
        }))

        .pipe( sourcemaps.init())

        .pipe( sass({
            errLogToConsole: true,
            outputStyle: 'expanded' // Options: nested, expanded, compact, compressed
        }))

        .pipe(postcss([
            autoprefixer({
                browsers: ['last 2 versions']
            })
        ]))

        .pipe(sourcemaps.write())

        .pipe(rename('woocommerce.css'))

        .pipe( gulp.dest('./assets/css'))

        .pipe(notify({
            message: 'WooCommerce styles are built.'
        }));
});

// JS Compress

gulp.task('compressjs', function (cb) {
    pump([
          gulp.src([
            'assets/js/responsive-menu.js',
            'assets/js/notice-update.js',
            'assets/js/build/custom-scripts.js'
        ]),
          concat('scripts.js'),
          uglify(),
          rename('scripts.min.js'),
          gulp.dest('./assets/js'),
          notify({
            message: 'Javascript compressed'
        })
      ],
      cb
    );
  });

  // Script Watch
gulp.task('watchjs', function () {
	gulp.watch('assets/js/build/*.js', gulp.series('compressjs'));
});