const autoprefixer = require('autoprefixer');
const babel = require('gulp-babel');
const cleanCSS = require('gulp-clean-css');
const concat = require('gulp-concat');
const gulp = require('gulp');
const gutil = require('gulp-util');
const postcss = require('gulp-postcss');
const sass = require('gulp-sass');
const scss = require('postcss-scss');
const uglify = require('gulp-uglify');

gulp.task('css', function() {
  gulp
    .src('sass/main.scss')
    .pipe(postcss([autoprefixer()], { syntax: scss }))
    .pipe(sass({ outputStyle: 'compressed' }).on('error', gutil.log))
    .pipe(cleanCSS())
    .pipe(gulp.dest('css'));
});

gulp.task('js', function() {
  gulp
    .src('js/**/*.js')
    .pipe(babel({ presets: ['@babel/env'] }))
    .pipe(concat('app.js'))
    .pipe(uglify())
    .pipe(gulp.dest('dist'));
});

gulp.task('watch', function() {
  gulp.watch('sass/**/*.scss', ['css']);
  gulp.watch('js/**/*.js', ['js']);
});

gulp.task('default', ['css', 'js', 'watch']);
