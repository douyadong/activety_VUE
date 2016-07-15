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
var path = require('path');
var gulpif = require("gulp-if");
var isTest = gulp.env.env === 'test';

//通用less和活动特定less路径
var pathLess=[
		'*/less/**/*.less',		
		'!public/less/components/*.less',
		'!public/less/mixins/*.less',
		'!public/less/variables/*.less',
		'!public/less/components.less',
		'!public/less/layout.less',
		'!public/less/mixins.less',
		'!public/less/normalize.less',
		'!public/less/rem.less',
		'!public/less/reset.less',
		'!public/less/variables.less'		
	],	
	//活动公共js路径
	pathJs=[
		'public/jssrc/wap.js',
		'public/jssrc/web.js',
		'public/jssrc/wechat-share.js',
		'public/jssrc/*/*.js'
	],
	//活动js路径
	activityJs=[
		'*/jssrc/**/*.js',
		'!public/jssrc/**/*.js'
	],
	//活动controller基类路径
	pathAppJs=[
		'public/jssrc/controller.js'
	],
	//lazyload路径
	pathLazyLoadJs=[
		'public/jssrc/jquery-1.11.3.js',
		'public/jssrc/jquery.lazyload.js',
		'public/jssrc/lazy.js'
	];

//清空公共和活动特定的js和css
gulp.task('clear',function(){
	return gulp.src([
		'public/js','public/css','*/css','*/js'
	],{read: false})
	.pipe(clean())
})

//编译less文件
gulp.task('less',function(){
	return gulp.src(pathLess)
        .pipe(less())
        .pipe(gulpif(isTest,minifyCss()))
        .pipe(rename(function(filepath) {      
            filepath.dirname = path.join('/', filepath.dirname.split(path.sep)[0], 'css');
            filepath.extname = isTest?".min.css":".css";
        }))
        .pipe(gulp.dest('./'));
})
//编译app.min.js
gulp.task('js-app',function(){
	return gulp.src(pathAppJs)
	.pipe(concat(isTest?'app.min.js':'app.js'))
	.pipe(gulpif(isTest,uglify()))
	.pipe(gulp.dest('public/js'))
})

//编译lazy.min.js
gulp.task('js-lazyLoad',function(){
	return gulp.src(pathLazyLoadJs)
	.pipe(concat(isTest?'lazy.min.js':'lazy.js'))
	.pipe(gulpif(isTest,uglify()))
	.pipe(gulp.dest('public/js'))
})

//编译js
gulp.task('js',function(){
	return gulp.src(pathJs)
	.pipe(gulpif(isTest,rename({suffix:'.min'})))
	.pipe(gulpif(isTest,uglify()))
	.pipe(gulp.dest('public/js'))
})

//检查js
gulp.task('jshint',function(){
	return gulp.src(pathJs)
	.pipe(jshint())
	.pipe(jshint.reporter())
})
//编译活动目录中的js
gulp.task('activityJs',function(){
	console.log('istest:'+isTest);
	return gulp.src(activityJs)
        .pipe(gulpif(isTest,uglify()))
        .pipe(rename(function(filepath) {      
            filepath.dirname = path.join('/', filepath.dirname.split(path.sep)[0], 'js');
            filepath.extname = isTest?".min.js":".js";
        }))
        .pipe(gulp.dest('./'));	
});

//监控文件系统更改
gulp.task('watch',function(){
	gulp.watch('less/**/**/**.less',['less']);
	gulp.watch(pathAppJs,['js-app']);
	gulp.watch(pathLazyLoadJs,['js-lazyLoad']);
	gulp.watch(pathJs,['js']);
})

gulp.task('default',['watch']);
gulp.task('build',gulpSequence('clear','less','js-app','js-lazyLoad','js','activityJs'));