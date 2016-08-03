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
var lessPath=[
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
		'!public/less/variables.less',
		'!node_modules/**/*.less'		
	],	
	//活动公共js路径
	jsPath=[
		'public/jssrc/wap.js',
		'public/jssrc/web.js',
		'public/jssrc/wechat-share.js',
		'public/jssrc/*/*.js',
		'!node_modules/**/*.js'
	],	
	//controller,jquery和jquery.lazyload的路径
	appJsPath=[
		'public/jssrc/controller.js',
		'public/jssrc/jquery-1.11.3.js',
		'public/jssrc/jquery.lazyload.js',
		'!node_modules/**/*.js'
	],
	//活动js路径
	activityJsPath=[
		'*/jssrc/**/*.js',
		'!public/jssrc/**/*.js',
		'!node_modules/**/*.js'
	]

//清空公共和活动特定的js和css
gulp.task('clear',function(){
	return gulp.src([
		'public/js','public/css','*/css','*/js'
	],{read: false})
	.pipe(clean())
})

//编译less文件
gulp.task('less',function(){
	return gulp.src(lessPath)
        .pipe(less())
        .pipe(gulpif(isTest,minifyCss()))
        .pipe(rename(function(filepath) {      
            filepath.dirname = path.join('/', filepath.dirname.split(path.sep)[0], 'css');
            filepath.extname = isTest?".min.css":".css";
        }))
        .pipe(gulp.dest('./'));
})
//把Controller,jquery和jquery.lazyload编译成app.min.js
gulp.task('js-app',function(){
	return gulp.src(appJsPath)
	.pipe(concat(isTest?'app.min.js':'app.js'))
	.pipe(gulpif(isTest,uglify()))
	.pipe(gulp.dest('public/js'))
})

//编译公用的js，不包含app.min.js
gulp.task('js',function(){
	return gulp.src(jsPath)
	.pipe(gulpif(isTest,rename({suffix:'.min'})))
	.pipe(gulpif(isTest,uglify()))
	.pipe(gulp.dest('public/js'))
})

//检查js
gulp.task('jshint',function(){
	var p = pathJs.concat(pathAppJs,pathLazyLoadJs);	
	return gulp.src(p)
	.pipe(jshint())
	.pipe(jshint.reporter())
});

//编译活动目录中的js
gulp.task('activityJs',function(){	
	return gulp.src(activityJsPath)
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
	gulp.watch(appJsPath,['js-app']);	
	gulp.watch(jsPath,['js']);
})

gulp.task('default',['watch']);
gulp.task('build',gulpSequence('clear','less','js-app','js','activityJs'));