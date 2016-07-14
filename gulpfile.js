'use strict';

var gulp   = require('gulp');
var clean  = require('gulp-clean');
var less   = require('gulp-less');
var	uglify = require('gulp-uglify');
var	concat = require('gulp-concat');
var jshint = require('gulp-jshint');
var rename = require('gulp-rename');
var minifyCss = require("gulp-minify-css");
var gulpSequence = require('gulp-sequence');
var requirejsOptimize = require('gulp-requirejs-optimize');
var browserSync = require('browser-sync');
var reload = browserSync.reload;

var pathLess=[
		'less/app.less',
		'less/wap.less',
		'less/web.less',
		'less/web-three.less',
		'less/*/*.less',
		'!less/components/*.less',
		'!less/mixins/*.less',
		'!less/variables/*.less'
	],
	pathJs=[
		'jssrc/wap.js',
		'jssrc/web.js',
		'jssrc/wechat-share.js',
		'jssrc/*/*.js'
	],
	pathAppJs=[
		'jssrc/controller.js'
	],
	pathLazyLoadJs=[
		'jssrc/jquery-1.11.3.js',
		'jssrc/jquery.lazyload.js',
		'jssrc/lazy.js'
	];

gulp.task('clear',function(){
	return gulp.src([
		'js'
	],{read: false})
	.pipe(clean())
})
gulp.task('less',function(){
	return gulp.src(pathLess)
	.pipe(less())
	.pipe(minifyCss())
	.pipe(rename({suffix:'.min'}))
	.pipe(gulp.dest('css'))
})
gulp.task('js-app',function(){
	return gulp.src(pathAppJs)
	.pipe(concat('app.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest('js'))
})
gulp.task('js-app:dev',function(){
	return gulp.src(pathAppJs)
	.pipe(concat('app.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest('js'))
})
gulp.task('js-lazyLoad',function(){
	return gulp.src(pathLazyLoadJs)
	.pipe(concat('lazy.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest('js'))
})
gulp.task('js-lazyLoad:dev',function(){
	return gulp.src(pathLazyLoadJs)
	.pipe(concat('lazy.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest('js'))
})
gulp.task('js',function(){
	return gulp.src(pathJs)
	.pipe(uglify())
	.pipe(rename({suffix:'.min'}))
	.pipe(uglify())
	.pipe(gulp.dest('js'))
})
gulp.task('js:dev',function(){
	return gulp.src(pathJs)
	.pipe(rename({suffix:'.min'}))
	.pipe(uglify())
	.pipe(gulp.dest('js'))
})
gulp.task('jshint',function(){
	return gulp.src(pathJs)
	.pipe(jshint())
	.pipe(jshint.reporter())
})

gulp.task('less-watch', ['less'], browserSync.reload);
gulp.task('app-watch', ['js-app'], browserSync.reload);
gulp.task('lazy-watch', ['js-lazyLoad'], browserSync.reload);
gulp.task('js-watch', ['js'], browserSync.reload);

gulp.task('serve', ['less','js-app','js-lazyLoad','js'], function () {
    browserSync({
        proxy: "http://dev.01.wkzf"
    });

    gulp.watch([
        'jssrc/**/*.js',
    ]).on('change', reload);

    gulp.watch(pathLess, ['less-watch']);
    gulp.watch(pathAppJs, ['app-watch']);
    gulp.watch(pathAppJs, ['lazy-watch']);
    gulp.watch(pathJs, ['js-watch']);
});


gulp.task('watch',function(){
	gulp.watch('less/**/**/**.less',['less']);
	gulp.watch(pathAppJs,['js-app']);
	gulp.watch(pathLazyLoadJs,['js-lazyLoad']);
	gulp.watch(pathJs,['js']);
})

gulp.task('default',['watch']);
gulp.task('release:css',gulpSequence('clear','less','js-app:dev','js:dev','js-lazyLoad','js-lazyLoad:dev'))
gulp.task('dev',gulpSequence('clear','less','js-app','js-lazyLoad','js'))