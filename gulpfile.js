const gulp = require('gulp'),
      sass = require('gulp-sass'),
      pug = require('gulp-pug'),
      babel = require('gulp-babel'),
      sitemap = require('gulp-sitemap'),
      autoprefixer = require('gulp-autoprefixer'),
      browserSync = require('browser-sync').create();

// compilacions de sass a css
gulp.task('sass', () =>
    gulp.src('./Components/Scss/*.scss')
        .pipe(sass({
            outputStyle: 'expended',
            sourceComments: false
        }))
        .pipe(autoprefixer({
            version: ['last 2 browsers']
        }))
        .pipe(gulp.dest('./public/css'))
        .pipe(browserSync.stream())
    );

// compilacion gulp a html
gulp.task('pug', () =>
    gulp.src('./Components/Pug/*.pug')
        .pipe(pug({
            pretty: true
        }))
        .pipe(gulp.dest('./public'))
        .on('end', browserSync.reload)
    );

// transpilacion de ecmac 6

gulp.task('babel',() =>
  gulp.src('./Components/Js/*.js')
    .pipe(babel())
    .pipe(gulp.dest('./public/js'))
);

  //generar mapa de sitio

  gulp.task('sitemap', function () {
    gulp.src('dest/**/*.html', {
            read: false
        })
        .pipe(sitemap({
            siteUrl: ' '
        }))
        .pipe(gulp.dest('./public'));
});

// servidor que mostrara los cambios
gulp.task('default',() => {
    browserSync.init({
        server:'./public'
    });

    gulp.watch('Components/Scss/**/*.scss',['sass']);
    gulp.watch('Components/Pug/**/**/*.pug',['pug']);
    gulp.watch('Components/Js/*.js',['babel']);
    gulp.watch('dest/**/*.html', ['sitemap']);

})