const gulp = require('gulp');
const rename = require('gulp-rename'); // renomeia para .min.css
const sass = require('gulp-sass')(require('sass')); //minifica arquivos scss
const browserSync = require('browser-sync').create(); // sincroniza com o browser
const sourcemaps = require('gulp-sourcemaps') // gera uma map do CSS

function style() {
    return gulp.src('_dev/scss/index.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(rename({extname:'.min.css'}))
    .pipe( sourcemaps.write('./'))
    .pipe(gulp.dest('assets/css'))
    .pipe(browserSync.stream());
}

function watch() {
    // browserSync.init({
    //     proxy: 'localhost/mei',
    //     browser: 'chrome',
    //     files: [
    //         "css/*.css", "*.html", "js/*.js"
    //     ]
    // });
    gulp.watch('./_dev/scss/*.scss', style);
    // gulp.watch('./*.html').on('change', browserSync.reload);
    // gulp.watch('./dist/js/**/*.js').on('change', browserSync.reload);
}

exports.style = style;
exports.watch = watch;

