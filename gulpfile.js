
var gulp =require('gulp'),
    less=require('gulp-less'),
    browser=require('browser-sync'),
    autoprefix=require('gulp-autoprefixer');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */


gulp.task('less',function(){
    return gulp.src('resources/assets/*.less')
        .pipe(less())
        .pipe(autoprefix({
            browsers:['last 2 versions'],
            cascade:true
        }))
        .pipe(browser.reload({stream:true}))
        .pipe(gulp.dest('public/static/css'));
});

gulp.task('browser',function(){
    browser({
        server:{
            baseDir:'public'
        },

    })
})
gulp.task('watch',['browser'],function(){
    gulp.watch('resources/assets/*.less',['less']);
});