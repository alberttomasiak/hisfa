const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

var gulp = require('gulp');
var cleanCSS = require('gulp-clean-css'); // minify css files
var concatCss = require('gulp-concat-css'); // merge css files together
var sass = require('gulp-sass'); // sass for gulp
var sourcemaps = require('gulp-sourcemaps');
var imagemin = require('gulp-imagemin'); // image optimization
var pngquant = require('imagemin-pngquant'); // bundled with imagemin
var uglify = require('gulp-uglify'); // minify javascript files
const babel = require('gulp-babel');

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

elixir(mix => {
    mix.sass('app.scss')
       .webpack('app.js');
});

gulp.task('default', function(){
	console.log("HISFA :)");
});

gulp.task('sass', function(){
	return gulp.src('resources/assets/sass/app.scss')
		.pipe(sourcemaps.init())
		.pipe(sass({outputStyle: 'compressed'}))
		.pipe(sourcemaps.write('./maps'))
		.pipe(gulp.dest('public/css'));
});

gulp.task('css-minify', function(){
	return gulp.src('resources/assets/css/*')
		.pipe(sourcemaps.init())
		.pipe(cleanCSS())
		.pipe(sourcemaps.write('./maps'))
		.pipe(gulp.dest('public/css'));
});

gulp.task('image-minify', function(){
	return gulp.src('resources/assets/img/*')
		.pipe(imagemin({
			progressive: true,
			svgoPlugins: [{removeViewBox: false}],
			use: [pngquant()]
		}))
		.pipe(gulp.dest('public/img'));
});

/*gulp.task('compress-js', function(){
	return gulp.src('resources/assets/js/*.js')
		.pipe(uglify())
		.pipe(gulp.dest('public/js'));
});*/

gulp.task('compress-js', function(){
	return gulp.src('resources/assets/js/*.js')
		.pipe(babel({
			presets: ['es2015']
		}))
		.pipe(gulp.dest('public/js'));
});

gulp.task('stalk', function(){
	gulp.watch('resources/assets/sass/**/*.scss', ['sass']);
	gulp.watch('resources/assets/css/*', ['css-minify']);
	gulp.watch('resources/assets/img/*', ['image-minify']);
	gulp.watch('resources/assets/js/*', ['compress-js']);
});

gulp.task('all', ['sass', 'css-minify', 'image-minify', 'compress-js']);