var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    minifycss = require('gulp-minify-css'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    notify = require('gulp-notify'),
    livereload = require('gulp-livereload');

var devdir = '../../laravel4/app/dist/';
var styledevdir = devdir + 'style/';
var scriptdevdir = devdir + 'script/';
var libdevdir = devdir + 'lib/';

/**
 * Compile sass based style and put on temporary dir
 */
gulp.task('compile_sass', function() {
    return sass(styledevdir + 'raw/main.sass', ({ style: 'expanded' }))
        .pipe(rename({ extname: '.max.css' }))
        .pipe(gulp.dest(styledevdir + 'temp'))
});

/**
 * Minify compiled sass (already css-typed) and put on temp dir too
 */
gulp.task('minify_css', ['compile_sass'], function() {
    return gulp.src(styledevdir + 'temp/*.max.css')
        .pipe(rename({ extname: '' }))
        .pipe(rename({ extname: '.min.css' }))
        .pipe(minifycss({ processImport: false }))
        .pipe(gulp.dest(styledevdir + 'temp/'));
})

/**
 * Concatenate all style and put on public dir
 */
gulp.task('styles', ['minify_css'], function() {
    return gulp.src(styledevdir + 'temp/*.min.css')
        .pipe(concat('styles.min.css'))
        .pipe(gulp.dest('./style'))
        .pipe(notify({ message: 'SASS compiled, all styles minifyed and concated.' }));
})

/**
 * Concatenate all style and put on public dir
 */
gulp.task('libs', ['minify_css'], function() {
    return gulp.src(libdevdir + '**/*')
        .pipe(gulp.dest('./lib'))
        .pipe(notify({ message: 'Library copied.' }));
})

/**
 * Minify (uglify) then concatenate all script and put on public dir
 */
gulp.task('scripts', function() {
    return gulp.src(scriptdevdir + 'raw/*.js')
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./script'))
        .pipe(notify({ message: 'JavaScript ready.' }));
})

/**
 * Watch for change event
 */
gulp.task('watch', function() {
    gulp.watch(styledevdir + 'raw/*.sass', ['styles'])
    gulp.watch(scriptdevdir + 'raw/*.js', ['scripts'])
    gulp.watch(libdevdir + '**/*', ['libs'])

    // Buat server livereload
    livereload.listen({
        port: 9000,
    });
    gulp.watch(['**/*']).on('change', livereload.changed);
    gulp.watch(['../../laravel4/app/views/**/*.blade.php']).on('change', livereload.changed);
})

gulp.task('default', function() {
    gulp.start('styles');
    gulp.start('scripts');
});
